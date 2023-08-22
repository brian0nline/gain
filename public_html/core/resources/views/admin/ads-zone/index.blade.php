@extends('admin.layout.primary')
@section('title', __('Ads Zone'))
@section('panel')
    <div class="row">
        @isset($create)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="margin-top:10px;">@lang('Create New Ad')</h3>
                </div>
                <div class="card-body">
                    @isset($edit)
                        <form action="{{ route('moder.ads.update', $ads->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <x-bs::input type="text" name="name" :placeholder="__('Ad Name')" :label="__('Ad Name')"
                                value="{{ $ads->name }}" />
                            <div class="form-group">
                                <label for="contents">@lang('Ad Code')</label>
                                <textarea name="contents" id="contents" rows="5" class="form-control">
                               {{ trim($ads->contents) }}
                           </textarea>
                            </div>
                            <div class="form-group">
                                <label for="size">@lang('Ad Size')</label>
                                <select name="size" id="size" class="form-control" style="box-shadow:none !important;">
                                    <option value="0">@lang('Select One')</option>
                                    <option value="728*90" @if ($ads->size == '728*90') selected="selected" @endif>728*90
                                    </option>
                                    <option value="250*250" @if ($ads->size == '250*250') selected="selected" @endif>250*250
                                    </option>

                                </select>
                            </div>
                            <x-bs::button type="submit" :label="__('Update')" />
                        </form>
                    @else
                        <form action="{{ route('moder.ads.store') }}" method="POST">
                            @csrf
                            <x-bs::input type="text" name="name" :placeholder="__('Ad Name')" :label="__('Ad Name')" />
                            <br>
                            <x-bs::textarea name="contents" :placeholder="__('Ad Code')" :label="__('Ad Code')" />
                            <br>
                            <x-bs::select name="size" :options="['728*90', '250*250']" :placeholder="__('Select One')"
                                :label="__('Ad Size')" />
                            <br>
                            <x-bs::button type="submit" :label="__('Create')" style="background:#6FB99F;border-color: #6FB99F;box-shadow:none;" />
                        </form>
                    @endisset
                </div>
            </div>
        @else
            <div class="col-md-12">
                <a href="{{ route('moder.ads.create') }}" class="btn btn-primary" style="background:#6FB99F;border-color: #6FB99F;margin-left: 10px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;box-shadow:none;">
                    <i class="fas fa-plus" style=" font-family: "Montserrat", sans-serif, arial;letter-spacing: 3px;"></i>
                </a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top:5px;margin-bottom:5px;">
                            @lang('Ads Zone') <i class="fas fa-question-circle" title="@lang('This ads will appear on the offerwall iframe')"></i>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto">
                            <table class="table table-bordered table-striped table-hover table-responsive-sm">
                                <thead>

                                    <tr>
                                        <th style="width: 10%">@lang('Name')</th>
                                        <th style="width: 60%">@lang('Content')</th>
                                        <th style="width: 10%">@lang('Size')</th>
                                        <th style="width: 10%">@lang('Status')</th>
                                        <th style="width: 10%">@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ads as $item)
                                        <tr>
                                            <td data-label="@lang('Title')">
                                                {{ $item->name }}
                                            </td>
                                            <td data-label="@lang('Content')">
                                                {{ $item->contents }}
                                            </td>
                                            <td data-label="@lang('Size')">
                                                {{ $item->size }}
                                            </td>
                                            <td data-label="@lang('Status')">
                                                {!! bolToText($item->isActive, true, __("Inactive"), __("Active")) !!}
                                            </td>
                                            <td data-label="@lang('Action')" class="d-flex justify-content-between align-items-center  flex-nowrap h-100">
                                                <a href="{{ route('moder.ads.edit', $item->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit" title="Edit"></i>
                                                </a>
                                                <form action="{{ route('moder.ads.destroy', $item->id) }}" method="post">
                                                    @method('delete') @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash" title="@lang('Delete')"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%">{{ __('No ads yet') }}
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ paginateLinks($ads) }}
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>
@endsection

@push('style')
<style>
  
    .form-control:focus{
            border: 2px solid #6FB99F;
            box-shadow: none;
        }
</style>
@endpush
