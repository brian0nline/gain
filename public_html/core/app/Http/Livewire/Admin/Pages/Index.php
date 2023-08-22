<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'Title';
    public $sorts = ['Title', 'Newest', 'Oldest'];
    public $filter = 'All';
    public $filters = ['All', 'First 100'];

    protected $listeners = ['$refresh'];

    public function route()
    {
        return Route::get('moder/pages', static::class)
            ->name('admin.pages')
            ->middleware(['auth', 'permission:admin']);
    }

    public function render()
    {
        return view(
            'admin.pages.index',
            ['pages' => Page::paginate(getPaginate())]
        )->layout('admin.layout.primary');
    }

    public function query()
    {
        $query = Page::query();

        if ($this->search) {
            $query->where(function (Builder $query) {
                $query->where('id', 'like', '%' . $this->search . '%');
                $query->orWhere('title', 'like', '%' . $this->search . '%');
            });
        }

        switch ($this->sort) {
            case 'Title':
                $query->orderBy('title');
                break;
            case 'Newest':
                $query->orderByDesc('created_at');
                break;
            case 'Oldest':
                $query->orderBy('created_at');
                break;
        }

        switch ($this->filter) {
            case 'All':
                break;
            case 'First 100':
                $query->where('id', '<=', 100);
                break;
        }

        return $query;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function makePublic(Page $page)
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $page->update(['isCompleted' => true]);

        $this->emit('showToast', 'info', __('Page updated !'));
    }

    public function makePrivate(Page $page)
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $page->update(['isCompleted' => false]);

        $this->emit('showToast', 'info', __('Page updated !'));
    }

    public function delete(Page $page)
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $page->delete();

        $this->emit('showToast', 'success', __('Page deleted!'));
    }
}
