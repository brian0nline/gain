<?php

namespace App\Http\Livewire\Admin\Deposit;

use App\Models\Deposit;
use Livewire\Component;
use Livewire\WithPagination;

class Pending extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('admin.deposit.pending', [
            'deposits' => Deposit::where('method_code', '>=', 1000)
                ->where('status', 2)
                ->where('trx', 'like', '%' . $this->search . '%')
                ->orWhereHas('user', function ($query) {
                    return $query->where('username', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('gateway', function ($query) {
                    return $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->with(['user', 'gateway'])
                ->orderBy('id', 'desc')
                ->paginate(getPaginate())
        ])
            ->layout('admin.layout.primary');
    }
}
