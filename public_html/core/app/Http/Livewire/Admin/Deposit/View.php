<?php

namespace App\Http\Livewire\Admin\Deposit;

use App\Models\Deposit;
use Livewire\Component;


class View extends Component
{

    public $deposit, $details;

    public function mount($deposit)
    {

        $this->deposit = Deposit::where('id', $deposit)->with(['user', 'gateway'])->firstOrFail();
        $this->details = ($this->deposit->detail != null) ? json_encode($deposit->detail) : null;
    }


    public function render()
    {
        return view('admin.deposit.view')
            ->layout('admin.layout.primary');
    }
}
