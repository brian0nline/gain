<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;
use App\Models\User;

class AdgateMedia
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(7);
    }

    public function verify()
    {
        $hash = md5(request('transaction_id'));
 
        if (Postback::checkTrans($hash)) {
            return 0;
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser(request('user_id'), request('point_value'));
        
        if(!User::where('id', request('user_id'))->exists())
            return 0;

        levelCommision(request('user_id'), request('point_value'), 'win');
 
        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => request('user_id'),
            'trx' => $hash,
            'amount' => request('point_value'),
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return 1;
    }

}
