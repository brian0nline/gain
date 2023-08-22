<?php

namespace App\Http\Livewire\Admin\Sms;

use App\Models\SmsTemplate;
use Livewire\Component;

class EditTemplate extends Component
{

    public $template;
    protected $rules =
        [
            'template.sms_body' => 'required|string|min:2',
            'template.sms_status' => 'boolean',
        ];

    public function mount($templateId)
    {
        $this->template = SmsTemplate::where('id', $templateId)->first()->toArray();
    }

    public function cancelEdit()
    {
        return redirect()->route('moder.sms.templates');
    }

    public function update()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $this->validate();

        SmsTemplate::where('id', $this->template['id'])->update([
            'sms_body' => $this->template['sms_body'],
            'sms_status' => $this->template['sms_status'],
        ]);

        $this->emit('showToast', 'info', __('The Templated saved!'));

        return redirect()->route('moder.sms.templates');
    }

    public function render()
    {
        return view('admin.sms.edit')
            ->layout('admin.layout.primary');
    }
}
