<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\User;
use App\Models\System\OfferSetup;

class CPXResearch
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(10);
    }

    public function verify()
    {
        if ($this->checkSig()){
            return 0;
        }

          if(!User::where('id', request('user_id'))->exists())
          {
            return 0;
              
          }
        
            if ($this->offer->isAutoPay){
                Postback::rewardUser(request('user_id'), request('amount_local'));
                
                levelCommision(request('user_id'), request('amount_local'), 'win');
                
                OfferLog::create([
                    'offer_id' => $this->offer->id,
                    'user_id' => request('user_id'),
                    'trx' => md5(request('hash')),
                    'amount' => request('amount_local'),
                    'isPaid' => $this->offer->isAutoPay ? 1 : 0,
                ]);

                return 1;
            }
        
    }

    protected function checkSig()
    {
        $sig = md5(request('trans_id')."-".$this->offer->secret_key);
        if($sig == request('hash')){
            return true;
        }
        return false;
    }
}
