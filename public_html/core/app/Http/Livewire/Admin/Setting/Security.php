<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;


class Security extends Component
{

    public $setting;

    public function mount()
    {
        $this->setting = Setting();
    }

    public function render()
    {
        return view('admin.setting.security')
            ->layout('admin.layout.primary');
    }

    public function save()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        foreach ($this->setting as $key => $value) {
            Setting::where('name', $key)
                ->update(['value' => $value]);
        }

        $this->emit('showToast', 'info', __('Settings saved!'));
    }
}
