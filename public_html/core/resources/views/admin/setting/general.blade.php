@section('title', __('Appeareance Settings'))
@section('page-title', __('Site General Setting'))

<div>
    <div class="">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;" class="card-title">@lang('Basic Settings') </h2>
                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form id="demo-form" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteName">@lang('Site Name * :')</label>
                                <input type="text" id="siteName" class="form-control" wire:model="setting.siteName"
                                    value="{{ set('siteName') }}" required />
                            </div>

                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteDescription">@lang('Site Short Descrition *') :</label>
                                <input type="text" id="siteDescription" class="form-control"
                                    wire:model="setting.siteDescription" data-parsley-trigger="change"
                                    value="{{ set('siteDescription') }}" required />
                            </div>

                            <button type="submit" style="margin-top:20px;" class="btn btn-success btn-block my-2">@lang('Save')</button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;"class="card-title">@lang('SEO Settings')</h2>
                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form id="demo-form2" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteMetaName">@lang('Site Meta Name * :')</label>
                                <input type="text" id="siteMetaName" class="form-control"
                                    wire:model="setting.siteMetaName" value="{{ set('siteMetaName') }}" required />
                            </div>

                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteMetaDescription">@lang('Site Meta Description * :')</label>
                                <textarea id="siteMetaDescription" class="form-control" rows="5"
                                    wire:model="setting.siteMetaDescription" data-parsley-trigger="change" required />
                                {{ set('siteMetaDescription') }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteMetaKeywords">@lang('Site Meta Keywords *') :</label>
                                <input type="text" id="siteMetaKeywords" class="form-control"
                                    wire:model="setting.siteMetaKeywords" data-parsley-trigger="change"
                                    value="{{ set('siteMetaKeywords') }}" required />
                            </div>

                            <button type="submit" class="btn btn-success btn-block my-2">@lang('Save')</button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;" class="card-title">@lang('Social Sharing Settings')</h2>
                    </div>
                    <div class="card-body">
                        <!-- start form for validation -->
                        <form id="demo-form3" data-parsley-validate wire:submit.prevent="saveSocial"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label  style="margin-top:10px;"for="siteSocialName">@lang('Site Social Title * :')</label>
                                <input  style="margin-top:10px;"type="text" id="siteSocialName" class="form-control"
                                    wire:model="setting.siteSocialName" value="{{ set('siteSocialName') }}"
                                    required />
                            </div>

                            <div class="form-group">
                                <label for="siteSocialDescription"@lang('Site Social Description * :')</label>
                                <textarea style="margin-top:10px;" id="siteSocialDescription" class="form-control" rows="5"
                                    wire:model="setting.siteSocialDescription" data-parsley-trigger="change" required />
                                {{ set('siteSocialDescription') }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteSocialImage">@lang('Social Image') * :</label>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ asset('asset/storage/social-img.png') }}"
                                            alt="social-image" width="100px" height="100px"
                                            class="mb-5 img-responsive rounded mx-auto d-block bg-light" />
                                    </div>
                                    <div class="col-6">
                                        <input type="file" id="siteSocialImage" class="form-control"
                                            wire:model="setting.siteSocialImage" />
                                        <div wire:loading wire:target=" setting.siteSocialImage"><i
                                            class="spinner-border text-primary"></i>
                                    </div>
                                    @error('setting.siteSocialImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                    </div>

                    <button type="submit" class="btn btn-success btn-block my-2">@lang('Save')</button>

                    </form>
                    <!-- end form for validations -->

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h2 style="margin-top:10px;"class="card-title">@lang('Logo And Favicon Settings')</h2>
                </div>
                <div class="card-body">
                    <!-- start form for validation -->
                    <form id="demo-form4" data-parsley-validate wire:submit.prevent="saveSiteLogoAndFavicon"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="siteSocialImage">@lang('Site Logo Image') * :</label>
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('asset/storage/logo-img.png') }}" alt="logo-image"
                                        width="100px" height="100px"
                                        class="mb-5 img-responsive rounded mx-auto d-block bg-light" />
                                </div>

                                <div class="col-6">
                                    <input type="file" id="siteLogoImage" class="form-control"
                                        wire:model="setting.siteLogoImage" />
                                        <div wire:loading wire:target="setting.siteLogoImage"><i
                                        class="spinner-border text-primary"></i>
                                </div>
                                @error('setting.siteLogoImage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="form-group">
                    <label for="siteSocialImage">@lang('Site Favicon Image') * :</label>
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('asset/storage/Favicon-img.png') }}" alt="Favicon-image"
                                width="100px" height="100px"
                                class="mb-5 img-responsive rounded mx-auto d-block bg-light" />
                        </div>
                        <div class="col-6">
                            <input type="file" id="siteFaviconImage" class="form-control"
                                wire:model="setting.siteFaviconImage" "/>
                                        <div wire:loading wire:target=" setting.siteFaviconImage"><i
                                class="spinner-border text-primary"></i>
                        </div>
                        @error('setting.siteFaviconImage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-success btn-block my-2">@lang('Save')</button>

            </form>
            <!-- end form for validations -->

        </div>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;"class="card-title">@lang('VPS Settings ')</h2>
                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form id="demo-form" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteName">@lang('Enable strick VPS Mode'):</label>
                                <select class="form-control" wire:model="setting.strick_vps">
                                    <option value="1">@lang('Enabled')</option>
                                    <option value="0" @if(set('strick_vps')) checked @endif>@lang('Disabled')</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="margin-top:10px;" for="proxycheck_api">@lang('Broxycheck.io API ')* :</label>
                                <input type="text" id="proxycheck_api" class="form-control"
                                    wire:model="setting.proxycheck_api" data-parsley-trigger="change"
                                    value="{{ set('proxycheck_api') }}" required />
                            </div>

                            <button type="submit" class="btn btn-success btn-block my-2">@lang('Save')</button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
    </div>
</div>
</div>
</div>

</div>
@push('style')
    <link rel="stylesheet" href="{{ asset('asset/static/iCheck/skins/flat/green.css') }}" />
@endpush

@push('script')
    <script src="{{ asset('asset/static/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('asset/static/parsleyjs/dist/parsley.min.js') }}"></script>
@endpush
