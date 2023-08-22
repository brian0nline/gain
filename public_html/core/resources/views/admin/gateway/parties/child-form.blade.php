<div class="payment-method-item child-item newMethodCurrency d-none">
    <input disabled type="hidden" name="currency[{{ $currencyIdx }}][symbol]" class="currencySymbol">
    <div class="payment-method-header">
        <div class="d-flex justify-content-center">
            <x-bs::image src="{{ getImage(imagePath()['gateway']['path'], imagePath()['gateway']['size']) }}"
                height="50" class="mx-2" />
            <div class="form-group">
                <input disabled type="file" accept=".png, .jpg, .jpeg" class="form-control"
                    id="image{{ $currencyIdx }}" name="currency[{{ $currencyIdx }}][image]" />
            </div>
        </div>

        <div class="content">
            <div class="d-flex justify-content-between">
                <div class="form-group">
                    <h4 class="mb-3" id="payment_currency_name">@lang('Name')
                    </h4>
                    <input disabled type="text" class="form-control" placeholder="@lang('Name for Gateway')"
                        name="currency[{{ $currencyIdx }}][name]" required />
                </div>
                <div class="remove-btn">
                    <button type="button" class="btn btn-danger newCurrencyRemove">
                        <i class="fa fa-trash-o mr-2"></i>@lang('Remove')
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="payment-method-body">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="card">
                    <h5 class="text-center bg-dark p-1 text-white">@lang('Range')</h5>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <label class="w-100">@lang('Minimum Amount') <span
                                    class="text-danger">*</span></label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    {{ __($general->cur_text) }}
                                </div>
                            </div>
                            <input disabled type="text" class="form-control"
                                name="currency[{{ $currencyIdx }}][min_amount]" placeholder="0" required />
                        </div>

                        <div class="input-group">
                            <label class="w-100">@lang('Maximum Amount') <span
                                    class="text-danger">*</span></label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    {{ __($general->cur_text) }}
                                </div>
                            </div>

                            <input disabled type="text" class="form-control" placeholder="0"
                                name="currency[{{ $currencyIdx }}][max_amount]" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="card">
                    <h5 class="text-center bg-dark p-1 text-white">@lang('Charge')</h5>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <label class="w-100">@lang('Fixed Charge') <span
                                    class="text-danger">*</span></label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    {{ __($general->cur_text) }}
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" placeholder="0"
                                name="currency[{{ $currencyIdx }}][fixed_charge]" required />
                        </div>
                        <div class="input-group">
                            <label class="w-100">@lang('Percent Charge') <span
                                    class="text-danger">*</span></label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                            <input disabled type="text" class="form-control" placeholder="0"
                                name="currency[{{ $currencyIdx }}][percent_charge]" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                <div class="card">
                    <h5 class="text-center bg-dark p-1 text-white">@lang('Currency')</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <label class="w-100">@lang('Currency')</label>
                                    <input disabled type="text" class="form-control currencyText border-radius-5"
                                        name="currency[{{ $currencyIdx }}][currency]" readonly />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <label class="w-100">@lang('Symbol')</label>
                                    <input type="text" name="currency[{{ $currencyIdx }}][symbol]"
                                        class="form-control border-radius-5 symbl"
                                        ata-crypto="{{ $gateway->crypto }}" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="w-100">@lang('Rate') <span class="text-danger">*</span></label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <b>1 </b>&nbsp; {{ __($general->cur_text) }}&nbsp; =
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" placeholder="0"
                                name="currency[{{ $currencyIdx }}][rate]" required />
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="currency_symbol"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($parameters->where('global', false)->count() != 0)
                <div class="col-lg-12">
                    <div class="card border-primary mt-4">
                        <h5 class="card-header bg-dark">@lang('Configuration')</h5>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($parameters->where('global', false) as $key => $param)
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <label class="w-100">{{ __($param->title) }}
                                                <span class="text-danger">*</span></label>
                                            <input disabled type="text" class="form-control"
                                                name="currency[{{ $currencyIdx }}][param][{{ $key }}]"
                                                placeholder="--" required />
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
