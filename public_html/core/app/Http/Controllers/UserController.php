<?php

namespace App\Http\Controllers;


use Exception;
use PDOException;
use App\Models\User;
use App\Models\Referral;
use App\Models\Withdrawal;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\CommissionLog;
use App\Models\GeneralSetting;
use App\Models\WithdrawMethod;
use App\Rules\FileTypeValidate;
use App\Lib\GoogleAuthenticator;
use App\Models\AdminNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\UserProfileRequest;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function profile()
    {
        $general = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $general->sitename, $secret);
        
        $user = Auth::user();
        return view('user.profile.setting', compact('user', 'secret', 'qrCodeUrl'));
    }

    public function submitProfile(Request $request)
    {
        // $request->validated();
       
        userInfo()->update([
            'username' => $request->username,
            'mobile' => $request->mobile,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
        ]);

        $path = imagePath()['users']['path'];
        $size = imagePath()['users']['size'];
        if ($request->hasFile('image')) {
            try {
                $filename = null;
                (userProfile()['image'])
                ? $filename = uploadImage($request->image, $path, $size, userProfile()['image'])
                : $filename = uploadImage($request->image, $path, $size);
                
                if(empty(userInfo()['google_id'])){
                    
                    userInfo()->profile()->update([
                        'image' => $filename
                    ]);
                }
                
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        userInfo()->profile()->update([
            'address' => json_encode($request->address),
            'isPublic' => $request->public_profile ? 1 : 0,
        ]);

        $notify[] = ['success', 'Profile updated'];

        return back()->withNotify($notify);
    }

    /**
     * @return Factory|View
     */
    public function changePassword()
    {
        $pageTitle = 'Change password';
        return view('user.password', compact('pageTitle'));
    }


    public function submitPassword(Request $request)
    {

        $password_validation = Password::min(6);
        $general = GeneralSetting::first();
        if ($general->secure_password) {
            $password_validation = $password_validation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $this->validate($request, [
            'current_password' => 'required',
            'password' => ['required', 'confirmed', $password_validation]
        ]);


        try {
            $user = auth()->user();
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                $notify[] = ['success', 'Password changed successfully.'];
                return back()->withNotify($notify);
            } else {
                $notify[] = ['error', 'Passwords don\'t match!'];
                return back()->withNotify($notify);
            }
        } catch (PDOException $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }


    public function depositHistory()
    {
        $pageTitle = 'Deposit History';
        $emptyMessage = 'No history found.';
        $logs = auth()->user()->deposits()->with(['gateway'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view('user.deposit_history', compact('pageTitle', 'emptyMessage', 'logs'));
    }


    public function withdrawMoney()
    {
        $withdrawMethod = WithdrawMethod::where('status', 1)->get();
        $pageTitle = 'Withdraw Money';
        return view('user.withdraw.methods', compact('pageTitle', 'withdrawMethod'));
    }


    public function withdrawStore(Request $request)
    {
        
        $this->validate($request, [
            'method_code' => 'required',
            'amount' => 'required|numeric'
        ]);
        
         $general = GeneralSetting::first();
        
        if($general->withdraw_status == 0){
            $notify[] = ['error', 'WE\'RE NOW OUT OF STOCK AND THE FUNDS WILL BE REFILLED SOON.THANKS FOR THE PATIENCE!'];
            return back()->withNotify($notify);
        }
        
        
        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->firstOrFail();
        $user = auth()->user();
        
        if ($request->amount < $method->min_limit) {
            $notify[] = ['error', 'Your requested amount is smaller than minimum amount.'];
            return back()->withNotify($notify);
        }
        if ($request->amount > $method->max_limit) {
            $notify[] = ['error', 'Your requested amount is larger than maximum amount.'];
            return back()->withNotify($notify);
        }

        if ($request->amount > $user->balance) {
            $notify[] = ['error', 'You do not have sufficient balance for withdraw.'];
            return back()->withNotify($notify);
        }

        $charge = $method->fixed_charge + ($request->amount * $method->percent_charge / 100);
        $afterCharge = $request->amount - $charge;
        $finalAmount = $afterCharge * $method->rate;

        $withdraw = new Withdrawal();
        $withdraw->method_id = $method->id; // wallet method ID
        $withdraw->user_id = $user->id;
        $withdraw->amount = $request->amount;
        $withdraw->currency = $method->currency;
        $withdraw->rate = $method->rate;
        $withdraw->charge = $charge;
        $withdraw->final_amount = $finalAmount;
        $withdraw->after_charge = $afterCharge;
        $withdraw->trx = getTrx();
        $withdraw->save();
        session()->put('wtrx', $withdraw->trx);
        return redirect()->route('user.withdraw.preview');
    }


    public function withdrawPreview()
    {
        $withdraw = Withdrawal::with('method', 'user')->where('trx', session()->get('wtrx'))->where('status', 0)->orderBy('id', 'desc')->firstOrFail();
        $pageTitle = 'Withdraw Preview';
        return view('user.withdraw.preview', compact('pageTitle', 'withdraw'));
    }


    public function withdrawSubmit(Request $request)
    {
        $general = GeneralSetting::first();
        $withdraw = Withdrawal::with('method', 'user')->where('trx', session()->get('wtrx'))->where('status', 0)->orderBy('id', 'desc')->firstOrFail();

        $rules = [];
        $inputField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($withdraw->method->user_data as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], new FileTypeValidate(['jpg', 'jpeg', 'png']));
                    array_push($rules[$key], 'max:2048');
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }

        $this->validate($request, $rules);

        $user = auth()->user();
        if ($user->ts) {
            $response = verifyG2fa($user, $request->authenticator_code);
            if (!$response) {
                $notify[] = ['error', 'Wrong verification code'];
                return back()->withNotify($notify);
            }
        }


        if ($withdraw->amount > $user->balance) {
            $notify[] = ['error', 'Your request amount is larger then your current balance.'];
            return back()->withNotify($notify);
        }

        $directory = date("Y") . "/" . date("m") . "/" . date("d");
        $path = imagePath()['verify']['withdraw']['path'] . '/' . $directory;
        $collection = collect($request);
        $reqField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($collection as $k => $v) {
                foreach ($withdraw->method->user_data as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {
                                try {
                                    $reqField[$inKey] = [
                                        'field_name' => $directory . '/' . uploadImage($request[$inKey], $path),
                                        'type' => $inVal->type,
                                    ];
                                } catch (Exception $exp) {
                                    $notify[] = ['error', 'Could not upload your ' . $request[$inKey]];
                                    return back()->withNotify($notify)->withInput();
                                }
                            }
                        } else {
                            $reqField[$inKey] = $v;
                            $reqField[$inKey] = [
                                'field_name' => $v,
                                'type' => $inVal->type,
                            ];
                        }
                    }
                }
            }
            $withdraw['withdraw_information'] = $reqField;
        } else {
            $withdraw['withdraw_information'] = null;
        }


        $withdraw->status = 2;
        $withdraw->save();
        $user->balance -= $withdraw->amount;
        $user->save();


        $transaction = new Transaction();
        $transaction->user_id = $withdraw->user_id;
        $transaction->amount = $withdraw->amount;
        $transaction->post_balance = $user->balance;
        $transaction->charge = $withdraw->charge;
        $transaction->trx_type = '-';
        $transaction->details = showAmount($withdraw->final_amount) . ' ' . $withdraw->currency . ' Withdraw Via ' . $withdraw->method->name;
        $transaction->trx = $withdraw->trx;
        $transaction->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New withdraw request from ' . $user->username;
        $adminNotification->click_url = urlPath('moder.withdraw.details', $withdraw->id);
        $adminNotification->save();

        try {

            notify($user, 'WITHDRAW_REQUEST', [
                'method_name' => $withdraw->method->name,
                'method_currency' => $withdraw->currency,
                'method_amount' => showAmount($withdraw->final_amount),
                'amount' => showAmount($withdraw->amount),
                'charge' => showAmount($withdraw->charge),
                'currency' => $general->cur_text,
                'rate' => showAmount($withdraw->rate),
                'trx' => $withdraw->trx,
                'post_balance' => showAmount($user->balance),
                'delay' => $withdraw->method->delay
            ]);
        } catch (Exception $e) {
        }

        $notify[] = ['success', 'Withdraw request sent successfully'];
        return redirect()->route('user.withdraw.history')->withNotify($notify);
    }


    public function withdrawLog()
    {
        $pageTitle = "Withdraw Log";
        $withdraws = Withdrawal::where('user_id', Auth::id())->where('status', '!=', 0)->with('method')->orderBy('id', 'desc')->paginate(getPaginate());
        $data['emptyMessage'] = "No Data Found!";
        return view('user.withdraw.log', compact('pageTitle', 'withdraws'));
    }


    public function show2faForm()
    {
        $general = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $general->sitename, $secret);
        $pageTitle = 'Two Factor';
        return view('user.twofactor', compact('pageTitle', 'secret', 'qrCodeUrl'));
    }


    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $response = verifyG2fa($user, $request->code, $request->key);
        if ($response) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->save();
            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_ENABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);
            $notify[] = ['success', 'Google authenticator enabled successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong verification code'];
            return back()->withNotify($notify);
        }
    }


    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $response = verifyG2fa($user, $request->code);
        if ($response) {
            $user->tsc = null;
            $user->ts = 0;
            $user->save();
            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_DISABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);
            $notify[] = ['success', 'Two factor authenticator disable successfully'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }
        return back()->withNotify($notify);
    }


    public function transactions()
    {
        $pageTitle = 'Transactions';
        $logs = auth()->user()->transactions()->orderBy('id', 'desc')->paginate(getPaginate());
        $empty_message = 'No transaction history';
        return view('user.transactions', compact('pageTitle', 'logs', 'empty_message'));
    }


    public function referrals()
    {
        $refLevels = Referral::all();

        $userRefLink = url('?join=' . \auth()->user()->username);

        $commissions = CommissionLog::where('to_id', auth()->user()->id)->orderBy('id', 'desc')->with('userFrom')->paginate(getPaginate());

        return view('user.commissions', compact('refLevels', 'userRefLink', 'commissions'));
    }


    public function commissionsWin()
    {
        $pageTitle = "Win Commissions";
        $commissions = CommissionLog::where('to_id', auth()->user()->id)->where('commission_type', 'win')->orderBy('id', 'desc')->with('userFrom')->paginate(getPaginate());
        return view('user.commissions', compact('pageTitle', 'commissions'));
    }


    public function referredUsers($level = 1)
    {
        $id = auth()->user()->id;
        $myref = showBelow($id);
        $nxt = $myref;
        $firstActive = 0;
        if ($level == 1) {
            $firstActive = 1;
        }
        for ($i = 1; $i < $level; $i++) {
            $nxt = array();
            foreach ($myref as $uu) {
                $n = showBelow($uu);
                $nxt = array_merge($nxt, $n);
            }
            $myref = $nxt;
        }

        $users = User::whereIn('id', $nxt)->paginate(getPaginate());
        $pageTitle = "Referred Users";
        $lev = Referral::max('level');
        return view('user.referred', compact('pageTitle', 'level', 'lev', 'users', 'firstActive'));
    }
    
    
    public function deleteAccount()
    {
        $user = Auth::user();
     
        //delete email logs
        DB::table('email_logs')->where('user_id', $user->id)->delete();
        
        // delete user_logins
        DB::table('user_logins')->where('user_id', $user->id)->delete();
     
        // delete referral logs
         DB::table('commission_logs')->where('from_id', $user->id)->delete();
     
        //delete user withdraw data
        DB::table('withdrawals')->where('user_id', $user->id)->delete();
        // delete user offers data
        DB::table('offer_logs')->where('user_id', $user->id)->delete();
        // delete user profile data
        DB::table('user_profiles')->where('user_id', $user->id)->delete();
        //delete user data
        DB::table('users')->where('id', $user->id)->delete();
        
        return redirect('/');
        
    }
}
