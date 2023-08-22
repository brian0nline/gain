<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;
use App\Models\User;

class Wannads
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(4);
    }

    public function verify()
    {
        if ($this->checkSig())
            return 'Error: signature';

        if (Postback::checkTrans(md5(request('signature')))) {
            return 'DUP';
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser(request('subId'), request('reward'));
            
         if(!User::where('id', request('subId'))->exists())
            return 0;
        levelCommision(request('subId'), request('reward'), 'win');
        
        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => request('subId'),
            'trx' => md5(request('signature')),
            'amount' => request('reward'),
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return 'ok';
    }

    protected function checkSig()
    {
        return md5(request('subId')
            . request('transId')
            . request('reward')
            . $this->offer->secret_key)
            != request('signature');
    }
}
