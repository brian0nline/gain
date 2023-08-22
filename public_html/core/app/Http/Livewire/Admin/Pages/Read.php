<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Read extends Component
{
    use WithFileUploads;

    public $page;
    public $img = false;

    public function route()
    {
        return Route::get('moder/pages/read/{page}', static::class)
            ->name('moder.page.read')
            ->middleware(['auth', 'permission:admin']);
    }

    public function mount(Page $page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('admin.pages.read')
            ->layout('admin.layout.primary');
    }

    public function rules()
    {
        return [
            'page.title' => ['required', 'max:255'],
            'page.content' => ['required'],
            'page.type' => ['required'],
            'page.isCompleted' => ['required'],
        ];
    }

    public function update()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $validated = $this->validate()['page'];
        //dd($validated);

        if ($this->img) {

            $this->validate(['img' => 'image']);

            $imageName = Str::slug($this->page->title) . '.' . $this->img->extension();

            $this->img->storeAs('photos/blog', $imageName, 'public');

            $validated['img'] = $imageName;
        }

        $validated['slug'] = Str::slug($this->page->title);

        Page::where('id', $this->page->id)->update($validated);

        $this->emit('showToast', 'success', __('Page updated!'));

        return redirect()->route('admin.pages');
    }
}
