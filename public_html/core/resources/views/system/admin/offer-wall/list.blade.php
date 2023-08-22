@extends('admin.layout.primary')
@section('title', __('Custom Offerwalls | Freeloot'))

@push('style')
<style>
    .bg-dark{
        background: #e46a76 !important ;
        color: #fff !important 
    }
</style>
@endpush

@section('panel')
<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start" style="margin-top:5px;">@lang('Custom Offerwalls')</h4>
            <a href="{{ route('moder.offer.create') }}" class="btn btn-sm btn-dark float-end"style="box-shadow:none;background:#4aa276;border-color:#4aa276;border-radius:10px;" >
                <i class="fas fa-plus" style="box-shadow:none;background:#4aa276;border-color:#4aa276;"></i> @lang('New offerwall')
            </a>
        </div>
        <div class="card-body">
            <div class="overflow-auto">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>@lang('Offerwall')</th>
                            <th>@lang('Postback')</th>
                            <th>@lang('Auto-Pay')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($offers as $offer)
                        <tr>
                            <td>
                                <img src="{{ getImage(imagePath()['offers']['path'] . '/' . $offer->image) }}"
                                    height="50px" width="50px" />
                                <br>
                                {{ __($offer->name) }}
                            </td>
                            <td data-url="{{ route('offers.custom.callback', $offer->endpoint) }}"
                                style="max-width: 200px; overflow: auto; cursor: pointer;" class="callbackURL">
                                <i class="fas fa-file d-inline m-1"></i>{{ route('offers.custom.callback', $offer->endpoint) }}
                            </td>

                            <td data-label="@lang('Auto Pay')">
                                {!! bolToText($offer->isAutoPay, true, 'Disabled', 'Enabled') !!}
                                <a href="{{ route('moder.offer.update-pay', $offer->id) }}" class="btn btn-icon btn-sm" style="box-shadow:none;">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </a>
                            </td>

                            <td data-label="@lang('Status')">
                                {!! bolToText($offer->isActive, true, 'Disabled', 'Enabled') !!}
                                <a href="{{ route('moder.offer.update-status', $offer->id) }}"
                                    class="btn btn-icon btn-sm" style="box-shadow:none;">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </a>
                            </td>
                            <td data-label="@lang('Action')">
                                <a href="{{ route('moder.offer.edit', $offer->id) }}"
                                    class="btn btn-sm btn-info  m-1" data-toggle="tooltip" title=""
                                    data-original-title="@lang('Edit')" style="background:#4aa276;border-color:#4aa276;box-shadow:none;">
                                    <i class="fas fa-edit" style="color:#fff;"></i>
                                </a>
                                <form action="{{ route('moder.offer.delete', $offer->id) }}" method="post">
                                    @csrf @method('delete')
                                    <button type="submit" class="btn btn-sm btn-info  m-1" data-toggle="tooltip"
                                        title="" data-original-title="@lang('Delete')" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;" disabled />
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ __('No Data Yet!') }}</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{ $offers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
        $(document).on('click', '.callbackURL' , function(){
            let url = $(this).data('url');
            let $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();
            notify('info', 'Postback Copied');
        })        
    })
</script>
@endpush