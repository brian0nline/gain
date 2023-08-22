<?php

namespace App\Http\Livewire\Admin\Email;

use App\Models\EmailTemplate;
use Livewire\Component;

class EditTemplate extends Component
{

    public $template;
    protected $rules =
        [
            'template.email_body' => 'required|string|min:2',
            'template.email_status' => 'boolean',
        ];

    public function mount($templateId)
    {
        $this->template = EmailTemplate::where('id', $templateId)->first()->toArray();
    }

    public function cancelEdit()
    {
        return redirect()->route('moder.email.templates');
    }

    public function update()
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $this->validate();

        EmailTemplate::where('id', $this->template['id'])->update([
            'subj' => $this->template['subj'],
            'email_body' => $this->template['email_body'],
            'email_status' => $this->template['email_status'],
        ]);

        $this->emit('showToast', 'info', __('The Templated saved!'));

        return redirect()->route('moder.email.templates');
    }

    public function render()
    {
        return view('admin.email.edit')
            ->layout('admin.layout.primary');
    }
}
