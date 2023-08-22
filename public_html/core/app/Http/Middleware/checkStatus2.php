<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http as GetCURL;

class CheckStatus2
{
    // https://ipqualityscore.com/api/json/ip/Tn8gKmEnQTD4JneZikMQl1VcSni27MPb/102.46.243.254?strictness=2&fast=1

    public function handle(Request $request, Closure $next)
    {

        if ((!session('detect_using_vpn') || session('detect_using_vpn') != getUserIP())
            || (!session('clear_ip') || session('clear_ip') != getUserIP())
            ) {

            $url = 'https://ipqualityscore.com/api/json/ip/';
            $api = set('proxycheck_io_api','Tn8gKmEnQTD4JneZikMQl1VcSni27MPb');
            $ip = getUserIP();

            $target_url = $url . $api . '/' . $ip;

            $this->checkIP($target_url);

        }

        if (session('detect_using_vpn'))
            abort(403, 'We are sorry, Using VPS is blocked..');

        if (Str::contains(set('blocked_country'), getIpInfo()['code']))
            abort(403, 'We are sorry, your country is blocked');

        if (Auth::check()) {
            $user = auth()->user();
            if ($user->status && $user->ev && $user->sv && $user->tv) {
                return $next($request);
            } else {
                return redirect()->route('user.authorization');
            }
        }
        abort(403);
    }
    
    protected function checkIP($target_url){
        
        $request = GetCURL::get($target_url, [
                'strictness' => 2,
                'fast' => 1
            ]);
            if ($request->json()) {
                $response = $request->json();
                if ($response['success'] && $response['proxy'] == true) {
                    if (set('detect_using_vpn')) {
                        session(['detect_using_vpn' => getUserIP()]);
                        abort(403, 'Using VPS, Proxy is not allowed');
                    }
                    if (set('auto_ban_using_vpn') && session('detect_using_vpn')) {
                        $this->banUser();
                    } else
                        session(['clear_ip' => getUserIP()]);
                        session(['detect_using_vpn' => false]);
                } else {
                    session(['clear_ip' => getUserIP()]);
                    session(['detect_using_vpn' => false]);
                }
            }else{
                session(['clear_ip' => getUserIP()]);
                session(['detect_using_vpn' => false]);
            }
    }


    protected function banUser()
    {
        $userIP =  UserLogin::where('user_ip', getUserIP())->select('user_id')->first();
        if ($userIP) {
            $user = User::where('id', $userIP->user_id)->first();
            $user->update(['status' => 0]);
        }
        session(['detect_using_vpn' => true]);
        abort(403, 'Using VPS, Proxy is not allowed');
    }
}
