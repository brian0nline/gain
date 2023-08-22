@extends('admin.layout.primary')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12">
            <div class="card">
                <form action="{{ route('moder.users.email.single', $user->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold" style="margin-bottom:2px;">@lang('Subject') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('Email subject')" name="subject"
                                    required />
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold" style="margin-top:8px;margin-bottom:2px;">@lang('Message') <span
                                        class="text-danger">*</span></label>
                                <textarea name="message" rows="10" class="form-control nicEdit"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-row">
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" class="btn btn-block btn-primary mr-2" style="background:#4aa276;border-color:#4AA276;box-shadow:none;" disabled>@lang('Send Email')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
