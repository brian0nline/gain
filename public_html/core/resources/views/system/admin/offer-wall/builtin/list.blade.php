@extends('admin.layout.primary')

@push('style')
<style>
    .btn.btn-dark.btn-sm.active.toggle-off{
        background: #DC3545 !important;
        color: #fff !important;
    }
    .form-control:focus{
            border: 2px solid #4aa276;
            box-shadow: none;
        }
</style>
@endpush

@section('title', 'Manage Offerwalls | Freeloot')
@section('panel')
    <div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title float-start" style="margin-top: 10px;">@lang('Manage Offerwalls')</h4>
                 <button type="button" data-bs-toggle="modal" data-bs-target="#new_offers"
                    class="btn btn-sm btn-dark float-end" style="background: #4aa276;border-color: #4aa276;box-shadow: none;">
                    <i class="fas fa-plus"></i> New Offerwall
                </button> 
            </div>
            <div class="card-body">
                <form action="" method="GET">
                <div class="form-group" style="margin-bottom:20px;">
                    <input type="search" name="search" class="form-control" placeholder="search by name click enter" />
                </div>
                </form>
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
                                    <td data-url="{{ route('offers.builtin.callback', $offer->endpoint) }}" 
                                        style="max-width: 200px; overflow: auto; cursor: pointer;font-size:14;" class="callbackURL">
                                       {{ route('offers.builtin.callback', $offer->endpoint) }}
                                    </td>

                                    <td data-label="@lang('Auto Pay')">
                                        {!! bolToText($offer->isAutoPay, true, 'Disabled', 'Enabled') !!}
                                        <a href="{{ route('moder.offer.update-pay', $offer->id) }}"
                                            class="btn btn-icon btn-sm" style="box-shadow:none;">
                                            <i class="fas fa-exchange-alt text-dark"></i>
                                        </a>
                                    </td>

                                    <td data-label="@lang('Status')">
                                        {!! bolToText($offer->isActive, true, 'Disabled', 'Enabled') !!}
                                        <a href="{{ route('moder.offer.update-status', $offer->id) }}"
                                            class="btn btn-icon btn-sm"  style="box-shadow:none;" >
                                            <i class="fas fa-exchange-alt text-dark"></i>
                                        </a>
                                    </td>
                                    <td data-label="@lang('Action')">
                                        <button 
                                            data-id="{{ $offer->id }}"
                                            class="btn btn-sm edit-offer ml-1" data-toggle="tooltip" title=""
                                            style="background: #4aa276;background-color: #4aa276;box-shadow:none;"
                                            data-original-title="@lang('Edit')">
                                            <i class="fas fa-edit"></i>
                                        </button>
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
    {{-- create model for developing --}}
    <div class="modal fade" id="new_offers" tabindex="-1" aria-labelledby="new_offersLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title" id="new_offersLabel">Offerwall</h5>
                  
                </div>
                <form action="{{ route('moder.offer.builtin.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="is_builtin" value="1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="image">Offerwall Logo</label>
                                    <input type="file" class="form-control" name="image" required />
                                </div>
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="public_key" style="color: #000000;">PUB ID</label>
                                    <input type="text" name="public_key" class="form-control" required />
                                </div>
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="isAutoPay">Enable Auto Pay</label>
                                    <input type="checkbox" data-width="100%" name="isAutoPay" />
                                </div>
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="isActive">Make Active </label>
                                    <input type="checkbox" data-width="100%" name="isActive" />
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group"style="margin-top:10px;">
                                    <label for="name">OfferWall Name</label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                                <div class="form-group"style="margin-top:10px;">
                                    <label for="secret_key">Secret Key</label>
                                    <input type="text" name="secret_key" class="form-control" required />
                                </div>

                                <div class="form-group" style="margin-top:10px;">
                                    <label for="API">Publish Id <small>ONLY REQUIRED FOR OFFERTORO</small></label>
                                    <input type="text" name="publish_id" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #242B27;">
                        <button type="button" class="btn btn-secondary" style="background: #3B4740;border-color: #3B4740;box-shadow:none;" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background: #4aa276;border-color: #4aa276;box-shadow:none;" >Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('checkbox', true)
    {{-- update model --}}
    <div class="modal fade" id="update_offer" tabindex="-1" aria-labelledby="update_offerLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="background: #242B27;">
                <div class="modal-header"  style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title" id="update_offerLabel">Offerwall</h5>
                   
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="update_offer_form">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="is_builtin" value="1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="image">Offerwall Logo</label>
                                    <input type="file" class="form-control" name="image" />
                                </div>
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="public_key" style="color: #242B27;">PUB ID</label>
                                    <input type="text" name="public_key" class="form-control" required />
                                </div>
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="isAutoPay" style="color:#fff !important;margin-top: 10px;">Enable Auto Pay</label>
                                    <input type="checkbox" data-width="100%" name="isAutoPay" />
                                </div>
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="isActive" style="color:#fff !important;margin-top: 10px;">Make Active </label>
                                    <input type="checkbox" data-width="100%" name="isActive" />
                                </div>
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="is_available" style="color:#fff !important;margin-top: 10px;">Unavailable Mode</label>
                                    <input type="checkbox" data-width="100%" name="is_available" />
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="name">OfferWall Name</label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                                <div class="form-group" style="margin-top:10px;">
                                    <label for="secret_key">Secret Key</label>
                                    <input type="text" name="secret_key" class="form-control" required />
                                </div>

                                <div class="form-group" style="margin-top:10px;">
                                    <label for="API">Publish Id <small>ONLY REQUIRED FOR OFFERTORO</small></label>
                                    <input type="text" name="publish_id" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #242B27;">
                             <button type="button" class="btn btn-secondary" style="background: #3B4740;border-color: #3B4740;box-shadow:none;" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background: #4aa276;border-color: #4aa276;box-shadow:none;" >Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-offer', function() {
                const $data_id = $(this).data('id');
                $.ajax({
                    url: "{{ url('admin/builtin/offerwalls/edit') }}",
                    data: {
                        id: $data_id
                    },
                    type: "GET",
                    dataType: "JSON",
                    success: function(res) {
                        console.log(res);
                        $('#update_offer_form input[name="name"]').val(res.data.name);
                        $('#update_offer_form input[name="API"]').val(res.data.API);
                        $('#update_offer_form input[name="public_key"]').val(res.data.public_key);
                        $('#update_offer_form input[name="secret_key"]').val(res.data.secret_key);
                        if(res.data.useAPI == 1){
                            $('#update_offer_form input[name="useAPI"]').bootstrapToggle('on');
                        }
                        if(res.data.isActive == 1){
                            $('#update_offer_form input[name="isActive"]').bootstrapToggle('on');
                        }
                        if(res.data.isAutoPay == 1){
                            $('#update_offer_form input[name="isAutoPay"]').bootstrapToggle('on');
                        }
                        if(res.data.is_available == 0){
                          $('#update_offer_form input[name="is_available"]').bootstrapToggle('on');
                        }
                        $('#update_offer_form').attr('action', "/admin/builtin/offerwalls/update/" + res.data.id)
                        $('#update_offer').modal('show');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.callbackURL' , function(){
                let url = $(this).data('url');
                let $temp = $("<input>");
                $("body").append($temp);
                $temp.val(url).select();
                document.execCommand("copy");
                $temp.remove();
                notify('info', 'the postback is copied');
            })        
        })
    </script>
@endpush
