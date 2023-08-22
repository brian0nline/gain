<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Helper\GetProxy;
use App\Http\Helper\UserAgent;
use App\Models\AdsZone;
use App\Models\System\ShortLog;
use App\Models\System\ShortSetup;
use App\Models\System\Site;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ShortController extends Controller
{

    public function show($key, $user)
    {
        $availableShorts = [];
        $site = $this->getPublisherSite($key);

        $shorts = ShortSetup::where('isActive', true)->get();

        foreach ($shorts as $short) {
            if ($short->count_per_day > $this->visitedShortLinks($short)) {
                $availableShorts[] = $short;
            }
        }


        return view('system.user.publisher.iframe.short')->with([
            'site' => $site,
            'user' => $user,
            'shorts' => (object)$availableShorts,
            'adsZone' => AdsZone::active()->inRandomOrder()->get(),
        ]);
    }

    protected function getPublisherSite($key)
    {
        return Site::where('st_key', $key)
            ->where('st_status', 1)->first();
    }

    protected function visitedShortLinks($short)
    {
        return ShortLog::where('short_id', $short->id)
            ->where('isCompleted', true)
            ->whereDay('updated_at', date('d'))->count();
    }

    public function visit($key, $user, $shortId)
    {
        $site = $this->getPublisherSite($key);

        $short = $this->getShortLink($shortId);

        return redirect()->to($this->generateLink($short, $site, $user));
    }

    protected function getShortLink($shortId)
    {
        $short = ShortSetup::where('id', $shortId)->firstOrFail();
        $visitedShorts = $this->visitedShortLinks($short);
        if ($short->count_per_day > $visitedShorts)
            return $short;

        abort(404);
    }

    protected function generateLink($short, $site, $user)
    {
        $token = $this->createSeason($short, $site, $user);

        if ($short && $token) {
            $api = Str::before($short->api, '&url=');
            $targetUrl = $api . '&url=' . urlencode(route('publish.iframe.short-links.verify', $token));
            $response = Http::get($targetUrl);
            if ($response->body()) {
                $redirect = json_decode($response->body(), true);
                return isset($redirect['shortenedUrl']) ? $redirect['shortenedUrl'] : 'Error: Connection!';
            }
            abort(404);
        }

        abort(404);
    }

    protected function createSeason($short, $site, $user)
    {

        $token = generateToken(12);
        ShortLog::create([
            'short_id' => $short->id,
            'site_id' => $site->id,
            'subId' => $user,
            'token' => $token,
            'claimer_ip' => request()->ip(),
            'country' => (new GetProxy())->checkUSerIp(getUserIP())['country'],
            'device' => (new UserAgent())->isMobile() ? 'mobile' : 'desktop',
            'browser' => (new UserAgent())->getBrowser()['name'],
            'rewards' => $short->rewards,
        ]);

        session([$token => $token . '&' . json_encode($short->toArray()) . '&' . json_encode($site->toArray())]);

        return $token;
    }

    public function verify($token)
    {
        if (session($token)) {
            $params = explode('&', session($token));
            $short = $this->verifyToken($params[0]);
            if ($short !== null) {
                $site = Site::where('id', $short->site_id)->firstOrFail();
                $short->update(['isCompleted' => true]);
                $this->rewardsUser($short, $site);
                $this->rewardPublisher($short->rewards, $site);
                session([$token => null]);
                return redirect()->route('publish.iframe.short-links.show', [
                    $site->st_key, $short->subId
                ])->with('success', 'Your payment sent successfully');
            }
        }
        abort(404);
    }

    protected function verifyToken($token)
    {
        return ShortLog::where('token', $token)
            ->where('isCompleted', false)
            ->whereDay('created_at', date('d'))
            ->first();
    }

    protected function rewardsUser($short, $site)
    {
        $userFee = ($short->rewards * set('publisher_rewards_fee')) / 100;
        $rewards = ($short->rewards - $userFee) * $site->st_rewards;
        try {
            $response = Http::get($site->st_postback, [
                'subId' => $short->subId,
                'transId' => $short->token,
                'reward' => $rewards,
                'type' => 'short',
                'signature' => md5($short->subId . $short->token . $rewards . $site->st_secret)
            ]);
            return true;
            if ($response->body() != 'ok')
                return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    protected function rewardPublisher($amount, $site)
    {
        $publisher = User::where('id', $site->user_id)->firstOrFail();

        return $publisher->increment('balance', $amount);
    }
}
