<?php


namespace App\Services\OfferSites;

use App\Services\Postback;
use App\Models\System\OfferLog;
use App\Models\System\OfferSetup;
use App\Models\User;

class Notik
{
    protected $offer;

    public function __construct()
    {
        $this->offer = OfferSetup::findOrFail(14);
    }

    public function verify()
    {

        if (!$this->checkSig())
            return 'slug';

        $hash = md5(request('txn_id'));

        if (Postback::checkTrans($hash)) {
            return 'hash';
        }

        if ($this->offer->isAutoPay)
            Postback::rewardUser(request('user_id'), request('amount'));
            
            
         if(!User::where('id', request('user_id'))->exists())
            return 'user';
                
        levelCommision(request('user_id'), request('amount'), 'win');
        
        OfferLog::create([
            'offer_id' => $this->offer->id,
            'user_id' => request('user_id'),
            'trx' => $hash,
            'amount' => request('amount'),
            'isPaid' => $this->offer->isAutoPay ? 1 : 0,
        ]);

        return 1;
    }

    protected function checkSig()
    {
        $secretKey = $this->offer->secret_key; 
        
        $protocol = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on") ? "https" : "http";

        $url = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        /*Get the callback URL without the "hash" query parameter*/
        /*Example: https://url.com?param1=foo&param2=bar*/
        $urlWithoutHash = substr($url, 0, -strlen("&hash=" . request('hash')));
        /*Generate a hash from the complete callback URL without the "hash" query parameter*/
        $generatedHash = hash_hmac("sha1", $urlWithoutHash, $secretKey);


        /*Check if the generated hash is the same as the "hash" query parameter*/
        return ($generatedHash == request('hash'));
    }
}
