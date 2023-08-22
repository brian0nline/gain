<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\User;
use App\Models\System\OfferSetup;
use Illuminate\Support\Facades\Log; 

class Inbrain
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(31);
    }

    public function verify()
    {
        $user_id = request('PanelistId');
        $rewardType = request('RewardType'); // type of reward get
        $unique_trx = request('RewardId');
        $reward = request('Reward');
        $sessionId = request('SessionId');
        $revenueAmount = request('RevenueAmount');
        $isTest = request('IsTest');
        
        // if($isTest == true) {
        //     return 'test';
        // }
     
        if (Postback::checkTrans(md5($unique_trx))) {
            return 0;
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser($user_id, $reward);
            
          if(!User::where('id', $user_id)->exists())
            return 0;

        
         levelCommision($user_id, $reward, 'win');
        
        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => $user_id,
            'trx' => md5($unique_trx),
            'amount' => $reward,
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return 'ok';
    }

    protected function checkSig()
    {
        return md5(request('PanelistId')
            . request('RewardId')
            . $this->offer->secret_key)
            != request('Sig');
    }
}