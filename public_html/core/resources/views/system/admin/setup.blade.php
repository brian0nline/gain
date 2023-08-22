
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 style="font-size:22px;margin-top:5px;">@lang('Anti-fraud System')</h2>

            </div>
            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate wire:submit.prevent="save">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <x-bs::check model="name.single_account_per_ip" :label="__('Single account per ip')" :help="__('Dont let users open more than one account from the same IP')" />
                            <br>
                            <x-bs::check model="name.detect_using_vpn" :label="__('Block VPN Access')" :help="__('Dont let users using VPN, bots, bad IPs')" />
                            <br>
                            <x-bs::check model="name.auto_ban_multiple_accounts" :label="__('Auto ban multiple accounts')" :help="__('If users try to create more than account will be banned')" />
                            <br>
                            <x-bs::check model="name.auto_ban_using_vpn" :label="__('Auto ban users who use VPS')" :help="__('If users try to use VPN will be banned')" />
                        </div>
                        <div class="col-md-6">
                            <x-bs::check model="name.detect_adblock" :label="__('Detect using Adbloks')" :help="__('Dont let users use adblock extensions and softwares ')" />
                            <br>
                            <x-bs::input type="text" model="name.proxycheck_io_api" 
                            :label="__('Your Proxycheck.io Api Key')" />

                        </div>
                    </div>
                    <br>
                    <x-bs::textarea model="name.blocked_country" :label="__('Block these countries from access to the Offers ')" :placeholder="__('USA, UK')" :help="__(
                        'use country code like USA, UK, .. and celebrate them by comma ,leave it blank to undefined',
                    )"  />
                </div>
                <button type="submit" class="btn btn-success btn-block w-100" style="box-shadow:none;background: #6FB99F;border-color:#6FB99F;border-radius:10px;" >@lang('Save')</button>
            </form>
        </div>
    </div>
</div>
