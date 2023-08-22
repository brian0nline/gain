<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Route;
use Livewire\Component;


class Control extends Component
{

    public $setting, $timezones, $updateTimezone;

    public function mount()
    {
        $this->setting = GeneralSetting::first()->toArray();
        $this->timezones = json_decode(file_get_contents(resource_path('js/timezone.json')));
        $this->updateTimezone = config('timezone.timezone');

    }

    public function route()
    {
        return Route::get('moder/setting/control', static::class)
            ->middleware(['auth', 'permission:admin'])
            ->name('moder.setting.control');
    }


    public function render()
    {
        return view('admin.setting.setup')
            ->layout('admin.layout.primary');
    }
}
