<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('asset/img/favicon.svg') }}" rel="icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
       @if(View::hasSection('title'))
            @yield('title')
        @else
            Admin Dashboard | Gainify
        @endif
       
    </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link href="{{ asset('asset/static/app/css/app.css') }}?v=1" rel="stylesheet">
    @hasSection('checkbox')
        <link rel="stylesheet" href="{{ asset('asset/static/checkbox/bootstrap-toggle.min.css') }}">
    @endif
    <link href="{{ asset('asset/admin/app.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/admin/style.css') }}" rel="stylesheet">
    <style>
        .dropdown-hover:hover .dropdown-menu {
          display: block !important;
        }
        .topbar .top-navbar .navbar-nav>.nav-item>.nav-link{
          font-size: 14px !important;
          font-weight: 600 !important;
          margin-left: 10px;
        }
        .topbar .top-navbar .navbar-nav>.nav-item>.nav-link.sidebartoggler{
            font-size: 18px !important;
        }
        @media(max-width: 1200px){
            .topbar .top-navbar .navbar-nav>.nav-item>.nav-link{
              font-size: 12px !important;
              font-weight: 500 !important;
              padding: 0 10px;
            }
        }
        
        .dropdown-item {
    display: block;
    width: 100%;
    padding: .25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #fff;
    text-align: inherit;
    text-decoration: none;
    white-space: nowrap;
    background-color: #35515F;
    border: 0;
}

 .dropdown-item:hover {
    display: block;
    width: 100%;
    padding: .25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #fff;
    text-align: inherit;
    text-decoration: none;
    white-space: nowrap;
    background-color: #35515F;
    border: 0;
}
    </style>
    @stack('style')
    <livewire:styles />
    <link rel="manifest" href="{{ asset('asset/json/manifest.json') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="skin-default fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <div class="loader__label"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="admin-full-header w-100" style="display:flex; align-items: center; flex-direction: column;margin-top:100px;">
                    <div class="admin-top-header w-100" style="display:flex; align-items: center; justify-content: space-between; background: #1F2F37; padding: 4px 15px">
                        <div class="left-part">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ route('welcome') }}">
                                    <span>
                                        <img src="{{asset('asset/img/gainifylg.svg')}}" width="200" class="dark-logo" alt="logo" style="pointer-events:none;" />
                                </a>
                            </div>
                           
                        </div>
                        <div class="right" style="display: flex;align-items:center">
                             <ul class="navbar-nav my-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell fa-2x" style="color: #fff;font-size: 25px;"></i> 
                                        <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown">
                                        <ul>
                                            <li>
                                                <div class="drop-title">@lang('Notifications')</div>
                                            </li>
                                            <li>
                                                <div class="message-center">
                                                    @foreach ($adminNotifications as $notify)
                                                        <a href="javascript:void(0)">
                                                            <div class="btn btn-primary btn-circle text-white"><i
                                                            class="fa fa-link"></i>
                                                            </div>
                                                            <div class="mail-contnet">
                                                                <span class="mail-desc">{{ $notify->title }}</span>
                                                                <span
                                                                    class="time">{{ showDateTime($notify->created_at) }}</span>
                                                            </div>
                                                        </a>
                                                    @endforeach
        
                                                </div>
                                            </li>
                                            <li>
                                                <a class="nav-link text-center link" href="{{ route('moder.notifications') }}">
                                                    <strong>@lang('Check
                                                        all notifications')</strong> <i class="fa fa-angle-right"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                                        data-bs-toggle="dropdown"><i class="fas fa-user fa-2x" style="color: #fff;font-size: 25px;"></i> 
                                        
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end mailbox" style="z-index:999999999999999999999">
                                        <ul>
                                            <li>
                                                <div>
                                                    <a href="{{route('user.home')}}">
                                                        <div class="mail-contnet" style="padding: 7px 20px">
                                                            <span class="mail-desc">User Dashboard</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <a href="javascript:void(0)" onclick="event.preventDefault(); $('form#logout-form').submit();">
                                                        <div class="mail-contnet" style="padding: 7px 20px">
                                                            <span class="mail-desc">Logout</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="admin-bottom-header w-100">
                        <div class="navbar-collapse">
                            <ul class="navbar-nav" id="adminTopNavbar">
                                    <!-- This is  -->
                                        
                                    <li class="nav-item">
                                        <a class="nav-link sidebartoggler waves-effect waves-dark" style="margin-left: 28px" href="javascript:void(0)">
                                            <i class="fas fa-list" style="color:#fff;box-shadow:none;"></i>
                                        </a>
                                    </li>
                                        
                                    <!--DESKTOP NAVBAR LINKS-->
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://demo.freeloot.net/asset/img/dashboardadmin.svg" style="pointer-events:none;"> 
                                            Dashboard <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu"  style="color:#fff">
                                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"> Dashboard</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                            <img src="https://demo.freeloot.net/asset/img/layersadmin.svg" style="pointer-events:none;"> Offerwalls  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('moder.offer.builtin.index') }}">Builtin Offerwalls</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.offer.index') }}">Web Offerwalls</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.offer.analysis') }}">Stats</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://demo.freeloot.net/asset/img/referraladmin.svg" style="pointer-events:none;"> Referral System  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('moder.referral.index') }}">Levels</a></li>
                                           
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://demo.freeloot.net/asset/img/managecashouts.svg" style="pointer-events:none;"> Withdrawals  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('moder.withdraw.method.index') }}">Manage</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.withdraw.pending') }}">Pending
                                            @if ($pending_withdraw_count)
                                            <span
                                                class="badge badge-warning pill bg-primary ml-auto p-0" style="background:#e84b3c;">{{ $pending_withdraw_count }}</span>
                                        @endif</a></li>
                                            
                                            <li><a class="dropdown-item" href="{{ route('moder.withdraw.log') }}">History</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://demo.freeloot.net/asset/img/accounts.svg" style="pointer-events:none;"> Users  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('moder.users.all') }}">Manage All</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.users.email.all') }}">Email To All</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://demo.freeloot.net/asset/img/settingsadmin.svg" style="pointer-events:none;"> Settings  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('moder.settings.control') }}">General</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.settings.authentication') }}">Google Login</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.settings.security') }}">Captcha</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.email.setting') }}">Email-Sender</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://demo.freeloot.net/asset/img/bars.svg" style="pointer-events:none;"> Other  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('moder.ads.index') }}">Ads</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.offers.config') }}">Anti-Fraud System</a></li>
                                           
                                            <li><a class="dropdown-item" href="{{route('moder.tools')}}">Tools</a></li>
                                            <li><a class="dropdown-item" href="{{ route('moder.email.templates') }}">Email Templates</a></li>
                                        </ul>
                                    </li>
                                    <!--DESKTOP NAVBAR LINKS-->
                                    
                            </ul>
                           
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        
         <form id="logout-form" action="{{ url('logout') }}">@csrf</form>
        
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li><a class="waves-effect waves-dark" href="{{ route('user.home') }}" aria-expanded="false"><i><img src="{{ asset('asset/img/homeuseradmin.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                    @lang('User Dashboard')
                                </span></a>
                        </li>
                        <li><a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/dashboardadmin.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                    @lang('Dashboard')
                                </span></a>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/layersadmin.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">@lang('    Offerwalls')</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('moder.offer.builtin.index') }}">@lang('Builtin Offerwalls')</a></li>
                                <li><a href="{{ route('moder.offer.index') }}">@lang('Web Offerwalls')</a></li>
                              
                                <li><a href="{{ route('moder.offer.analysis') }}">@lang('Stats')</a></li>

                            </ul>
                        </li>
                         <li><a class="waves-effect waves-dark"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/microtasksadmin.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                    @lang('Micro Tasks')
                                </span></a>
                        </li>
                         <li><a class="waves-effect waves-dark"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/leaderboardadmin.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                    @lang('LeaderBoard')
                                </span></a>
                        </li>
                        <li><a class="waves-effect waves-dark" href="{{ route('moder.ads.index') }}"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/advertising.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                    @lang('Ads')
                                </span></a>
                        </li>


                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/referraladmin.svg') }}" style="pointer-events:none;"></i></i><span
                                    class="hide-menu">@lang('Referral System')</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('moder.referral.index') }}">@lang('Levels')</a></li>
                            

                            </ul>
                        </li>


                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/managecashouts.svg') }}" style="pointer-events:none;"></i></i><span
                                    class="hide-menu">@lang('Withdrawals')</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('moder.withdraw.method.index') }}">@lang('Manage')</a></li>
                                <li><a href="{{ route('moder.withdraw.pending') }}">@lang('Pending')
                                        @if ($pending_withdraw_count)
                                            <span
                                                class="badge badge-warning pill bg-primary ml-auto p-0" style="background:#e84b3c;">{{ $pending_withdraw_count }}</span>
                                        @endif
                                    </a></li>

                                <li><a href="{{ route('moder.withdraw.log') }}">@lang('History')</a>
                                </li>

                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/accounts.svg') }}" style="pointer-events:none;"></i><span
                                    class="hide-menu">@lang('Users')</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('moder.users.all') }}">@lang('Manage All')
                                    </a></li>
                                <li><a href="{{ route('moder.users.email.all') }}">@lang('Email To
                                        All')</a></li>
                            </ul>
                        </li>
                       
                    </li>


                    <li><a class="waves-effect waves-dark" href="{{ route('moder.email.templates') }}"
                            aria-expanded="false"><i><img src="{{ asset('asset/img/emailadmin.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                @lang('Email Templates')
                            </span></a>
                    </li>
                    <li><a class="waves-effect waves-dark"  href="{{route('moder.tools')}}"
                            aria-expanded="false"><i><img src="{{ asset('asset/img/companytemplates.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                @lang('FL Tools/TMPLT')
                            </span></a>
                    </li>
                    <li><a class="waves-effect waves-dark" href="{{ route('moder.language.manage') }}"
                            aria-expanded="false"><i><img src="{{ asset('asset/img/language.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                @lang('Language')
                            </span></a>
                    </li>
                     <li><a class="waves-effect waves-dark" href="{{ route('moder.offers.config') }}"
                                aria-expanded="false"><i><img src="{{ asset('asset/img/antifraudsystem.svg') }}" style="pointer-events:none;"></i><span class="hide-menu">
                                    @lang('Anti-Fraud System')
                                </span></a>
                        </li>
                    <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i><img src="{{ asset('asset/img/settingsadmin.svg') }}" style="pointer-events:none;"></i><span
                                class="hide-menu">@lang('Settings')</span></a>

                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('moder.settings.general') }}">@lang('Appereance')
                                </a></li>
                            <li><a href="{{ route('moder.settings.authentication') }}">@lang('Google Login')
                                </a></li>
                            <li><a href="{{ route('moder.settings.security') }}">@lang('Captcha')
                                </a></li>
                            <li><a href="{{ route('moder.settings.control') }}">@lang('General')
                                </a></li>
                            <li><a href="{{ route('moder.email.setting') }}">@lang('Email-Sender')
                                </a></li>
                        </ul>
                    </li>
                    <li style="margin-top: 200px">&nbsp;</li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="page-wrapper">


            <div class="container-fluid">
                <!-- /sidebar menu -->
                <div class="row my-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @hasSection('panel')
                                    @yield('panel')
                                @else
                                    {{ $slot }}
                                @endif

                            </div>
                        </div>
                        <!-- /page content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- footer content -->

    </div>

    @livewireScripts
    <livewire:loader />
    <livewire:modals />
    <livewire:toasts />
    <!-- Custom Theme Scripts -->
    
    <script src="{{ asset('asset/admin/app.js') }}?v=2"></script>
    
    @hasSection('checkbox')
        <script src="{{ asset('asset/static/checkbox/bootstrap-toggle.min.js') }}"></script>
        <script>
            $(function() {
                $('input[type="checkbox"]').bootstrapToggle({
                    on: 'Enabled',
                    off: 'Disabled',
                    size: 'small',
                    onstyle: 'success',
                    offstyle: 'dark',
                });
            });
        </script>
    @endif
    <script src="{{ asset('asset/static/app/js/app.js') }}"></script>
    @include('layouts.components.nice-editor')
    @include('layouts.components.datatable')
    @include('layouts.components.js-notify')

    <script>
        $("[title]").tooltip();
    </script>
    @stack('script')

</body>

</html>