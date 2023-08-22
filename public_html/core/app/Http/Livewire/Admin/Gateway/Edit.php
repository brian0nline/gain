<?php

namespace App\Http\Livewire\Admin\Gateway;

use App\Models\Gateway;
use Livewire\Component;

class Edit extends Component
{
    public $gateway, $supportedCurrencies, $parameters;

    public $global_parameters = null;

    public $hasCurrencies = false;

    public $currencyIdx = 1;


    public function mount($alias)
    {
        $this->gateway = Gateway::automatic()
            ->with('currencies')
            ->where('alias', $alias)
            ->firstOrFail();

        $this->supportedCurrencies = collect(json_decode($this->gateway->supported_currencies))
            ->except($this->gateway->currencies->pluck('currency'));

        $this->parameters = collect(json_decode($this->gateway->gateway_parameters));

        if ($this->gateway->currencies->count() > 0) {
            $this->global_parameters = json_decode(
                $this->gateway
                    ->currencies
                    ->first()
                    ->gateway_parameter
                , true);
            $this->hasCurrencies = true;
        }
    }

    public function render()
    {
        return view('admin.gateway.edit')
            ->layout('admin.layout.primary');
    }
}
