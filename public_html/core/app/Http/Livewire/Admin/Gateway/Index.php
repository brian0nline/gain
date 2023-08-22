<?php

namespace App\Http\Livewire\Admin\Gateway;

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

    public function edit($alias)
    {
        return redirect()->route('moder.gateway.edit', $alias);
    }

    public function updateStatus($gatewayId, $status)
    {
        Gateway::where('id', $gatewayId)->update([
            'status' => $status == 0 ? 1 : 0
        ]);

        $this->resetPage();
    }

    public function delete($gatewayId, $code)
    {
        if (env('APP_DEMO')) {
            $this->emit('showToast', 'danger', __('Sorry,Not Available in demo version!'));
            return;
        }

        $gateway = Gateway::where('code', $code)->firstOrFail();

        $gateway_currency = $gateway->currencies()->find($gatewayId);

        removeFile(imagePath()['gateway']['path'] . '/' . $gateway_currency->image);

        $gateway_currency->delete();

        $this->emit('showToast', 'info', 'The currency deleted!');
    }

    public function render()
    {

        return view('admin.gateway.index', [
            'gateways' => Gateway::automatic()->with('currencies')->where('name', 'like', "%" . $this->search . "%")->paginate(getPaginate(5)),
        ])->layout('admin.layout.primary');
    }
}
