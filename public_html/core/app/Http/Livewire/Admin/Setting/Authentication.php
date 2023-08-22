<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class Authentication extends Component
{
    public $setting;


    public function mount()
    {
        $this->setting = setting();
        $this->setting['enable_google_auth'] = (bool)set('enable_google_auth');
    }

    public function save()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        Setting::where('name', 'enable_google_auth')
            ->update(['value' => $this->setting['enable_google_auth'] ? 1 : 0]);

        foreach ($this->setting as $key => $value) {
            Setting::where('name', $key)
                ->update(['value' => $value]);
        }

        $this->emit('showToast', 'info', __('Settings Saved!'));
    }

    public function render()
    {
        // dd($this->setting['enable_google_auth']);

        return view('admin.setting.authentication')
            ->layout('admin.layout.primary');
    }
}
