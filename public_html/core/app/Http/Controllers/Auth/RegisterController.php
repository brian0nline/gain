<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthTrait;
use App\Http\Helper\Captcha;
use App\Models\AdminNotification;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\User\UserProfile;
use App\Models\UserLogin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, AuthTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('regStatus')->except('registrationNotAllowed');
    }

    public function showRegistrationForm()
    {
        return view('user.auth.register', [
            'enabledCaptcha' => set('en_cap_register'),
            'captcha' => (new Captcha())->create(),
        ]);
    }

    public function register(Request $request)
    {
        // check user captcha if admin enabled it
        if (set('en_cap_register')) {
            if (!(new Captcha())->check($request->toArray()))
                return redirect()->route('user.register')
                    ->withInput()
                    ->withNotify([['error', 'Invalid captcha']]);
        }

        // validated user form 
        $valid = $this->validator($request->all());
        if (count($valid->errors()) > 0)
            return back()->withErrors($valid->errors())
                ->withInput();
       
         
        //create new user 
        event(new Registered($user = $this->create($request)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        $general = GeneralSetting::first();
        $password_validation = Password::min(6);
        if ($general->secure_password) {
            $password_validation = $password_validation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $validate = Validator::make($data, [
            'email' => 'required|string|email|max:90|unique:users',
            'password' => ['required', 'confirmed', $password_validation],
            'username' => 'required|alpha_num|unique:users|min:6',
        ]);
        
        // check for valid email
        
        // $url = "https://api.seon.io/SeonRestService/email-api/v2.2/".$data['email'];
        
        // $headers = array(
        //   "X-API-KEY: b4c76a61-4c29-4b37-84d2-c3fd5295756f"
        // );
        
        // $curl = curl_init($url);
        
        // $ch = curl_init();
        // curl_setopt_array($ch,array(
        //   CURLOPT_URL => $url,
        //   CURLOPT_FOLLOWLOCATION => false,
        //   CURLOPT_HEADER => false,
        //   CURLOPT_HTTPHEADER => $headers,
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_HTTPGET => true,
        // ));
        
        // $result = curl_exec($ch);
        
        // $err = curl_error($ch);
        // if (curl_errno($ch) && $err) $res = "CURL ERROR [".curl_errno($ch)."]: ".curl_error($ch);
        // else {
        //     $res = json_decode($result, true);
        //     if($res['data']['deliverable'] == 0 || $res['data']['deliverable'] == false)
        //     {
        //         throw ValidationException::withMessages(['email' => 'Real email address is required']);
        //     }
        // }

        return $validate;
    }


    protected function create($request)
    {

        $general = GeneralSetting::first();

        $referBy = session()->get('reference');
        if ($referBy) {
            $referUser = User::where('username', $referBy)->first();
        } else {
            $referUser = null;
        }
        //User Create
        $user = User::create([
            'token_id' => generateToken(),
            'username' => $request->username,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'timezone' => config('app.timezone'),
            'ref_by' => $referUser ? $referUser->id : 0,
            'ev' => $general->ev ? 0 : 1,
            'sv' => $general->sv ? 0 : 1,
        ]);

        UserProfile::create([
            'user_id' => $user->id,
        ]);


        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New member registered';
        $adminNotification->click_url = urlPath('moder.users.detail', $user->id);
        $adminNotification->save();

        $this->loginLog($user);

        return $user;
    }

    public function registered()
    {
        return redirect()->route('user.home');
    }

    public function checkUser(Request $request)
    {
        $exist['data'] = null;
        $exist['type'] = null;
        if ($request->email) {
            $exist['data'] = User::where('email', $request->email)->first();
            $exist['type'] = 'email';
        }

        if ($request->username) {
            $exist['data'] = User::where('username', $request->username)->first();
            $exist['type'] = 'username';
        }

        return response($exist);
    }
}
