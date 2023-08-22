<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;


class General extends Component
{

    use WithFileUploads;

    public $setting;


    public function mount()
    {
        $this->setting = setting();
    }


    public function render()
    {
        return view('admin.setting.general')
            ->layout('admin.layout.primary');
    }

    public function saveSocial()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $this->validate([
            'setting.siteSocialImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!is_null($this->setting['siteSocialImage']))
            $this->setting['siteSocialImage']->storeAs('photos', 'social-img.png', 'public');

        $this->save();
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

    public function saveSiteLogoAndFavicon()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $this->validate([
            'setting.siteLogoImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'setting.siteFaviconImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!is_null($this->setting['siteLogoImage']))
            $this->setting['siteLogoImage']->storeAs('photos', 'logo-img.png', 'public');

        if (!is_null($this->setting['siteFaviconImage']))
            $this->setting['siteFaviconImage']->storeAs('photos', 'Favicon-img.png', 'public');

        $this->emit('showToast', 'info', __('Images updated'));
    }
}
