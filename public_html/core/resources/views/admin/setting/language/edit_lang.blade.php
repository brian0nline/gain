@extends('admin.layout.primary')
@section('panel')
    <div id="app">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row justify-content-between">
                            <div class="col-md-7">
                                <ul>
                                    <li>
                                        <h5> {{ __($lang->name) }} @lang('Language Keywords')</h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-5 mt-md-0 mt-3">
                                <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-primary box-shadow text-small float-right" style="background:#4aa276;border-color: #4aa276;box-shadow:none;">
                                    <i class="fas fa-plus"></i> @lang('Add New Key') </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive-sm table-responsive">
                            <table class="table table-light tabstyle-two custom-data-table white-space-wrap" id="myTable">
                                <thead>
                                <tr>
                                    <th>@lang('Key')
                                    </th>
                                    <th class="text-left">
                                        {{__($lang->name)}}
                                    </th>

                                    <th class="w-85">@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($json as $k => $language)
                                    <tr>
                                        <td data-label="@lang('key')" class="white-space-wrap">{{$k}}</td>
                                        <td data-label="@lang('Value')" class="text-left white-space-wrap">{{$language}}</td>


                                        <td data-label="@lang('Action')">
                                            <a href="javascript:void(0)"
                                               data-target="#editModal"
                                               data-toggle="modal"
                                               data-title="{{$k}}"
                                               data-key="{{$k}}"
                                               data-value="{{$language}}"
                                               class="editModal btn btn-sm btn-primary ml-1"
                                               data-original-title="@lang('Edit')" style="background:#4aa276;border-color:#4aa276;box-shadow:none;">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            <a href="javascript:void(0)"
                                               data-key="{{$k}}"
                                               data-value="{{$language}}"
                                               data-toggle="modal" data-target="#DelModal"
                                               class="btn btn-sm btn-danger ml-1 deleteKey"
                                               data-original-title="@lang('Remove')" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background :#242b27">
                    <div class="modal-header" style="border-bottom:none;">
                        <h4 class="modal-title" id="addModalLabel"> @lang('Add New')</h4>
                        
                    </div>

                    <form action="{{route('moder.language.store.key',$lang->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="key" class="font-weight-bold" style="margin-bottom:5px;">@lang('Key')</label>
                                <input type="text" class="form-control form-control-lg " id="key" name="key" placeholder="@lang('Key')" value="{{old('key')}}">

                            </div>
                            <div class="form-group">
                                <label for="value" class="font-weight-bold"  style="margin-bottom:5px;margin-top:10px;">@lang('Value')</label>
                                <input type="text" class="form-control form-control-lg" id="value" name="value" placeholder="@lang('Value')" value="{{old('value')}}">

                            </div>
                        </div>
                        <div class="modal-footer" style="border-top:none;">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"  style="background:#3B4740;border-color:#3B4740;box-shadow:none;">@lang('Close')</button>
                            <button type="submit" class="btn btn-primary"  style="background:#4aa276;border-color:#4aa276;box-shadow:none;"> @lang('Save')</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background: #242b27;">
                    <div class="modal-header" style="border-bottom:none;">
                        <h4 class="modal-title" id="editModalLabel">@lang('Edit')</h4>
                       
                    </div>

                    <form action="{{route('moder.language.update.key',$lang->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group ">
                                <label for="inputName" class="font-weight-bold form-title" style="margin-bottom:5px;"></label>
                                <input type="text" class="form-control form-control-lg" name="value" placeholder="@lang('Value')">
                            </div>
                            <input type="hidden" name="key">
                        </div>
                        <div class="modal-footer"  style="border-top:none;">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"  style="background:#3B4740;border-color:#3B4740;box-shadow:none;">@lang('Close')</button>
                            <button type="submit" class="btn btn-primary"  style="background:#4aa276;border-color:#4aa276;box-shadow:none;">@lang('Update')</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- Modal for DELETE -->
        <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="DelModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header" style="border-bottom:none;">
                        <h4 class="modal-title" id="DelModalLabel"><i class='fa fa-trash'></i> @lang('Delete')</h4>
                       
                    </div>
                    <div class="modal-body">
                        <strong>@lang('Are you sure to delete?')</strong>
                    </div>
                    <form action="{{route('moder.language.delete.key',$lang->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="key">
                        <input type="hidden" name="value">
                        <div class="modal-footer" style="border-top:none;">
                            <button type="button" class="btn btn-dark" data-dismiss="modal" style="background:#3B4740;border-color:#3B4740;box-shadow:none;">@lang('Close')</button>
                            <button type="submit" class="btn btn-danger " style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;">@lang('Delete')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @section('datatable', true)
    @section('checkbox', true)
@stop

@push('script')
    <script>
        (function($){
            "use strict";
            $(document).on('click','.deleteKey',function () {
                var modal = $('#DelModal');
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });
            $(document).on('click','.editModal',function () {
                var modal = $('#editModal');
                modal.find('.form-title').text($(this).data('title'));
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });

        })(jQuery);
    </script>
@endpush
