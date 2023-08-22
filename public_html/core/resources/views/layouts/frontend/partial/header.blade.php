<div class="preloader">
<img src="{{ asset('asset/img/preloader.svg') }}"> 
</div>
<nav class="main-navbar container-fluid">
        <div class="main-navbar-container" id="logo-main-container">
        <!--@if(!in_array(Route::currentRouteName(), ['user.home','user.withdraw','user.withdraw.history','user.offer.reports','user.commissions','user.referred','user.profile.setting','user.twofactor','user.change.password','ticket']))-->
            @if(!auth()->check())
                <a  href="{{ url('/') }}">
                    <img src="{{ asset('asset/img/gainifylg.svg') }}" style="width:250px;">
                </a>
            @else
                @if(in_array(Route::currentRouteName(), ['welcome']))
                   <a  href="{{ url('/') }}" class="logohomeone" style="display:block">
                    <img src="{{ asset('asset/img/gainifylg.svg') }}">
                </a>
                <a  href="{{ url('/') }}" class="logohometwo" style="display:none">
                    <img src="{{ asset('asset/img/gainifylg.svg') }}">
                </a>
                @endif
            @endif
        <!--@endif-->
            
        @guest
            <div class="main-nav-buttons" >
                
                
                 <a  href="{{ route('user.login') }}" style="text-decoration:none;">
             <button class="btn btn-primary nav-link register-btn" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;width:150px;height:35px;color:#fff;text-decoration:none;margin-right:10px;letter-spacing:3px;background: #1F5370;border-color: #1F5370;"><i class="fa-solid fa-user-group"></i> Login</button>
           </a>
             <a  href="{{ route('user.register') }}" style="text-decoration:none;">
             <button class="btn btn-primary nav-link login-btn" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;height:35px;color:#fff;text-decoration:none;letter-spacing:3px;background: #1F5370;border-color: #1F5370;"><i class="fa-solid fa-user-plus"></i>Sign up</button>
           </a>
           
            </div>
        @else
        <div style="margin-top: 35px"></div>
            @if(Route::currentRouteName() == 'welcome')
            <a  href="{{ route('user.home') }}" style="text-decoration:none;margin-right:10px;">
             <button class="btn btn-primary nav-link login-btn text-center" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;width:160px;height:40px;color:#fff;text-decoration:none;letter-spacing:3px;background: #1F5370;border-color: #1F5370;">Dashboard</button>
           </a>
           @endif
        @endguest
        </div>
    </div>
</nav>
<div id="last_offers">
    @livewire('live-state')
</div>
<div id="chat">
    @livewire('live-chat')
</div>

