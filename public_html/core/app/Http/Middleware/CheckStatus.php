<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Support\Str;
use App\Http\APIs\ProxyCheck;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckStatus
{


    public function handle($request, Closure $next)
    {
        $ipInfo = getIpInfo();
        
        if (!session('detect_using_vpn') && session('clear_ip') != getUserIP()) {

            $result_array = ProxyCheck::check(getUserIP(), $this->proxyOptions());
            if ($result_array['block'] == "yes") {
                if (set('detect_using_vpn')) {
                    session(['detect_using_vpn' => true]);
                    abort(403, 'Using VPS, Proxy is not allowed');
                } elseif (set('auto_ban_using_vpn')) {
                    $this->banUser();
                } else
                    session(['clear_ip' => getUserIP()]);
            } else {
                session(['clear_ip' => getUserIP()]);
            }
        }
        
          if (set('detect_using_vpn')) {
            
            
                    $ip = getUserIP();
                    
                    $url = "https://api.seon.io/SeonRestService/ip-api/v1.1/$ip";
                    
                    $headers = array(
                      "X-API-KEY: b4c76a61-4c29-4b37-84d2-c3fd5295756f"
                    );
                    
                    $curl = curl_init($url);
                    
                    $ch = curl_init();
                    curl_setopt_array($ch,array(
                      CURLOPT_URL => $url,
                      CURLOPT_FOLLOWLOCATION => false,
                      CURLOPT_HEADER => false,
                      CURLOPT_HTTPHEADER => $headers,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_HTTPGET => true,
                    ));
                    
                    $result = curl_exec($ch);
                    
                    $err = curl_error($ch);
                    if (curl_errno($ch) && $err) $res = "CURL ERROR [".curl_errno($ch)."]: ".curl_error($ch);
                    else
                    {
                        $res = json_decode($result, true);
                        if($res['data']){
                            if($res['data']['harmful'] == true || $res['data']['vpn'] ==  true || $res['data']['web_proxy'] == true || $res['data']['public_proxy'] == true )
                            {
                                if (set('auto_ban_using_vpn')) {
                                  $this->banUser();
                                }
                                abort(403, "Please disable your VPN connection!");       
                            }
                        }
                    }
                    
          }

        if (session('detect_using_vpn'))
            abort(403, 'We are sorry, Using VPS is blocked');

        if (Str::contains(set('blocked_country'), @$ipInfo['code']))
            abort(403, 'We are sorry, your country is blocked');

        if (Auth::check()) {
            $user = auth()->user();
            if ($user->status && $user->ev && $user->sv && $user->tv) {   
                return $next($request);
            } else {
                return redirect()->route('user.authorization');
            }
        }

        abort(403);
    }

    protected function proxyOptions()
    {
        return array(
            'API_KEY' => set('proxycheck_io_api'), // Your API Key.
            'ASN_DATA' => 1, // Enable ASN data response.
            'DAY_RESTRICTOR' => 7, // Restrict checking to proxies seen in the past # of days.
            'VPN_DETECTION' => 1, // Check for both VPN's and Proxies instead of just Proxies.
            'RISK_DATA' => 1, // 0 = Off, 1 = Risk Score (0-100), 2 = Risk Score & Attack History.
            'INF_ENGINE' => 1, // Enable or disable the real-time inference engine.
            'TLS_SECURITY' => 0, // Enable or disable transport security (TLS).
            'QUERY_TAGGING' => 1, // Enable or disable query tagging.
            'CUSTOM_TAG' => '', // Specify a custom query tag instead of the default (Domain+Page).
            // 'BLOCKED_COUNTRIES' => array('Wakanda', 'CN'), // Specify an array of countries or isocodes to be blocked.
            // 'ALLOWED_COUNTRIES' => array('Azeroth', 'US') // Specify an array of countries or isocodes to be allowed.
        );
    }


    protected function banUser()
    {
        $userIP =  UserLogin::where('user_ip', getUserIP())->select('user_id')->first();
        if ($userIP) {
            $user = User::where('id', $userIP->user_id)->first();
            $user->update(['status' => 0]);
        }
        session(['detect_using_vpn' => true]);
        abort(403, 'Using VPS, Proxy is not allowed');
    }
}
