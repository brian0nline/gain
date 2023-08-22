@section('title', __('Create new manual payment'))
@section('page-title', __('Create new manual payment'))
<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('moder.gateway.manual.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="payment-method-item">
                            <div class="payment-method-header">
                                <div class="card-header">
                                    <x-bs::image
                                        src="{{ getImage(imagePath()['gateway']['path'], imagePath()['gateway']['size']) }}"
                                        height="50"/>

                                    <div class="form-group my-3 float-start">
                                        <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg"
                                               class="form-control w-75" readonly/>
                                    </div>
                                </div>

                                <div class="content">
                                    <div class="row mt-4 mb-none-15">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Gateway Name') <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control "
                                                       placeholder="@lang('Method Name')" name="name"
                                                       value="{{ old('name') }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Currency') <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="currency" placeholder="@lang('Currency')"
                                                       class="form-control border-radius-5"
                                                       value="{{ old('currency') }}"
                                                       required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <label class="w-100 font-weight-bold">@lang('Rate') <span
                                                    class="text-danger">*</span></label>

                                            <div class="input-group has_append">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">1 {{ __($general->cur_text) }} =
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="0" name="rate"
                                                       value="{{ old('rate') }}" required/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="currency_symbol"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3">
                                <div class="row">

                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card">
                                            <h5 class="card-header">@lang('Range')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Minimum Amount') <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">{{ __($general->cur_sym) }}
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="min_limit"
                                                           placeholder="0" value="{{ old('min_limit') }}" required/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Maximum Amount') <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">{{ __($general->cur_sym) }}
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0"
                                                           name="max_limit" value="{{ old('max_limit') }}" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card">
                                            <h5 class="card-header">@lang('Charge')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Fixed Charge') <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">{{ __($general->cur_sym) }}
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0"
                                                           name="fixed_charge" value="{{ old('fixed_charge') }}"
                                                           required/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Percent Charge') <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">@lang('%')</div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0"
                                                           name="percent_charge" value="{{ old('percent_charge') }}"
                                                           required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <h5 class="card-header">@lang('Deposit Instruction')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <textarea rows="8" class="form-control border-radius-5"
                                                              name="instruction" id="content"
                                                              required>{{ old('instruction') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">@lang('User data')
                                                <button type="button"
                                                        class="btn btn-sm btn-dark float-right addUserData"><i
                                                        class="fas fa-fw fa-plus"></i>@lang('Add New')
                                                </button>
                                            </h5>

                                            <div class="card-body">
                                                <div class="row addedField">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">@lang('Save Method')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @endpush
    @push('script')
        <script src="{{ asset('asset/admin/gateway.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(function () {
                $('#content').summernote({
                    height: 100, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false,
                    callbacks: {
                        onChange: function (contents, $editable) {
                        @this.set('page.content', contents);
                        }
                    }
                })
            })
        </script>
    @endpush
</div>
