@extends('admin.layout.primary')
@section('title', __('Create Offerwall'))
@section('panel')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                @lang('Create Offerwall')
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('moder.offer.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">   
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <x-bs::input type="file" name="image" :label="__('Offerwall Logo')"
                                    :placeholder="__('Offerwall Logo')" />
                                <br />
                                
                            </div>
                            <div class="col-md-6">
                                <x-bs::input type="text" name="name" value="{{ old('name') }}" :label="__('Offerwall Name')" style="box-shadow:none;border-color:#4aa276;"
                                    :placeholder="__('Offerwall Name')" />
                                <br />

                            </div>
                            
                            <div class="col-md-12">
                                <div class="card border-info">
                                    <div class="card-body">
                                        <code  style="color:#e84b3c">
                                            https://surveywall.wannads.com?apiKey=[API_KEY]&userId=[USER_ID]"
                                        </code>
                                        <p class="card-text">
                                            @lang('This is an example of Offerwall URL,')<br>
                                            @lang('You have to change the') <b>[API_KEY]</b> @lang('with') <i>@lang('your public api key')</i> @lang('and')
                                            <b>[USER_ID]</b> @lang('with') <i>subId</i> <br>
                                            @lang('be look like')
                                            <br>
                                            <code  style="color:#e84b3c">
                                                https://surveywall.wannads.com?apiKey=xxxxxxxx&userId=subId
                                            </code>
                                        </p>
                                    </div>
                                </div>
                                <x-bs::input type="text" name="iframe_url" value="{{ old('iframe_url') }}"
                                    :label="__('Offerwall Iframe URL')" style="box-shadow:none;border-color:#4aa276;"
                                    placeholder="Ex:https://surveywall.wannads.com?apiKey=xxxxxxxx&userId=subId"
                                    :help="__('Please, Add the Offerwall URL with the required user identifier inside  {user} without any other parameters')" />
                                <br />
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-info">
                                    <div class="card-body">
                                        <p class="card-text">
                                            @lang('The postback url setup,')<br>
                                            @lang('postback will receive specific Parameters.')
                                            <br>
                                            @lang('Here you have to define them.')
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="box-shadow:none;border-color:#4aa276;">
                                    <label for="endpoint">@lang('The postback endpoint:')</label>
                                    <div class="d-flex">
                                        <input type="text" value="{{ url('offers/custom/callback') }}/" class="form-control w-75"
                                            readonly disabled />
                                        <input type="text" name="endpoint" class="form-control w-25" style="box-shadow:none;border-color:#4aa276;"
                                            value="{{ old('endpoint') }}" />
                                    </div>
                                    <small>@lang('Choose random and hard words to be guess')</small>
                                </div>
                                <br />
                                <x-bs::input type="text" name="response" value="{{ old('response') }}" placeholder="ok"
                                    :label="__('Postback Response')" style="box-shadow:none;border-color:#4aa276;"
                                    :help="__('some of offerwalls postack needs spacific response Ex: Ok, 1')" />
                                <br>

                                <x-bs::input type="text" name="signature" value="{{ old('signature') }}"
                                    :label="__('Signature identification parametar on postback url')" style="box-shadow:none;border-color:#4aa276;"
                                    placeholder="signature"
                                    :help="__('that can be used to verify that the call has been made from offerwall site.')" />
                                <br />

                                <x-bs::input type="text" name="signature_structure"
                                    value="{{ old('signature_structure') }}" :label="__('Signature structure')"
                                    placeholder="md5(userId.rewards.amount) == signature"
                                    help="In most cases, It will be look like md5(userId.rewards.amount) == signature" />
                                <br />
                            </div>
                            <div class="col-md-6">
                                <x-bs::input type="text" name="secret_key" value="{{ old('secret_key') }}"
                                    :label="__('The app secret key')" placeholder="xxxxxx" style="box-shadow:none;border-color:#4aa276;"
                                    :help="__('This will be usd for security verification')" />
                                <br />

                                <x-bs::input type="text" name="user_ident" value="{{ old('user_ident') }}"
                                    :label="__('User identification parametar on postback url')" placeholder="subId" style="box-shadow:none;border-color:#4aa276;"
                                    :help="__('This is the unique identifier code of the user who completed action on your platform.')" />
                                <br />

                                <x-bs::input type="text" name="amount" value="{{ old('amount') }}"
                                    :label="__('Rewards identification parametar on postback url')" placeholder="amount" style="box-shadow:none;border-color:#4aa276;"
                                    :help="__('The rewards to be credited to your user.')" />
                                <br />

                                <x-bs::input type="text" name="trx" value="{{ old('trx') }}"
                                    :label="__('The transtion identification parametar on postback url')" placeholder="transId" style="box-shadow:none;border-color:#4aa276;"
                                    :help="__('Unique identification code of the transaction made by your user on the platform')" />
                                <br />

                                <x-bs::input type="text" name="server_ip" value="{{ old('server_ip') }}"
                                    :label="__('The offerwall sites server ip')" placeholder="0.0.0.0" style="box-shadow:none;border-color:#4aa276;"
                                    :help="__('Some of sites provides IPs to verify the request from them, If the more than one seperate them by comma.')" />
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="@lang('Save')" class="btn btn-primary" style="box-shadow:none;border-color:#4aa276;background:#4aa276;" disabled />
            </form>
        </div>
    </div>
@endsection
