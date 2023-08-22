@extends('admin.layout.primary')

@push('style')
<style>
    body div .list-group span{
        color: #000 !important;    
    }
</style>
@endpush

@section('title', __('Withdrawals'))
@section('page-title', __('Withdrawals'))
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-4 col-md-4 mb-30">
            <div class="card b-radius-10 overflow-hidden shadow">
                <div class="card-body" style="background: #3b4740">
                  

                    <div class="p-3 ">
                        <div class="">
                            <x-bs::image src="{{ $methodImage }}" alt="@lang('Image')" height="50" />
                        </div>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Date')
                            <span class="font-weight-bold">{{ showDateTime($withdrawal->created_at) }}</span>
                        </li>

                      
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Username')
                            <span class="font-weight-bold">
                                <a
                                    href="{{ route('moder.users.detail', $withdrawal->user_id) }}">{{ @$withdrawal->user->username }}</a>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Method')
                            <span class="font-weight-bold">{{ __($withdrawal->method->name) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Amount')
                            <span class="font-weight-bold">{{ showAmount($withdrawal->amount) }}
                                {{ __($general->cur_text) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Charge')
                            <span class="font-weight-bold">{{ showAmount($withdrawal->charge) }}
                                {{ __($general->cur_text) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('After Charge')
                            <span class="font-weight-bold">{{ showAmount($withdrawal->after_charge) }}
                                {{ __($general->cur_text) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Rate')
                            <span class="font-weight-bold">1 {{ __($general->cur_text) }}
                                = {{ showAmount($withdrawal->rate) }} {{ __($withdrawal->currency) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Payable')
                            <span class="font-weight-bold">{{ showAmount($withdrawal->final_amount) }}
                                {{ __($withdrawal->currency) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Status')
                            @if ($withdrawal->status == 2)
                                <span class="badge badge-pill bg-warning">@lang('Pending')</span>
                            @elseif($withdrawal->status == 1)
                                <span class="badge badge-pill bg-success">@lang('Approved')</span>
                            @elseif($withdrawal->status == 3)
                                <span class="badge badge-pill bg-danger">@lang('Rejected')</span>
                            @endif
                        </li>

                        @if ($withdrawal->admin_feedback)
                            <li class="list-group-item">
                                <strong>@lang('Admin Response')</strong>
                                <br>
                                <p>{{ $withdrawal->admin_feedback }}</p>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 mb-30">

            <div class="card b-radius-10 overflow-hidden shadow">
                <div class="card-body"  style="background: #3b4740">
                   


                    @if ($details != null)
                        @foreach (\GuzzleHttp\json_decode($details) as $k => $val)
                            @if ($val->type == 'file')
                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <h6>{{ __(inputTitle($k)) }}</h6>
                                        <img src="{{ getImage('assets/images/verify/withdraw/' . $val->field_name) }}"
                                            alt="@lang('Image')">
                                    </div>
                                </div>
                            @else
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <h6>{{ __(inputTitle($k)) }}</h6>
                                        <p>{{ $val->field_name }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif


                    @if ($withdrawal->status == 2)
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button class="btn btn-success ml-1 approveBtn" data-toggle="tooltip"
                                    data-original-title="@lang('Approve')" data-id="{{ $withdrawal->id }}"
                                    data-amount="{{ showAmount($withdrawal->final_amount) }} {{ $withdrawal->currency }}" style="box-shadow:none;" >
                                    <i class="fas la-check"></i> @lang('Approve')
                                </button>

                                <button class="btn btn-danger ml-1 rejectBtn" data-toggle="tooltip"
                                    data-original-title="@lang('Reject')" data-id="{{ $withdrawal->id }}"
                                    data-amount="{{ showAmount($withdrawal->final_amount) }} {{ __($withdrawal->currency) }}" style="box-shadow:none;background:#e84b3c;border-color:#e84b3c;" >
                                    <i class="fas fa-ban"></i> @lang('Reject')
                                </button>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>



    {{-- APPROVE MODAL --}}
    <div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header"  style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title">@lang('Withdrawal Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: #e84b3c;border-color:#e84b3c;box-shadow:none;border-radius:10px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('moder.withdraw.approve') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Have you sent') <span class="font-weight-bold withdraw-amount text-success"></span>?
                        </p>
                        <p class="withdraw-detail"></p>
                        <textarea name="details" class="form-control pt-3" rows="3"
                            placeholder="@lang('Provide the details. eg: transaction number')" required=""></textarea>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #242B27;">
                      
                        <button type="submit" class="btn btn-success" style="box-shadow:none;">@lang('Approve')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- REJECT MODAL --}}
    <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header"  style="border-bottom: 2px solid #242B27;>
                    <h5 class="modal-title">@lang('Reject Withdrawal Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;border-radius:10px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('moder.withdraw.reject') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <strong style="margin-bottom: 5px;">@lang('Reason of Rejection')</strong>
                        <textarea name="details" class="form-control pt-3" rows="3"
                            placeholder="@lang('Provide the Details')" required=""></textarea>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #242B27;">
                      
                        <button type="submit" class="btn btn-danger" style="box-shadow:none;background:#e84b3c;border-color:#e84b3c;">@lang('Reject')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $('.approveBtn').on('click', function() {
                var modal = $('#approveModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.withdraw-amount').text($(this).data('amount'));
                modal.modal('show');
            });

            $('.rejectBtn').on('click', function() {
                var modal = $('#rejectModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('.withdraw-amount').text($(this).data('amount'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
