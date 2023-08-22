<hr />
@isset($gateway->currencies)
    @foreach ($gateway->currencies as $gatewayCurrency)
        <input type="hidden" name="currency[{{ $currencyIdx }}][symbol]" value="{{ $gatewayCurrency->symbol }}">
        <div class="payment-method-item child-item">
            <div class="payment-method-header">
                <h4 class="mb-3">{{ __($gateway->name) }} -
                    {{ __($gatewayCurrency->currency) }}</h4>
                <div class="remove-btn float-end">
                    <button type="button" class="btn btn-danger deleteBtn" data-id="{{ $gatewayCurrency->id }}"
                        data-name="{{ $gatewayCurrency->currencyIdentifier() }}">
                        <i class="fa fa-trash-o mr-2"></i>@lang('Remove')
                    </button>
                </div>
                <div class="d-flex justify-content-center">
                    <x-bs::image
                        src="{{ getImage(imagePath()['gateway']['path'] . '/' . $gatewayCurrency->image, imagePath()['gateway']['size']) }}"
                        height="50" class="mx-2" />
                    <div class="avatar-edit">
                        <input type="file" name="currency[{{ $currencyIdx }}][image]" id="image{{ $currencyIdx }}"
                            class="form-control w-100 my-2" accept=".png, .jpg, .jpeg" />
                    </div>
                </div>
                <div class="form-group">
                    <label>Name of Currency</label>
                    <input type="text" class="form-control" placeholder="@lang('Name of the Gateway')"
                        name="currency[{{ $currencyIdx }}][name]" value="{{ $gatewayCurrency->name }}" required />
                </div>
            </div>
            <div class="payment-method-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card">
                            <h5 class="text-center bg-dark p-1 text-white">@lang('Range')</h5>
                            <div class="p-1">
                                <div class="input-group mb-3">
                                    <label class="w-100">@lang('Minimum Amount') <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            {{ __($general->cur_sym) }}
                                        </div>
                                    </div>
                                    <input type="text" class="form-control"
                                        name="currency[{{ $currencyIdx }}][min_amount]"
                                        value="{{ getAmount($gatewayCurrency->min_amount) }}" placeholder="0" required />
                                </div>
                                <div class="input-group">
                                    <label class="w-100">@lang('Maximum Amount') <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            {{ __($general->cur_sym) }}
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0"
                                        name="currency[{{ $currencyIdx }}][max_amount]"
                                        value="{{ getAmount($gatewayCurrency->max_amount) }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card">
                            <h5 class="text-center bg-dark p-1 text-white">@lang('Charge')</h5>
                            <div class="p-1">
                                <div class="input-group mb-3">
                                    <label class="w-100">@lang('Fixed Charge') <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            {{ __($general->cur_sym) }}
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0"
                                        name="currency[{{ $currencyIdx }}][fixed_charge]"
                                        value="{{ getAmount($gatewayCurrency->fixed_charge) }}" required />
                                </div>
                                <div class="input-group">
                                    <label class="w-100">@lang('Percent Charge') <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0"
                                        name="currency[{{ $currencyIdx }}][percent_charge]"
                                        value="{{ getAmount($gatewayCurrency->percent_charge) }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card">
                            <h5 class="text-center bg-dark p-1 text-white">@lang('Currency')</h5>
                            <div class="p-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <label class="w-100">@lang('Currency')</label>
                                            <input type="text" name="currency[{{ $currencyIdx }}][currency]"
                                                class="form-control border-radius-5 "
                                                value="{{ $gatewayCurrency->currency }}" readonly />
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <label class="w-100">@lang('Symbol')</label>
                                            <input type="text" name="currency[{{ $currencyIdx }}][symbol]"
                                                class="form-control border-radius-5 symbl"
                                                value="{{ $gatewayCurrency->symbol }}"
                                                data-crypto="{{ $gateway->crypto }}" required />
                                        </div>

                                    </div>
                                </div>
                                <div class="input-group">
                                    <label class="w-100">@lang('Rate') <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group-prepend">

                                        <div class="input-group-text">1
                                            {{ __($general->cur_text) }}
                                            =
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="0"
                                        name="currency[{{ $currencyIdx }}][rate]"
                                        value="{{ getAmount($gatewayCurrency->rate) }}" required />
                                    <div class="input-group-append">

                                        <div class="input-group-text"><span
                                                class="currency_symbol">{{ __($gatewayCurrency->baseSymbol()) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if ($parameters->where('global', false)->count() != 0)
                        @php
                            $gateway_parameter = json_decode($gatewayCurrency->gateway_parameter);
                        @endphp
                        <div class="col-lg-12">
                            <div class="card border-primary mt-4">
                                <h5 class="text-center bg-dark p-1 text-whitelang('Configuration')</h5>
                                <div class="
                                    p-1">
                                    <div class="row">
                                        @foreach ($parameters->where('global', false) as $key => $param)
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <label class="w-100">{{ __($param->title) }}
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="currency[{{ $currencyIdx }}][param][{{ $key }}]"
                                                        value="{{ $gateway_parameter->$key }}" placeholder="--"
                                                        required />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                </div>
    @endif
    </div>
    </div>
    </div>
    @php $currencyIdx++ @endphp
    @endforeach
@endisset
