<?php

namespace App\Http\Livewire\Admin\Deposit;

use App\Models\Deposit;
use Livewire\Component;
use Livewire\WithPagination;

class UserDeposit extends Component
{
    public $deposit, $details;

    use WithPagination;

    public $search = '';

    public $filter = 1;

    protected $user;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['$refresh'];


    public function mount($userId)
    {
        $this->user = $userId;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view(
            'admin.deposit.log',
            ['deposits' => Deposit::where('user_id', $this->user)
                ->with(['user', 'gateway'])
                ->paginate(getPaginate())]
        )
            ->layout('admin.layout.primary');
    }
}
