<?php

namespace App\Http\Livewire\System\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use App\Models\System\Config as SystemConfig;


class Config extends Component
{

    public $systemConfig;
    public $name;

    public function mount(SystemConfig $config)
    {
        $this->systemConfig = $config;
        foreach ($config->get()->toArray() as $value) {
            $this->name[$value['name']] = $value['value'];
        }
    }

    public function route()
    {
        return Route::get('admin/antifraud', static::class)
            ->name('moder.offers.config')
            ->middleware(['auth', 'permission:admin']);
    }


    public function render()
    {
        return view('system.admin.setup')
            ->layout('admin.layout.primary');
    }

    public function rules()
    {

        return [
            'name' => 'nullable',
        ];
    }

    public function save()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }
        $this->validate();

        foreach ($this->name as $name => $value) {
            $query = $this->systemConfig->where('name', $name)->first();
            $query ? $query->update(['value' => $value])
                : $this->systemConfig->insert([
                    'name' => $name,
                    'value' => $value
                ]);
        }
        $this->emit('showToast', 'info', __('Settings saved!'));
    }
}
