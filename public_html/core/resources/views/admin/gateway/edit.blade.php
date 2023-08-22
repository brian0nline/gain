<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('moder.gateway.list') }}"
                        class="btn btn-sm btn-primary box-shadow1 text-small float-start"><i
                            class="fa fa-fw fa-backward"></i>@lang('Go
                        Back')</a>
                    <h3 class="card-title text-center">{{ __($gateway->name) }} Gateway</h3>
                </div>
                <form action="{{ route('moder.gateway.automatic.update', $gateway->code) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="alias" value="{{ $gateway->alias }}">
                    <input type="hidden" name="description" value="{{ $gateway->description }}">

                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-bs::image
                                        src="{{ getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size']) }}"
                                        height="100" />
                                </div>
                                <div class="form-group col-md-6 my-2">
                                    <x-bs::input type="file" name="image" class="form-control" id="image"
                                        accept=".png, .jpg, .jpeg" />
                                    <label for="image" class="bg-primary form-label"><i
                                            class="fa fa-pencil"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('admin.gateway.parties.global-setting')
                            <hr />
                            <div class="container">
                                <h3 class="text-center"> Currencies Setting For {{ $gateway->name }} </h3>
                                <p>{{ __($gateway->description) }}</p>
                            </div>
                            @include(
                                'admin.gateway.parties.enabled-currencies'
                            )
                            <hr>
                            <div class="d-flex justify-content-center">
                                <select class="newCurrencyVal form-control w-75 w-sm-100">
                                    <option value="">@lang('Select currency')</option>
                                    @forelse($supportedCurrencies as $currency => $symbol)
                                        <option value="{{ $currency }}" data-symbol="{{ $symbol }}">
                                            {{ __($currency) }}
                                        </option>
                                    @empty
                                        <option value="">@lang('No available currency support')</option>
                                    @endforelse
                                </select>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary newCurrencyBtn"
                                        data-crypto="{{ $gateway->crypto }}"
                                        data-name="{{ $gateway->name }}">@lang('Add new')
                                    </button>
                                </div>
                            </div>

                            @include('admin.gateway.parties.child-form')

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block py-2">
                                @lang('Update Setting')
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.gateway.parties.confirm-delete-modal')
</div>

@push('script')
    <script src="{{ asset('asset/admin/gateway.js') }}"></script>
@endpush
</div>
