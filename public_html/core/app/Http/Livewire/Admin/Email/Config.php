<?php

namespace App\Http\Livewire\Admin\Email;

use App\Http\Controllers\Traits\SendTestEmailAndSms;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Config extends Component
{


    use SendTestEmailAndSms;

    public $setting, $emailMethod;

    public $testEmail;

    protected $listeners = ['$refresh'];

    public function mount()
    {
        $this->setting = (array)GeneralSetting::first()->mail_config;

        $this->emailMethod = $this->setting['name'];
    }

    public function sendTest()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $this->validate(['testEmail' => 'required|email']);

        ($send = $this->sendTestEmail($this->testEmail)) !== true
            ? $this->emit('showToast', 'danger', 'Error' . $send)
            : $this->emit('showToast', 'success', 'Check you inbox for the email');

        $this->emit('hideModal');
    }

    public function update()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $data = $this->validate();
        $data['setting']['name'] = $this->emailMethod;

        $general = GeneralSetting::first();
        $general->mail_config = $data['setting'];
        $general->save();

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        $this->emit('showToast', 'success', 'Your data Updated');
    }

    public function render()
    {
        return view('admin.email.config')
            ->layout('admin.layout.primary');
    }

    protected function rules()
    {
        return
            [
                'emailMethod' => 'required|in:php,smtp,sendgrid,mailjet',
                'setting.host' => 'required_if:emailMethod,smtp|string|min:1|max:191',
                'setting.port' => 'required_if:emailMethod,smtp|numeric',
                'setting.username' => 'required_if:emailMethod,smtp|string|min:1|max:191',
                'setting.password' => 'required_if:emailMethod,smtp|string',
                'setting.enc' => 'required_if:emailMethod,smtp|in:ssl,tls',
                'setting.appkey' => 'required_if:emailMethod,sendgrid|string',
                'setting.public_key' => 'required_if:emailMethod,mailjet|string',
                'setting.secret_key' => 'required_if:emailMethod,mailjet|string',
            ];
    }
}
