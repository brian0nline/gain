@extends('layouts.theme.default')
@section('title', __('Shop | Gainify'))
@section('content')


    @if($general->withdraw_status == 0)
        <div class="row justify-content-center " style="margin-bottom:50px;">
            <div class="col-xl-7 col-md-8 col-sm-9 col-10"> 
                <div class="checkout-banner">
                    <p class="checkout-text" style="font-size:13px;" >WE'RE OUT OF STOCKS NOW,COME BACK LATER!</p>
                </div>
            </div>
        </div>
    @endif 

   


    <div class="col-12">
        <h2 style="opacity: .8;margin-left:5px" class="hdue text-center">Shop</h2>
        <p style="opacity: .8;margin-bottom:50px;margin-left: 5px;" class="paraff text-center">Exchange your coins in cash or crypto and receive it within minutes!</p>
    </div>
    <!--<div class="text-center mb-3">
        <a href="{{ route('user.withdraw.history') }}" class="btn btn-primary" style="margin-bottom: 50px;margin-left: 5px;box-shadow: none;font-size:14px;">
            @lang('History')
        </a>
    </div>-->
    
    <div class="container-grid" style="padding:30px;border-radius:20px;background: #17242B;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row  justify-content-center">
                    @foreach ($withdrawMethod as $data)
                        @php
                            $bg = "#fff";
                            if($data->id == 1) { // paypall
                                $bg = "#179BD7";
                                
                            }
                            elseif ($data->id == 2){ // bitcoin
                                $bg = "linear-gradient(336.89deg, rgb(19, 23, 57) -26.71%, rgb(247, 147, 26) 107.56%)";
                            }
                            elseif ($data->id == 3){ // lite coin
                                $bg = "#8587A4";
                            }
                            elseif ($data->id == 4){ // doge coin
                                 $bg = "linear-gradient(336.89deg, rgb(19, 23, 57) -26.71%, rgb(182, 155, 54) 107.56%)";
                            }
                            
                            
                        @endphp
                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition custom-style-cashout">
                                <a href="javascript:void(0)" data-id="{{ $data->id }}" data-resource="{{ $data }}"
                                    data-min_amount="{{ showAmount($data->min_limit) }}"
                                    data-max_amount="{{ showAmount($data->max_limit) }}"
                                    data-fix_charge="{{ showAmount($data->fixed_charge) }}"
                                    data-percent_charge="{{ showAmount($data->percent_charge) }}"
                                    data-base_symbol="{{ __($general->cur_text) }}" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#withdrawModal"
                                    class="withdraw"
                                    style="background: {{$bg}}"
                                    >
                                    <img src="{{ getImage(imagePath()['withdraw']['method']['path'] . '/' . $data->image, imagePath()['withdraw']['method']) }}"
                                    />
                                
                                </a>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark" style="border-radius: 20px;">
                <form action="{{ route('user.withdraw.money') }}" method="post">
                    <h5 class="text-center"  style="margin-bottom:13px;font-size:21px;">@lang('Withdraw')</h5>
                    <img id="withdrawImage" style="width: 100px; display: block; margin:auto" />
                    @csrf
                    <div class="modal-body">
                       
                        <div class="form-group">
                            <input type="hidden" name="currency" class="edit-currency form-control">
                            <input type="hidden" name="method_code" class="edit-method-code  form-control">
                        </div>


                        <div class="form-group">
                            <label style="margin-left: 10px;font-size:18px;">@lang('Enter Amount')</label>
                            <div class="input-group">
                                <input id="amount" type="text" class="form-control form-control-lg"
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount"
                                    placeholder="0.00 {{ __($general->cur_text) }}" required="" value="{{ old('amount') }}"  class="paraff">

                                <!--<span class="input-group-text addon-bg currency-addon">{{ __($general->cur_text) }}</span>-->
                            </div>
                        </div>
                        
                        <div class="form-group mb-0">
                            <div class="charges">
                                <p class="paraff"> <i><img src="{{ asset('asset/img/info.svg') }}"></i>&nbsp;&nbsp; Minimum <span id="minWithdrawLimit">0</span> <span>{{$general->cur_text}}</span></p>
                                <p  class="paraff"> <i><img src="{{ asset('asset/img/info.svg') }}"></i>&nbsp;&nbsp; Maximum <span id="maxWithdrawLimit">0</span> <span>{{$general->cur_text}}</span></p>
                            </div>                        
                        </div>    

                    </div>
                    <div class="modal-footer  justify-content-center border-0">
                        <button type="submit" class="btn btn-primary" style="box-shadow: none;font-size:14px;" >@lang('Confirm')</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"style="box-shadow: none;border-color: #4D6D7D;background: #4D6D7D;font-size:14px;">@lang('Cancel')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .card .card {
            border: none;
            padding: 10px 50px;
        }

        .card .card::after {
            position: absolute;
            z-index: -1;
            opacity: 0;
            -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .card .card:hover {


            transform: scale(1.02, 1.02);
            -webkit-transform: scale(1.02, 1.02);
            backface-visibility: hidden;
            will-change: transform;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .75) !important;
        }

        .card .card:hover::after {
            opacity: 1;
        }

        .card .card:hover .btn-outline-primary {
            color: white;
            background: #007bff;
        }

        li.list-group-item {
            background: #1F2F37;
            color: #fff !important;
            border: 1px solid #afafaf;
        }
        .form-control:focus {
    
    color:#F8F8F8 !important;
    
}

