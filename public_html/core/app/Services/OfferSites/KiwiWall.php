<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\User;
use App\Models\System\OfferSetup;

class KiwiWall
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(11);
    }

    public function verify()
    {
        if ($this->checkSig())
            return 0;

        if (Postback::checkTrans(md5(request('signature')))) {
            return 0;
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser(request('sub_id'), request('amount'));
            
           if(!User::where('id', request('sub_id'))->exists())
            return 0;

         levelCommision(request('sub_id'), request('amount'), 'win');
         
        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => request('sub_id'),
            'trx' => md5(request('signature')),
            'amount' => request('amount'),
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return 1;
    }

    protected function checkSig()
    {
        return md5(request('sub_id')
            . ':' . request('amount')
            . ':' . $this->offer->secret_key)
            != request('signature');
    }
}
