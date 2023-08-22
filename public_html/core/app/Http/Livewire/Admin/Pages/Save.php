<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $page, $title, $content, $img, $type, $isCompleted;

    public function route()
    {
        return Route::get('moder/page/create', static::class)
            ->name('moder.page.create')
            ->middleware(['auth', 'permission:admin']);
    }


    public function render()
    {
        return view('admin.pages.save')
            ->layout('admin.layout.primary');
    }

    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'img' => ['required', 'image'],
            'content' => ['required'],
            'type' => ['required'],
            'isCompleted' => ['required'],
        ];
    }

    public function save()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $validated = $this->validate();

        $imageName = Str::slug($this->title) . '.' . $this->img->extension();

        $this->img->storeAs('photos/blog', $imageName, 'public');

        $validated['img'] = $imageName;
        $validated['slug'] = Str::slug($this->title);

        Page::create($validated);

        $this->emit('showToast', 'success', __('Page saved!'));

        return redirect()->route('admin.pages');
    }
}
