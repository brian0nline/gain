<?php

namespace App\Http\Controllers\Traits;

use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


trait GatewayUpdate
{
    public function gatewayValidator(Request $request)
    {
        $validation_rule = [
            'alias' => 'required',
            'description' => 'nullable',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ];
        $validator = Validator::make($request->all(), $validation_rule);
        return $validator;
    }

    public function gatewayCurrencyValidator(Request $request, Gateway $gateway)
    {
        $custom_attributes = [];
        $validation_rule = [];

        $param_list = collect(json_decode($gateway->gateway_parameters));
        $supported_currencies = collect(json_decode($gateway->supported_currencies))->flip()->implode(',');

        foreach ($param_list->where('global', true) as $key => $pram) {
            $validation_rule['global.' . $key] = 'required';
            $custom_attributes['global.' . $key] = $this->keyToWords($key);
        }


        if ($request->has('currency')) {
            foreach ($request->currency as $key => $currency) {
                $validation_rule['currency.' . $key . '.currency'] = 'required|max:10|string|in:' . $supported_currencies;
                $validation_rule['currency.' . $key . '.symbol'] = 'required|max:3|string';

                $validation_rule['currency.' . $key . '.name'] = 'required|max:60';
                $validation_rule['currency.' . $key . '.image'] = ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])];
                $validation_rule['currency.' . $key . '.min_amount'] = 'required|numeric|lte:currency.' . $key . '.max_amount';
                $validation_rule['currency.' . $key . '.max_amount'] = 'required|numeric|gt:0|gte:currency.' . $key . '.min_amount';
                $validation_rule['currency.' . $key . '.fixed_charge'] = 'required|numeric|gte:0';
                $validation_rule['currency.' . $key . '.percent_charge'] = 'required|numeric|min:0|max:100';
                $validation_rule['currency.' . $key . '.rate'] = 'required|numeric|gt:0';

                $supported_currencies = explode(',', $supported_currencies);

                $supported_currencies = collect(removeElement($supported_currencies, $currency['currency']))->implode(',');

                $currency_identifier = $this->currencyIdentifier($currency['name'], $gateway->name . ' ' . $currency['currency']);

                $custom_attributes['currency.' . $key . '.name'] = $currency_identifier . ' name';
                $custom_attributes['currency.' . $key . '.image'] = $currency_identifier . ' ' . $this->keyToWords('image');
                $custom_attributes['currency.' . $key . '.min_amount'] = $currency_identifier . ' ' . $this->keyToWords('min_amount');
                $custom_attributes['currency.' . $key . '.max_amount'] = $currency_identifier . ' ' . $this->keyToWords('max_amount');
                $custom_attributes['currency.' . $key . '.fixed_charge'] = $currency_identifier . ' ' . $this->keyToWords('fixed_charge');
                $custom_attributes['currency.' . $key . '.percent_charge'] = $currency_identifier . ' ' . $this->keyToWords('percent_charge');
                $custom_attributes['currency.' . $key . '.rate'] = $currency_identifier . ' ' . $this->keyToWords('rate');
                $custom_attributes['currency.' . $key . '.currency'] = $currency_identifier . ' ' . $this->keyToWords('currency');
                $custom_attributes['currency.' . $key . '.symbol'] = $currency_identifier . ' ' . $this->keyToWords('symbol');

                foreach ($param_list->where('global', false) as $param_key => $param_value) {
                    $validation_rule['currency.' . $key . '.param.' . $param_key] = 'required';
                    $custom_attributes['currency.' . $key . '.param.' . $param_key] = $currency_identifier . ' ' . $this->keyToWords($param_value->title);
                }
            }
        }

        $validator = Validator::make($request->all(), $validation_rule, $custom_attributes);
        return $validator;
    }

    public function keyToWords($key, $separator = '_')
    {
        return ucwords(str_replace('_', ' ', $key));
    }

    public function currencyIdentifier($name, $default = '')
    {
        return $name ?? $default;
    }

    public function globalParm($gateway, $request)
    {
        $parameters = collect(json_decode($gateway->gateway_parameters));

        foreach ($parameters->where('global', true) as $key => $pram) {
            $parameters[$key]->value = $request->global[$key];
        }

        return $parameters;
    }

    public function currencyParm($parameters, $currency)
    {
        $param = [];
        foreach ($parameters->where('global', true) as $pkey => $pram) {
            $param[$pkey] = $pram->value;
        }

        foreach ($parameters->where('global', false) as $param_key => $param_value) {
            $param[$param_key] = $currency['param'][$param_key];
        }
        return $param;
    }

    public function uploadGatewayImage($image, $fileName)
    {
        $path = imagePath()['gateway']['path'];
        $size = imagePath()['gateway']['size'];

        try {
            return uploadImage($image, $path, $size, $fileName);

        } catch (\Exception $exp) {
            return false;
        }
    }

    public function saveNewGatewayCurrency($currency, $gateway, $filename, $param)
    {
        return new GatewayCurrency([
            'name' => $currency['name'],
            'gateway_alias' => $gateway->alias,
            'image' => $filename,
            'currency' => $currency['currency'],
            'min_amount' => $currency['min_amount'],
            'max_amount' => $currency['max_amount'],
            'fixed_charge' => $currency['fixed_charge'],
            'percent_charge' => $currency['percent_charge'],
            'rate' => $currency['rate'],
            'symbol' => $currency['symbol'],
            'gateway_parameter' => json_encode($param),
        ]);

    }
}