@media screen and (max-width: 425px) {
  .paraff {
    font-size:12px;
  }
}

@media screen and (min-width: 992px) {
  .paraff {
    font-size:14px;
  }
}

@media screen and (max-width: 425px) {
  .hdue {
    font-size:21px;
  }
}

@media screen and (min-width: 992px) {
  .hdue {
    font-size:24px;
  }
}

    </style>
@endpush
@push('script')
    <script>
        (function($) {
            "use strict";
            $('.withdraw').on('click', function() {
                var id = $(this).data('id');
                var result = $(this).data('resource');
                
                console.log(result);
                
                var imagePath = 'https://demo.freeloot.net/asset/images/withdraw/method/'+result.image;
                
                if(result.name=='Paypal'){
                    imagePath = 'https://demo.freeloot.net/asset/images/gateway/paypal.svg';
                }
                else if(result.name=='Bitcoin'){
                     imagePath = 'https://demo.freeloot.net/asset/images/gateway/bitcoin.svg';
                }
                else if(result.name=='Litecoin'){
                    imagePath = 'https://demo.freeloot.net/asset/images/gateway/litecoin.svg';
                }
                else if(result.name == 'Dogecoin'){
                  imagePath = 'https://demo.freeloot.net/asset/images/gateway/dogecoin2.svg';   
                }
                
                $("#withdrawImage").attr('src', imagePath)
                
                var minAmount = $(this).data('min_amount');
                var maxAmount = $(this).data('max_amount');
                var fixCharge = $(this).data('fix_charge');
                var percentCharge = $(this).data('percent_charge');

                
                $("#minWithdrawLimit").text(minAmount);
                $("#maxWithdrawLimit").text(maxAmount);

                var withdrawLimit =
                    `@lang('Withdraw Limit'): ${minAmount} - ${maxAmount}  {{ __($general->cur_text) }}`;
                $('.withdrawLimit').text(withdrawLimit);
                
                var withdrawCharge =
                    `@lang('Charge'): ${fixCharge} {{ __($general->cur_text) }} ${(0 < percentCharge) ? ' + ' + percentCharge + ' %' : ''}`
                $('.withdrawCharge').text(withdrawCharge);
                $('.method-name').text(`@lang('Withdraw Via') ${result.name}`);
                $('.edit-currency').val(result.currency);
                $('.edit-method-code').val(result.id);
                $("#withdrawModal").modal('show');
            });
        })(jQuery);
    </script>
@endpush
