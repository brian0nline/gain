<?php

namespace App\Http\Livewire\Admin\Sms;

use App\Http\Controllers\Traits\SendTestEmailAndSms;
use App\Models\GeneralSetting;
use Livewire\Component;


class Config extends Component
{

    use SendTestEmailAndSms;

    public $setting, $smsMethod;

    public $testSms;

    protected $listeners = ['$refresh'];

    public function mount()
    {
        $this->setting = (array)GeneralSetting::first()->sms_config;

        $this->smsMethod = $this->setting['name'];
    }

    public function sendTest()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $this->validate(
            ['testSms' => 'required|numeric|max:15|starts_with:00,+'],
            [
                'numeric|max:15|starts_with:00,+' => 'Invalid mobile number!',
            ]
        );

        $this->sendTestSms($this->testSms) === false
            ? $this->emit('showToast', 'error', 'The SMS cant be send!')
            : $this->emit('showToast', 'success', 'Check you phone for the SMS');

        $this->testSms = '';

        $this->emit('hideModal');
    }

    public function update()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $data = $this->validate();
        $data['setting']['name'] = $this->smsMethod;

        $general = GeneralSetting::first();
        $general->sms_config = $data['setting'];
        $general->save();

        $this->emit('showToast', 'success', 'Your data Updated');
    }

    public function render()
    {
        return view('admin.sms.config')
            ->layout('admin.layout.primary');
    }

    protected function rules()
    {
        return
            [
                'smsMethod' => 'required|in:clickatell,infobip,messageBird,nexmo,smsBroadcast,twilio,textMagic',
                'setting.clickatell_api_key' => 'required_if:smsMethod,clickatell',
                'setting.message_bird_api_key' => 'required_if:smsMethod,messageBird',
                'setting.nexmo_api_key' => 'required_if:smsMethod,nexmo',
                'setting.nexmo_api_secret' => 'required_if:smsMethod,nexmo',
                'setting.infobip_username' => 'required_if:smsMethod,infobip',
                'setting.infobip_password' => 'required_if:smsMethod,infobip',
                'setting.sms_broadcast_username' => 'required_if:smsMethod,smsBroadcast',
                'setting.sms_broadcast_password' => 'required_if:smsMethod,smsBroadcast',
                'setting.text_magic_username' => 'required_if:smsMethod,textMagic',
                'setting.apiv2_key' => 'required_if:smsMethod,textMagic',
                'setting.account_sid' => 'required_if:smsMethod,twilio',
                'setting.auth_token' => 'required_if:smsMethod,twilio',
                'setting.from' => 'required_if:smsMethod,twilio',
            ];
    }
}
