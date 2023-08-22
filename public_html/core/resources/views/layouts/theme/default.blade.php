<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link href="{{ asset('asset/static/toastr/toastr.min.css') }}" rel="stylesheet">
<script src="{{ asset('asset/static/toastr/toastr.min.js') }}"></script>


<head>
    @include('layouts.frontend.partial.head')
    @stack('css')
    <style>
        .dashboard-app .top-navbar-link-container
         {
            display: flex !important;
            align-items: center !important;
            margin-left: 25px;
            justify-content:center;
            width: 100%;
            gap: 10px;
            flex-wrap: wrap;
        }
        .bottom-nav .top-navbar-link-container{
            display: flex !important;
            align-items: center !important;
            width: 100%;
            gap: 10px;
            flex-wrap: wrap;
        }

        .dashboard-app .top-navbar-link,
        .bottom-nav .top-navbar-link {
            display: flex !important;

            justify-content: center !important;
            align-items: center !important;
            color: #fff !important;
            text-decoration: none !important;
            padding: 4px 15px;
            gap: 4px;
        }

        .dashboard-app .top-navbar-link.top-bar-active span,
        .bottom-nav .top-navbar-link.top-bar-active span {
            color: #fff !important;
            font-weight: bold
        }
        
        .dashboard-app .top-navbar-link:hover span,
        .bottom-nav .top-navbar-link:hover span {
            color: #fff !important;
            font-weight: bold
        }

        .dashboard-app .top-navbar-link:last-of-type,
        .bottom-nav .top-navbar-link:last-of-type {
            margin-right: 0;
            font-size: .73rem !important;
        }

        .dashboard-app .top-navbar-link span.title,
        .bottom-nav .top-navbar-link span.title {
            font-size: 14px !important;
            color: #fff;
            letter-spacing: 1px;
        }

        .dashboard-app .dropdown-settings-link,
        .bottom-nav .dropdown-settings-link {
            letter-spacing: 1px;
        }

        .dashboard-app .dropdown-settings-link:hover,
        .bottom-nav .dropdown-settings-link:hover {
            color: #F66253 !important
        }

        .dashboard-app .dropdown-menu-settings,
        .bottom-nav .dropdown-menu-settings {
            background: #35515F;
            position: absolute;
            top: 53px;
            left: -25px;
            z-index: 100000;
            border-radius: 20px;
        }

        .dashboard-app .dropdown-menu-settings a,
        .bottom-nav .dropdown-menu-settings a {
            color: #fff;
            padding: 10px 25px;
            text-decoration: none;
            font-size: 12px;
        }

        .dashboard-app .trigger-dropdown:hover .dropdown-menu-settings,
        .bottom-nav .trigger-dropdown:hover .dropdown-menu-settings {
            display: block !important;
        }

        .dashboard-app .trigger-dropdown:hover .dropdown-menu-settings .bottom-nav {
            display: none;
        }

        .bottom-nav {
            display: none;
        }

        @media(min-width:992px) and (max-width:1050px) {
            .dashboard-toolbar .logo-img {
                width: 120px;
            }

            .dashboard-app .top-navbar-link-container {
                gap: 0
            }
        }

        @media (max-width: 991px) {
            .copy-right {
                margin-bottom: 80px;
            }
            .top-navbar-link-container+img{
                margin-left: auto !important
            }

            .bottom-nav {
                display: flex;
            }

            .bottom-nav .top-navbar-link-container {

                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                width: 100%;
                margin-top: 14px;
                gap: 10px;
                flex-wrap: wrap;
            }
            .bottom-nav .top-navbar-link{
                flex-direction: column
            }
            .dashboard-toolbar{
                justify-content: flex-start !important
            }

            .bottom-nav {
                display: block !important;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                background: #1F2F37;
                z-index: 1111111;
                margin-top: 100px;
            }

            .dashboard-app .top-navbar-link-container {
                display: none !important;
            }

            .bottom-nav .dropdown-menu-settings {
                background: #35515F;
                position: absolute;
                top: -180px;
                z-index: 99999999;
            }
        }

        @media (max-width: 650px) {
            .top-navbar-link {
                padding: 5px !important;
            }

            .bottom-nav .top-navbar-link-container {
                gap: 10px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                width: 100%;
                margin-top: 14px;

                flex-wrap: wrap;
            }
        }

        @media (max-width: 500px) {
            .dashboard-app .top-navbar-link-container {
                gap: 5px !important;
            }
        }

        @media (max-width: 450px) {
            .bottom-nav .top-navbar-link-container {
                gap: 10px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                width: 100%;
                margin-top: 14px;

                flex-wrap: wrap;
            }

            .bottom-nav .top-navbar-link span.title {
                font-size: 10px !important;
            }

            .bottom-nav .top-navbar-link-container {
                justify-content: space-between;
            }
        }
    </style>
    <link rel="manifest" href="/manifest.json">
