<?php

namespace App\Services;

use App\Models\User;
use App\Models\System\OfferLog;
use Illuminate\Support\Facades\Log;


class Postback
{


    public function verify($endpoint = '')
    {
        Log::info(request());
        switch ($endpoint) {
            case '8ckhgtg5pd5lil':
                return (new OfferSites\Wannads())->verify();
                break;
            case 'dk6ehsjp0i51cg':
                return (new OfferSites\OfferToro())->verify();
                break;
            case '8ds9w427ilpeeg':
                return (new OfferSites\KiwiWall())->verify();
                break;
            case '0wc3nygljr35o1':
                return (new OfferSites\CPXResearch())->verify();
                break;
           
            case 'ek6mu26drorper':
                return (new OfferSites\AdgateMedia())->verify();
                break;
            case 'ek6mu26drorper':
                return (new OfferSites\AdgateMedia())->verify();
                break;

            
            case 'ww39ps1m8smavt':
                return (new OfferSites\Monlix())->verify();
                break;

            case 'ujtei8bb5ef0yu':
                return (new OfferSites\Notik())->verify();
                break;

            case '6zdv0so44213zq':
                return (new OfferSites\TimeWall())->verify();
                break;
           
            case 'al867jxx8nehya':
                return (new OfferSites\Revlum())->verify();
                break;
           
            
            case '9o74qhltf19hxh':
             return (new OfferSites\Inbrain())->verify();
            break;
            
           
            
            
            
            
            
             
            default:
                return 'Error: Invalid postback Url';
        }   

        return 'Error: Invalid postback Url';
    }



    public static function checkTrans($trx)
    {
        return OfferLog::where('trx', $trx)->exists();
    }

    public static function rewardUser($user, $mount)
    {
        $query = User::where('id', $user)->first();

        if ($query){
            $query->increment('balance', $mount);
            return true;
        }
        else
            return false;
    }
}
