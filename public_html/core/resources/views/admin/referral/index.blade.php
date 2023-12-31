@extends('admin.layout.primary')
@section('title', 'Referral System | Gainify')

@section('panel')
    <div class="row">
        <div class="col-md-12">
           
        </div>
        <div class="col-md-6 mb-4">
            <div class="card mt-2">
                <h5 class="card-header bg--primary" style="margin-top:10px;margin-bottom:5px;">@lang('Deposit Commissions')
                    @if ($general->dc == 0)
                        <span class="badge badge-danger float-right" style="color:#e84b3c;">@lang('Disabled')</span>
                    @else
                        <span class="badge badge-success float-right">@lang('Enabled')</span>
                    @endif
                </h5>
                <div class="card-body parent">

                    <div class="row">
                        <div class="col-md-12">
                            @if ($general->dc == 0)
                                <a href="#"
                                    class="btn btn-info btn-sm mb-3" style="background:#6FB99F;border-color:#6FB99F;box-shadow:none;" >@lang('Enable Now')</a>
                            @else
                                <a href="#"
                                    class="btn btn-danger btn-sm mb-3" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;" >@lang('Disable Now')</a>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive-sm mt-2 mb-2">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('Level')</th>
                                    <th scope="col">@lang('Deposit Amount')</th>
                                    <th scope="col">@lang('Commission')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($trans->where('commission_type', 'deposit') as $key => $p)
                                    <tr>
                                        <td data-label="Level">@lang('LEVEL')# {{ $p->level }}</td>
                                        <td data-label="required">@lang('Required') => {{ $p->required }} $</td>
                                        <td data-label="Commission">{{ $p->percent }} %</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table><!-- table end -->
                    </div>
                    <hr>

                    <div class="row mb-5">
                        <div class="col-md-12 mb-3">
                            <input type="number" name="level" placeholder="@lang('HOW MANY LEVELS')"
                                class="form-control levelGenerate">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-success generate" style="box-shadow:none;" >
                                @lang('GENERATE')
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('moder.store.refer') }}" method="post">
                        @csrf

                        <input type="hidden" name="commission_type" value="deposit">
                        <div class="d-none levelForm">

                            <div class="form-group">
                                <label class="text-success"> @lang('Level & Commission :')
                                    <small>@lang('(Old Levels will Remove After Generate)')</small>
                                </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="description referral-desc">
                                            <div class="row">
                                                <div class="col-md-12 planDescriptionContainer">

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block my-3">@lang('Submit')</button>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card mt-2">
                <h5 class="card-header bg--primary" style="margin-top:10px;margin-bottom:5px;">@lang('Earning Commissions')
                    @if ($general->wc == 0)
                        <span class="badge badge-danger float-right">@lang('Disabled')</span>
                    @else
                        <span class="badge badge-success float-right">@lang('Enabled')</span>
                    @endif
                </h5>
                <div class="card-body parent">


                    <div class="row">
                        <div class="col-md-12">
                            @if ($general->wc == 0)
                                <a href="{{ route('moder.referral.status', 'wc') }}"
                                    class="btn btn-primary" style="background:#6FB99F;border-color:#6FB99F;box-shadow:none;" >@lang('Enable Now')</a>
                            @else
                                <a href="{{ route('moder.referral.status', 'wc') }}"
                                    class="btn btn-danger btn-sm mb-3" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;" >@lang('Disable Now')</a>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive-sm mt-2 mb-2">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('Level')</th>
                                    <th scope="col">@lang('Required Users')</th>
                                    <th scope="col">@lang('Commission')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($trans->where('commission_type', 'win') as $key => $p)
                                    <tr>
                                        <td data-label="Level">@lang('LEVEL')# {{ $p->level }}</td>
                                        <td data-label="required">@lang('Required') => {{ $p->required }} @lang('Users')</td>
                                        <td data-label="Commission">{{ $p->percent }} %</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table><!-- table end -->
                    </div>
                    <hr>


                    <div class="row mt-3 mb-5">
                        <div class="col-md-12 mb-3">
                            <input type="number" name="level" placeholder="@lang('HOW MANY LEVELS')"
                                class="form-control input-lg levelGenerate">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success btn-sm generate" style="box-shadow:none;" >
                                @lang('GENERATE')
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('moder.store.refer') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="commission_type" value="win">
                        <div class="d-none levelForm">

                            <div class="form-group">
                                <label class="text-success"> @lang('Level & Commission :')
                                    <small>@lang('(Old Levels will Remove After Generate)')</small>
                                </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="description referral-desc">
                                            <div class="row">
                                                <div class="col-md-12 planDescriptionContainer">

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block my-3" >@lang('Submit')</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
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


@push('script')
    <script>
        $(document).ready(function() {
            "use strict";

            var max = 1;
            $(document).ready(function() {
                $(".generate").on('click', function() {

                    var levelGenerate = $(this).parents('.parent').find('.levelGenerate').val();
                    var a = 0;
                    var val = 1;
                    var viewHtml = '';
                    if (levelGenerate !== '' && levelGenerate > 0) {
                        $(this).parents('.parent').find('.levelForm').removeClass('d-none');
                        $(this).parents('.parent').find('.levelForm').addClass('d-block');

                        for (a; a < parseInt(levelGenerate); a++) {
                            viewHtml += `<div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text no-right-border">LEVEL</span>
                            </div>
                            <input name="level[]" class="form-control margin-top-10 no-left-border width-120" type="number" readonly value="${val++}" required placeholder="Level">
                            <input name="required[]" class="form-control margin-top-10" type="text" required placeholder="@lang("Required")">
                            <input name="percent[]" class="form-control margin-top-10" type="text" required placeholder="@lang("Percentage %")">
                            <span class="input-group-btn">
                            <button class="btn btn-danger btn-sm margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button></span>
                            </div>`;
                        }
                        $(this).parents('.parent').find('.planDescriptionContainer').html(viewHtml);

                    } else {
                        alert('Level Field Is Required');
                    }
                });

                $(document).on('click', '.delete_desc', function() {
                    $(this).closest('.input-group').remove();
                });
            });


        });
    </script>
    
@endpush


