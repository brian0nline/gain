@section('title', __('Email Configuration | Gainify'))
@section('page-title', __('Email Config'))
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="margin-top:10px;" class="card-title">@lang('Email-Sender Setup')</h4>
                </div>
                <form wire:submit.prevent="update">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select wire:model="emailMethod" class="form-control">
                                    <option value="php" @if ($setting['name'] == 'php') selected @endif>
                                        @lang('PHP Mail')
                                    </option>
                                    <option value="smtp" @if ($setting['name'] == 'smtp') selected @endif>
                                        @lang('SMTP')
                                    </option>
                                    <option value="sendgrid" @if ($setting['name'] == 'sendgrid') selected @endif>
                                        @lang('SendGrid API')
                                    </option>
                                    <option value="mailjet" @if ($setting['name'] == 'mailjet') selected @endif>
                                        @lang('Mailjet
                                        API')
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 text-right">
                                <h6 class="mb-4">&nbsp;</h6>
                                <button type="button" data-target="#testMailModal" data-toggle="modal"
                                    class="btn btn-primary" style="background:#e84b3c;border-color: #e84b3c;box-shadow:none;">@lang('Send Test Mail')</button>
                            </div>
                        </div>
                        <div>
                            @if ($emailMethod == 'smtp')
                                <div class="row mt-4 configForm" id="smtp">
                                    <div class="col-md-12">
                                        <h6 class="mb-2">@lang('SMTP Configuration')</h6>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-bold">@lang('Host') <span
                                                class="text-danger">*</span></label>
                                        <x-bs::input type="text" model="setting.host" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-bold">@lang('Port') <span
                                                class="text-danger">*</span></label>
                                        <x-bs::input type="number" model="setting.port" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-bold">@lang('Encryption')</label>
                                        <select class="form-control" wire:model="setting.enc">
                                            <option value="ssl">@lang('SSL')</option>
                                            <option value="tls">@lang('TLS')</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="margin-top:10px;" class="font-weight-bold">@lang('Username') <span
                                                class="text-danger">*</span></label>
                                        <x-bs::input type="text" model="setting.username" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="margin-top:10px;" class="font-weight-bold">@lang('Password') <span
                                                class="text-danger">*</span></label>
                                        <x-bs::input type="password" model="setting.password" />
                                    </div>
                                </div>
                            @elseif($emailMethod == 'sendgrid')
                                <div class="form-row mt-4 configForm" id="sendgrid">
                                    <div class="col-md-12">
                                        <h6 class="mb-2">@lang('SendGrid API Configuration')</h6>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>@lang('App Key') <span class="text-danger">*</span></label>
                                        <x-bs::input type="text" model="setting.appkey" />
                                    </div>
                                </div>
                            @elseif($emailMethod == 'mailjet')
                                <div class="row mt-4 configForm" id="mailjet">
                                    <div class="col-md-12">
                                        <h6 class="mb-2">@lang('Mailjet API Configuration')</h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">@lang('Api Public Key') <span
                                                class="text-danger">*</span></label>
                                        <x-bs::input type="text" model="setting.public_key" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">@lang('Api Secret Key') <span
                                                class="text-danger">*</span></label>
                                        <x-bs::input type="text" model="setting.secret_key" />
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-success mr-2" style="background:#6FB99F;border-color: #6FB99F;box-shadow:none;" >@lang('Update')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>


    </div>


    {{-- TEST MAIL MODAL --}}
    <div id="testMailModal" class="modal fade" tabindex="-1" role="dialog" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #35515F;box-shadow:none;">
                    <h5 class="modal-title">@lang('Mail testing')</h5>
                    <button type="button" class="close btn btn-primary btn-sm" data-dismiss="modal" aria-label="Close" style="background: #1F2F37;border-color:#1F2F37;border-radius:20px;box-shadow:none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="sendTest()">
                    @csrf
                    <input type="hidden" wire:model="setting.id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>@lang('Send Email to') <span class="text-danger">*</span></label>
                                <input type="email" wire:model="testEmail" class="form-control"
                                    placeholder="@lang('Email Address')" required>
                                @error('testEmail')
                                    <span class="test-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #35515F;box-shadow:none;">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" style="background:#4D6D7D;border-color: #4D6D7D;box-shadow:none;">@lang('Close')</button>
                        <button type="submit" class="btn btn-success" style="background:#6FB99F;border-color: #6FB99F;box-shadow:none;" >@lang('Send')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        (function() {
            window.addEventListener('hideModal', (event) => {
                $('#testMailModal').modal('hide');
            });
        });
    </script>
</div>
