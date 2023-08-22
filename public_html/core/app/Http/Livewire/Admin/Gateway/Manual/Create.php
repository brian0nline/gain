<?php

namespace App\Http\Livewire\Admin\Gateway\Manual;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('admin.gateway.manual.create')
            ->layout('admin.layout.primary');
    }
}
