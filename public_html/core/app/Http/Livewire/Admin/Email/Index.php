<?php

namespace App\Http\Livewire\Admin\Email;

use App\Models\EmailTemplate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit($templateId)
    {
        return redirect()->route('moder.email.edit-template', $templateId);
    }


    public function updateStatus($templateId, $status)
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $template = EmailTemplate::where('id', $templateId)->update([
            'email_status' => $status == 0 ? 1 : 0
        ]);

        $this->resetPage();
    }


    public function render()
    {
        return view('admin.email.index', [
            'templates' => EmailTemplate::where('name', 'LIKE', "%" . $this->search . "%")->paginate(5),
        ])->layout('admin.layout.primary');
    }
}
