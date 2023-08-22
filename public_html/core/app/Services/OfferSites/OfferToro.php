<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;
use App\Models\User;

class OfferToro
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(6);
    }

    public function verify()
    {
        if ($this->checkSig())
            return 0;

        if (Postback::checkTrans(md5(request('sig')))) {
            return 0;
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser(request('user_id'), request('amount'));
            
        if(!User::where('id', request('user_id'))->exists())
            return 0;

        levelCommision(request('user_id'), request('amount'), 'win');
 
        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => request('user_id'),
            'trx' => md5(request('sig')),
            'amount' => request('amount'),
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return 1;
    }

    protected function checkSig()
    {
        return md5(
            request('oid')
               . "-"  . request('user_id')
               . "-"  . $this->offer->secret_key
        ) != (request('sig'));
    }
}
