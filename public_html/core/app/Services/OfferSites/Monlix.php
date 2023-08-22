<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\User;
use App\Models\System\OfferSetup;

use Illuminate\Support\Facades\Log; 

class Monlix
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(13);
    }

    public function verify()
    {
       
        //Log::info(request());
       
        if (request('secret') != $this->offer->secret_key) {
           return 0;
         }

        $hash = md5(request('transactionid'));

        if (Postback::checkTrans($hash)) {
            return 0;
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser(request('userid'), request('reward'));
            
            
          if(!User::where('id', request('userid'))->exists())
            return 0;
            
        levelCommision(request('userid'), request('reward'), 'win');
        
        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => request('userid'),
            'trx' => $hash,
            'amount' => request('reward'),
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return "1";
    }
}
