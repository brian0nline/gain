<div class="my-2">
    <h4 class="mb-3">@lang('Global Setting for') {{ __($gateway->name) }}
    </h4>
    <div class="row">
        @foreach ($parameters->where('global', true) as $key => $param)
            <div class="form-group col-lg-6">
                <label>{{ __(@$param->title) }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="global[{{ $key }}]"
                    value="{{ @$param->value }}" required />
            </div>
        @endforeach
    </div>
    @if ($gateway->code < 1000 && $gateway->extra)
        <div class="payment-method-body mt-2">
            <h4 class="mb-3">@lang('Configurations')</h4>
            <div class="row">
                @foreach ($gateway->extra as $key => $param)
                    <div class="form-group col-lg-6">
                        <label>{{ __(@$param->title) }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ route($param->value) }}" readonly />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="copyInput" data-toggle="tooltip" title="@lang('Copy')"><i
                                            class="fa fa-copy"></i></span>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
