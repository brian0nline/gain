<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;
use App\Models\User;

class TimeWall
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(15);
    }

    public function verify()
    {
        if (Postback::checkTrans(md5(request('transactionId')))) {
            return 0;
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser(request('userID'), request('currencyAmount'));
            
        if(!User::where('id', request('userID'))->exists())
            return 0;
        
        levelCommision(request('userID'), request('currencyAmount'), 'win');
            
        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => request('userID'),
            'trx' => md5(request('transactionId')),
            'amount' => request('currencyAmount'),
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return 1;
    }

}
