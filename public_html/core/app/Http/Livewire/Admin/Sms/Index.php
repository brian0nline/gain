<?php

namespace App\Http\Livewire\Admin\Sms;

use App\Models\SmsTemplate;
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
        return redirect()->route('moder.sms.edit-template', $templateId);
    }


    public function updateStatus($templateId, $status)
    {
        $template = SmsTemplate::where('id', $templateId)->update([
            'sms_status' => $status == 0 ? 1 : 0
        ]);

        $this->resetPage();
    }


    public function render()
    {
        return view('admin.sms.index', [
            'templates' => SmsTemplate::where('name', 'LIKE', "%" . $this->search . "%")->paginate(5),
        ])->layout('admin.layout.primary');
    }
}
