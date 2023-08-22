<?php

namespace App\Http\Livewire\Admin\Gateway\Manual;

use App\Models\Gateway;
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

    public function updateStatus($gatewayId, $status)
    {
        Gateway::where('id', $gatewayId)->update([
            'status' => $status == 0 ? 1 : 0
        ]);

        $this->resetPage();
    }

    public function delete($gatewayId)
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        Gateway::where('id', $gatewayId)->delete();

        $this->emit('showToast', 'info', 'The payment deleted');

        $this->resetPage();
    }

    public function render()
    {
        return view('admin.gateway.manual.index', [
            'gateways' => Gateway::manual()
                ->orderBy('id', 'desc')
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate(5)
        ])->layout('admin.layout.primary');
    }
}
