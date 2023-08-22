<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;
use App\Models\User;

class Revlum
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(29);
    }

    public function verify()
    {
        $hash = md5(request('transId'));
        if (Postback::checkTrans($hash)) {
            return 0;
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser(request('subId'), request('reward'));
        
        if(!User::where('id', request('subId'))->exists())
            return 0;

        levelCommision(request('subId'), request('reward'), 'win');

        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => request('subId'),
            'trx' => $hash,
            'amount' => request('reward'),
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return 1;
    }

}
