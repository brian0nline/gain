@extends('admin.layout.primary')


@push('style')
<style>
    .form-group label{
        color: #000 !important;
    }
    
</style>
@endpush

@section('title', __('Create Withdraw Method | Freeloot'))
@section('page-title', __('Create Withdraw Method'))
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card my-2">
                <form action="{{ route('moder.withdraw.method.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <a href="{{ route('moder.withdraw.method.index') }}"
                            class="btn btn-sm btn-primary box-shadow1 text-small"style="background:#4aa276;border-color: #4aa276;box-shadow:none;">
                            <i class="fa fa-fw fa-backward"></i> @lang('Go Back')
                        </a>
                        <div class="payment-method-item">
                            <div class="payment-method-header">
                                <div class="card-header row my-4" >
                                    <div class="avatar-preview col-6">
                                        <x-bs::image src="{{ getImage('/', imagePath()['withdraw']['method']['size']) }}"
                                            height="50" />
                                    </div>
                                    <div class="custom-file col-6">
                                        <input type="file" name="image" class="form-control" id="image"
                                            accept=".png, .jpg, .jpeg" />
                                        <label class="custom-file-label" for="inputGroupFile01">@lang('Choose Method
                                            Image') </label>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="@lang('Method Name')"
                                            name="name" value="{{ old('name') }}" />
                                     
                                    </div>
                                    <div class="row my-4" style="border-color:#242b27;background:#242b27;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100" style="color:#fff !important;">@lang('Currency') <span
                                                        class="text-danger">*</span></label>

                                                <div class="input-group">
                                                    <input type="text" name="currency" class="form-control border-radius-5"
                                                        value="{{ old('currency') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100" style="color:#fff !important;">@lang('Rate') <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group has_append">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;">1 {{ __($general->cur_text) }} =
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0" name="rate"
                                                        value="{{ old('rate') }}" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;"><span class="currency_symbol"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100"style="color:#fff !important;">@lang('Processing Time') <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="delay" class="form-control border-radius-5"
                                                    value="{{ old('delay') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="row">
                                    <div class="col-lg-6"  style="background: #242b27;">
                                        <div class="card mb-2">
                                            <h5 class="card-header">@lang('Range')</h5>
                                            <div class="card-body">
                                                <div class="input-group has_append mb-3">
                                                    <label class="w-100">@lang('Minimum Amount') <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="min_limit"
                                                        placeholder="0" value="{{ old('min_limit') }}" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;"> {{ __($general->cur_text) }} </div>
                                                    </div>
                                                </div>
                                                <div class="input-group has_append">
                                                    <label class="w-100">@lang('Maximum Amount') <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="0"
                                                        name="max_limit" value="{{ old('max_limit') }}" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary" style="background:#3B4740;border-color:#3B4740;"> {{ __($general->cur_text) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6"  style="background: #242b27;">
                                        <div class="card ">
                                            <h5 class="card-header">@lang('Charge')</h5>
                                            <div class="card-body">
                                                <div class="input-group has_append mb-3">
                                                    <label class="w-100">@lang('Fixed Charge') <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="0"
                                                        name="fixed_charge" value="{{ old('fixed_charge') }}" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;"> {{ __($general->cur_text) }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group has_append">
                                                    <label class="w-100">@lang('Percent Charge') <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="0"
                                                        name="percent_charge" value="{{ old('percent_charge') }}">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;">%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"  style="background: #242b27;">
                                        <div class="card my-2">

                                            <h5 class="card-header">@lang('Instructions') </h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <textarea rows="5" class="form-control border-radius-5 nicEdit"
                                                        name="instruction">{{ old('instruction') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"  style="background: #242b27;">
                                        <div class="card my-2">
                                            <h5 class="card-header">@lang('User data')
                                                <button type="button" class="btn btn-sm btn-dark addUserData" style="background:#242B27;border-color:#242B27;box-shadow:none;">
                                                    <i class="fas fa-fw fa-plus"></i>@lang('Add New')
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

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block" style="background:#4aa276;border-color:#4aa276;box-shadow:none;" >@lang('Save Method')</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>

@endsection


@push('style')
<style>
  
    .form-control:focus{
            border: 2px solid #4aa276;
            box-shadow: none;
        }
</style>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            $('input[name=currency]').on('input', function() {
                $('.currency_symbol').text($(this).val());
            });
            $('.addUserData').on('click', function() {
                var html = `
                    <div class="col-md-12 user-data">
                        <div class="form-group">
                            <div class="input-group mb-md-0 mb-4">
                                <div class="col-md-4">
                                    <input name="field_name[]" class="form-control" type="text" required placeholder="@lang('Field Name')">
                                </div>
                                <div class="col-md-3 mt-md-0 mt-2">
                                    <select name="type[]" class="form-control">
                                        <option value="text" > @lang('Input Text') </option>
                                        <option value="textarea" > @lang('Textarea') </option>
                                        <option value="file"> @lang('File') </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-md-0 mt-2">
                                    <select name="validation[]"
                                            class="form-control">
                                        <option value="required"> @lang('Required') </option>
                                        <option value="nullable">  @lang('Optional') </option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-md-0 mt-2 text-right">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger btn-lg removeBtn w-100" type="button" style="box-shadow:none;">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>`;

                $('.addedField').append(html);
            });

            $(document).on('click', '.removeBtn', function() {
                $(this).closest('.user-data').remove();
            });
            @if (old('currency'))
                $('input[name=currency]').trigger('input');
            @endif
        })(jQuery);
    </script>
    @section('editor', true)
@endpush