</head>

@include('layouts.frontend.partial.header')

@if (auth()->user())

    <div class="dashboard dashboard-compact">
        <div class="dashboard-nav">

            <nav class="dashboard-nav-list">
                <a href="{{ url('/') }}" id="dashboard_main_image_container">
                    <img src="{{ asset('asset/img/gainify-logo.png') }}" width="90px" id="dashboard_main_image">
                </a>
                @if (userInfo()->role)
                    <a href="{{ route('admin.dashboard') }}" class="dashboard-nav-item"
                        style="letter-spacing:3px;opacity: .8;">
                        <i><img src="{{ asset('asset/img/admindashboard.svg') }}"></i>
                        Admin Dashboard
                    </a>
                @endif

            </nav>
        </div>

        <div class='dashboard-app'>
            <header class='dashboard-toolbar' style="display:flex;justify-content:space-between;align-items:center">


                <a href="{{ url('/') }}" class="logohomeone">
                    <img src="{{ asset('asset/img/gainify-logo.png') }}" width="120px" class="logo-img"/>
                </a>
                <a href="{{ url('/') }}" class="logohometwo" style="display:none">
                    <img src="{{ asset('asset/img/mobile_logo.svg') }}" style="margin-top:8px;width:50px;">
                </a>

                <div class="top-navbar-link-container">
                    @if (auth()->check())
                        @if (userInfo()->role)
                            <a href="{{ route('admin.dashboard') }}" class="top-navbar-link" style="font-size:14px;"
                                target="_blank">
                                <img src="{{ asset('asset/img/adminbottom.svg') }}" style="pointer-events:none;width:24px">
                                <span class="title" style="font-size:14px;">Admin</span>
                            </a>
                        @endif
                    @endif
                    <a href="{{ route('user.home') }} "
                        class="top-navbar-link {{ Route::currentRouteName() == 'user.home' ? 'top-bar-active' : '' }}">
                        <img src="{{ asset('asset/img/icons8-money-bag-100.png') }}" style="pointer-events:none;width:24px">
                        <span class="title">Earn</span>
                    </a>


                    <a href="{{ route('user.withdraw') }}"
                        class="top-navbar-link {{ Route::currentRouteName() == 'user.withdraw' ? 'top-bar-active' : '' }}">
                        <img src="{{ asset('asset/img/icons8-withdraw-64_1.png') }}" style="pointer-events:none;width:24px">
                        <span class="title">Shop</span>
                    </a>
                    
                    <a href="{{ route('user.commissions') }}"
                class="top-navbar-link {{ Route::currentRouteName() == 'user.commissions' ? 'top-bar-active' : '' }}">
                        <img src="{{ asset('asset/img/referralsbottom.svg') }}" style="pointer-events:none;width:24px">
                        <span class="title">Referrals</span>
                    </a>


                  <!--  <a href="#"
                        class="top-navbar-link">
                        <img src="{{ asset('asset/img/icons8-crown-100.png') }}" style="pointer-events:none;width:20px">
                        <span class="title">Leaderboard</span>
                    </a>-->

                    {{-- <a href="{{ route('user.profile.setting') }}"
                        class="top-navbar-link {{ Route::currentRouteName() == 'user.profile.setting' ? 'top-bar-active' : '' }}">
                        <img src="{{ asset('asset/img/settings.svg') }}" style="pointer-events:none;">
                        <span class="title">Profile</span>
                    </a> --}}






                </div>

               <!-- <img src="{{asset('asset/images/bell.png')}}" width="26" alt="">-->
               
                <div class="dash-toolbar-links">
                    <a href="#" class="dash-nav-link">
                        <span><img src="{{asset('asset/img/coins.svg')}}" style="width: 22px;" ></span>
                        <span class="text-success" style="letter-spacing: 1px;">
                            {{ showAmount(userInfo()->balance) }}
                        </span>
                    </a>
                </div>

                <div class="dash-toolbar-links">
                    <a href="{{route('user.profile.setting')}}" class="dash-nav-link">
                        <img src="{{asset('asset/images/user.png')}}" width="20" alt="">
                        <span class="text-success" style="letter-spacing: 1px;">
                            User
                        </span>
                        <img src="{{asset('asset/img/arrowuser.svg')}}" width="20" alt="">
                    </a>
                </div>

            </header>

            <form id="logout-form" action="{{ url('logout') }}">@csrf</form>
            <div class='dashboard-content'>
                <div class='container'>
                    <div class="title pb-20">
                        @if (($ad = $topAds->where('size', '728*90')->first()) !== null)
                            {!! $ad->contents !!}
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @hasSection('content')
                                @yield('content')
                            @else
                                {{ $slot ?? '' }}
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="right-ads d-md-block d-sm-flex justify-content-between mt-5">
                                @foreach ($rightAds->where('size', '250*250')->get() as $ads)
                                    <div class="mt-1">
                                        {!! $ads->contents !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endif

<div class="container">
    <div class="row justify-content-center">
        @if (request()->routeIs('user.register'))
            <div class="col-md-8">
            @else
                <div
                    class=" {{ request()->routeIs('tos') || request()->routeIs('policy') || request()->routeIs('faq') ? 'col-md-12' : 'col-md-6' }}">
        @endif
        <div
            class="{{ request()->routeIs('user.register') || request()->routeIs('user.login') ? 'panel' : '' }} c-white sd-oreng mt-5rem login-form">
            <div class="panel-header">
                @if (request()->routeIs('user.login'))
                    <h3 class="text-center font-weight-light my-4" style="font-size:22px;">@lang('Login')</h3>
                @elseif(request()->routeIs('user.register'))
                    <h3 class="text-center font-weight-light my-4" style="font-size:22px;">@lang('Create New Account')</h3>
                    {{-- @else
                        <h3 class="text-center font-weight-light my-4" style="font-size:22px;">@lang('Required Action')</h3> --}}
                @endif
            </div>
            @if (!auth()->check())
                <div
                    class="panel-body {{ request()->routeIs('tos') || request()->routeIs('policy') || request()->routeIs('faq') ? 'mt-5' : '' }}">
                    @hasSection('content')
                        @yield('content')
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
</div>
@yield('modal')
</div>

@if (auth()->check())
    <div class="bottom-nav">
        <div class="top-navbar-link-container">
            <a href="{{ route('user.home') }} "
                class="top-navbar-link {{ Route::currentRouteName() == 'user.home' ? 'top-bar-active' : '' }}">
                <img src="{{ asset('asset/img/icons8-money-bag-100.png') }}" style="pointer-events:none;width:24px;">
                <span class="title">Earn</span>
            </a>
            <!--<a href="{{ route('user.offer.reports') }} " class="top-navbar-link {{ Route::currentRouteName() == 'user.offer.reports' ? 'top-bar-active' : '' }}">
                <img src="{{ asset('asset/img/history.svg') }}" style="pointer-events:none;">
                <span class="title">History</span>
            </a>-->
            @if (auth()->check())
                @if (userInfo()->role)
                    <a href="{{ route('admin.dashboard') }}" class="top-navbar-link" style="font-size:14px;"
                        target="_blank">
                        <i><img src="{{ asset('asset/img/adminbottom.svg') }}" style="width:24px;"></i>
                        <span class="title">Admin</span>
                    </a>
                @endif
            @endif

            <a href="{{ route('user.commissions') }}"
                class="top-navbar-link {{ Route::currentRouteName() == 'user.commissions' ? 'top-bar-active' : '' }}">
                <img src="{{ asset('asset/img/referralsbottom.svg') }}" style="pointer-events:none;width:24px;">
                <span class="title">Referrals</span>
            </a>

            <a href="{{ route('user.withdraw') }}"
                class="top-navbar-link {{ Route::currentRouteName() == 'user.withdraw' ? 'top-bar-active' : '' }}">
                <img src="{{ asset('asset/img/icons8-withdraw-64_1.png') }}" style="pointer-events:none;width:24px;">
                <span class="title">Shop</span>
            </a>


           <!-- <a href="{{ route('user.profile.setting') }}"
                class="top-navbar-link {{ Route::currentRouteName() == 'user.profile.setting' ? 'top-bar-active' : '' }}">
                <img src="{{ asset('asset/img/settings.svg') }}" style="pointer-events:none;">
                <span class="title">Profile</span>
            </a>-->






        </div>
    </div>
@endif

@include('layouts.frontend.partial.foot')

@include('layouts.components.js-notify')

@hasSection('editor')
    @include('layouts.components.nice-editor')
@endif

@include('layouts.components.datatable')
@stack('script')

<script>
    $(document).ready(function() {
        $(".menu-toggle").click(function() {
            //  console.log('called'); 
            var hasClass = $(".dashboard").hasClass('dashboard-compact');
            if (hasClass == false) {
                // margin left increase  
                $('#last_offers').css({
                    "margin-left": "270px"
                });

                $(".footer").css({
                    "margin-left": "270px"
                });

            } else {
                // margin left reduce
                $('#last_offers').css({
                    "margin-left": "0"
                });
                $(".footer").css({
                    "margin-left": "0"
                });

            }
        });
    });
</script>
<script>
    if (typeof navigator.serviceWorker !== 'undefined') {
        navigator.serviceWorker.register('sw.js')
    }
</script>

</body>

</html>
