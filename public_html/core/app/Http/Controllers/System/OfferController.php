<?php

namespace App\Http\Controllers\System;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{


    public function index()
    {
        return view('system.user.offer.cpx-research',[
            'oneOffer' => OfferSetup::select('name', 'id', 'public_key')->findOrFail(8)
        ]);
    }


    public function postBack(Request $request, $endPoint)
    {

        $offer = OfferSetup::where('endpoint', $endPoint)->first();
        if(!$offer) return 0;

        if ($offer->server_ip) {
            if (Str::contains($offer->server_ip, getUserIP()) != true)
                return $offer->response;
        }
        
        
        // define required parmetars
        $amount = $request->query(Str::before($offer->amount, '='), 0);
        $userId = $request->query(Str::before($offer->user_ident, '=', 1));
        $trx = $request->query(Str::before($offer->trx, '='), md5(rand(111,999))) ;

       
        if (OfferLog::where('trx', $trx)->exists())
            return 'Error: That is second transition!';

        OfferLog::create([
            'offer_id' => $offer->id,
            'user_id' => $userId,
            'trx' => $trx,
            'amount' => $amount,
            'isPaid' => $offer->isAutoPay ? 1 : 0,
        ]);

        if ($offer->isAutoPay) {
            $this->rewardUser(
                $userId,
                $amount
            );
        }


        return $offer->response;
    }

    public function rewardUser($userId, $amount)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $user->increment('balance', $amount);
    }

    public function reverseRewardUser($userId, $amount)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $user->decrement('balance', $amount);
    }
}
