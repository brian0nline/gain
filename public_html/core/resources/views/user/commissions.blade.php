<head>
    <link rel="manifest" href="/manifest.json">
</head>
@extends('layouts.theme.default')
@section('title', __('Referrals | Gainify'))

@push('css')
<style>
    .dashboard{
        display: block !important;
    }
    
    @media screen and (max-width: 425px) {
  .paraff {
    font-size:12px;
  }
}

@media screen and (min-width: 992px) {
  .paraff {
    font-size:16px;
  }
}
</style>
@endpush

@section('content')

   
    <div class="card text-center pt-0" style="border-radius:20px;" id="referrallinkcommition"> 
     <h4 class="text-center" style="margin-top:20px;font-size: 13px;">@lang('YOUR REFERRAL LINK')</h4>
        <div class="card-body text-center p-0" style="border-radius:20px;">
            <!--<h4 class="text-center">@lang('WHERE IS MY REFERRAL LINK?')</h4>-->
            <!--<input type="text" class="form-control w-75 m-auto" value={{ $userRefLink }}" readonly>-->
             
            <div class="form-group" style="border-radius:20px;">
                <div class="input-group input-group w-75 mx-auto mb-3"style="border-radius:20px;">
                    <input type="text" id="reflink" value="{{ $userRefLink }}"
                        class="form-control m-0 rounded-0" style="color: #6FB99F;border-radius:20px;font-size:14px;";" readonly>
                        <span class="input-group-text copytext" id="copyBoard" style="font-size:14px;border-top-right-radius:10px;border-bottom-right-radius:10px;">Copy 
                    </span>
                </div>
            </div>
           
            <div class="row justify-content-center">
                <div class="col-md-12 overflow-auto">
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th class="paraff">@lang('Commission From')</th>
                            <!--<th>@lang('Commission Level')</th>-->
                            <th class="paraff">@lang('Amount')</th>
                            <!--<th>@lang('Title')</th>-->
                            <!--<th>@lang('Transaction')</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($commissions) > 0)
                            @foreach($commissions as $log)
                                <tr>
                                    <td data-label="@lang('Commission From')" class="paraff" style="color:#fff;">{{ @$log->userFrom->username }}</td>
                                    <!--<td data-label="@lang('Level')">{{ $log->level }}</td>-->
                                    <th data-label="@lang('Amount')" class="paraff" style="color:#fff;">{{ getAmount($log->amount) }}
                                         <i><img src="{{ asset('asset/img/coins.svg') }}"></i></td>
                                    <!--<td data-label="@lang('Title')">{{ $log->title }}</td>-->
                                    <!--<td data-label="@lang('Transaction')">{{ $log->trx }}</td>-->
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="100%"> @lang('No results found')!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $commissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
  if (typeof navigator.serviceWorker !== 'undefined') {
    navigator.serviceWorker.register('sw.js')
  }
</script>
    
@endsection




@push('script')
    <script>
        (function($) {
            "use strict";

            $('.copytext').on('click', function() {
                var copyText = document.getElementById("reflink");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
            });
        })(jQuery);
    </script>

@endpush