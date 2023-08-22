<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link href="<?php echo e(asset('asset/static/toastr/toastr.min.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('asset/static/toastr/toastr.min.js')); ?>"></script>


<head>
        <?php echo $__env->make('layouts.frontend.partial.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldPushContent('css'); ?>
    <style>
    
        .dashboard-app .top-navbar-link-container,
        .bottom-nav  .top-navbar-link-container{
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 100%;
            margin-top: 14px;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .dashboard-app .top-navbar-link,
        .bottom-nav  .top-navbar-link{
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
            color: #fff !important;
            text-decoration: none !important;
            padding: 4px 15px;
            gap: 4px;
        }
        .dashboard-app .top-navbar-link.top-bar-active span,
        .bottom-nav  .top-navbar-link.top-bar-active span{
            color: #4aa276 !important;
        }
        
        .dashboard-app .top-navbar-link:hover span,
        .bottom-nav  .top-navbar-link:hover span{
            color: #4aa276 !important;
        }
        
        .dashboard-app .top-navbar-link:last-of-type,
         .bottom-nav  .top-navbar-link:last-of-type {
            margin-right: 0;
            font-size: .73rem !important;
        }
        
        .dashboard-app .top-navbar-link span.title,
         .bottom-nav  .top-navbar-link span.title{
            font-size: 11px !important;
            color: #fff;
            letter-spacing: 1px;
        }
        
        .dashboard-app .dropdown-settings-link,
        .bottom-nav  .dropdown-settings-link{
            letter-spacing: 1px;
        }
        
        .dashboard-app .dropdown-settings-link:hover,
        .bottom-nav  .dropdown-settings-link:hover{
            color: #4aa276 !important
        }
        
        .dashboard-app .dropdown-menu-settings,
         .bottom-nav  .dropdown-menu-settings{
            background: #242B27;
            position: absolute;
            top: 53px;
            left: -25px;
            z-index: 100000;
            border-radius:20px;
        }
        
        .dashboard-app .dropdown-menu-settings a,
        .bottom-nav  .dropdown-menu-settings a
        {
            color: #fff;
            padding: 10px 25px;
            text-decoration: none;
            font-size:12px;
        }
        
        .dashboard-app .trigger-dropdown:hover .dropdown-menu-settings,
        .bottom-nav  .trigger-dropdown:hover .dropdown-menu-settings
        {
            display: block !important;
        }
        
        .dashboard-app .trigger-dropdown:hover .dropdown-menu-settings .bottom-nav {
            display: none;
        }
        .bottom-nav{
            display: none;
        }
        
        @media(min-width:992px ) and (max-width:1050px){
            .dashboard-toolbar .logo-img{
                width: 120px;
            }
            .dashboard-app .top-navbar-link-container{
                gap: 0
            }
        }
        
        @media (max-width: 991px) {
            .copy-right{
                margin-bottom: 80px;
            }
            .bottom-nav{
                display: flex;
            }
            .bottom-nav .top-navbar-link-container{
                gap: 10px    
            }
            .bottom-nav {
                display: block !important;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                background: #121714;
                z-index: 1111111;
                margin-top: 100px;
            }
        
            .dashboard-app  .top-navbar-link-container {
                display: none !important;
            }
            
            .bottom-nav .dropdown-menu-settings {
                background: #242B27;
                position: absolute;
                top: -180px;
                z-index: 99999999;
            }
        }
        
        @media (max-width: 650px) {
            .top-navbar-link {
                padding: 5px !important;
            }
            
            .bottom-nav .top-navbar-link-container{
                gap: 10px   !important; 
            }
        }
        
        @media (max-width: 500px) {
            .dashboard-app .top-navbar-link-container {
                gap: 5px !important;        
            }
        }
        
        @media (max-width: 450px) {
            .bottom-nav .top-navbar-link-container{
                gap: 10px   !important; 
            }
            .bottom-nav .top-navbar-link span.title{
                font-size: 10px !important;    
            }
            .bottom-nav .top-navbar-link-container{
                justify-content:space-between;
            }
        }
       
        
        
    </style>    
     <link rel="manifest" href="/manifest.json">
</head>

<?php echo $__env->make('layouts.frontend.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(auth()->user()): ?>

    <div class="dashboard dashboard-compact" >
        <div class="dashboard-nav"  >
            
            <nav class="dashboard-nav-list">
                <a href="<?php echo e(url('/')); ?>" id="dashboard_main_image_container">
                    <img src="<?php echo e(asset('asset/img/freelootlogo.svg')); ?>" id="dashboard_main_image" >
                </a>
                <?php if(userInfo()->role): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="dashboard-nav-item" style="letter-spacing:3px;opacity: .8;">
                         <i><img src="<?php echo e(asset('asset/img/admindashboard.svg')); ?>"></i>
                        Admin Dashboard
                    </a>
                <?php endif; ?>
               
            </nav>
        </div>
        
        <div class='dashboard-app'>
            <header class='dashboard-toolbar' style="display:flex;justify-content:space-between;align-items:center" >
                
                
                <a href="<?php echo e(url('/')); ?>" class="logohomeone">
                    <img src="<?php echo e(asset('asset/img/freelootlogo.svg')); ?>" width="200" class="logo-img" style="margin-top:5px;">
                </a>
                <a  href="<?php echo e(url('/')); ?>" class="logohometwo" style="display:none">
                    <img src="<?php echo e(asset('asset/img/mobile_logo.svg')); ?>" style="margin-top:8px;">
                </a>
                
                <div class="top-navbar-link-container">
                    <a href="<?php echo e(route('user.home')); ?> " class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.home' ? 'top-bar-active' :  ''); ?>">
                        <img src="<?php echo e(asset('asset/img/dashboard.svg')); ?>" style="pointer-events:none;">
                        <span class="title">Earn</span>
                    </a>
                    <?php if(auth()->check()): ?>
                         <?php if(userInfo()->role): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="top-navbar-link" style="font-size:14px;" target="_blank">
                                 <img src="<?php echo e(asset('asset/img/admindashboard.svg')); ?>" style="pointer-events:none;">
                                <span class="title" style="font-size:14px;">Admin</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                   <!-- <a href="<?php echo e(route('user.offer.reports')); ?> " class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.offer.reports' ? 'top-bar-active' :  ''); ?>">
                        <img src="<?php echo e(asset('asset/img/history.svg')); ?>" style="pointer-events:none;">
                        <span class="title">History</span>
                    </a>-->
                    
                    <a href="<?php echo e(route('user.commissions')); ?>" class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.commissions' ? 'top-bar-active' :  ''); ?>">
                        <img src="<?php echo e(asset('asset/img/referrals.svg')); ?>" style="pointer-events:none;">
                        <span class="title">Referrals</span>
                    </a>
                    
                    <a href="<?php echo e(route('user.withdraw')); ?>" class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.withdraw' ? 'top-bar-active' :  ''); ?>">
                        <img src="<?php echo e(asset('asset/img/cashout.svg')); ?>" style="pointer-events:none;">
                        <span class="title">Shop</span>
                    </a>
                    
                    <a href="<?php echo e(route('user.profile.setting')); ?>" class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.profile.setting' ? 'top-bar-active' :  ''); ?>">
                        <img src="<?php echo e(asset('asset/img/settings.svg')); ?>" style="pointer-events:none;">
                        <span class="title">Profile</span>
                    </a>
                    
                
                     <a class="top-navbar-link">
                        <img src="<?php echo e(asset('asset/img/leaderboard.svg')); ?>" style="pointer-events:none;">
                        <span class="title">Leaders</span>
                    </a>
                        
                   
                    
                </div>
                
                
                <div class="dash-toolbar-links">
                    <a href="#" class="dash-nav-link" style="letter-spacing:1px;opacity: .8;display:flex;align-items:center;gap:8px">  
                        <div style="width:30px;height:30px;border-radius: 50%;padding:10px;background:#121714;display:flex;align-items:center;justify-content:center">
                            <i class="fas fa-wallet" style="color:#4aa276"></i>
                        </div>
                        <span class="text-success" style="letter-spacing: 1px;"> 
                            <?php echo e(showAmount(userInfo()->balance)); ?>

                        </span>
                        <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>" style="pointer-events:none;"></i>
                    </a>
                </div>
                
            </header>
            
            <form id="logout-form" action="<?php echo e(url('logout')); ?>"><?php echo csrf_field(); ?></form>
            <div class='dashboard-content'>
                <div class='container'>
                    <div class="title pb-20">
                        <?php if(($ad = $topAds->where('size', '728*90')->first()) !== null): ?>
                            <?php echo $ad->contents; ?>

                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (! empty(trim($__env->yieldContent('content')))): ?>
                                <?php echo $__env->yieldContent('content'); ?>
                            <?php else: ?>
                                <?php echo e($slot ?? ''); ?>

                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <div class="right-ads d-md-block d-sm-flex justify-content-between mt-5">
                                <?php $__currentLoopData = $rightAds->where('size', '250*250')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="mt-1">
                                        <?php echo $ads->contents; ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
<?php endif; ?>

    <div class="container" >
        <div class="row justify-content-center">
            <?php if(request()->routeIs('user.register')): ?>
                <div class="col-md-8">
                <?php else: ?>
                    <div class=" <?php echo e((request()->routeIs('tos') ||  request()->routeIs('policy') || request()->routeIs('faq')) ? 'col-md-12' : 'col-md-6'); ?>">
            <?php endif; ?>
            <div class="<?php echo e((request()->routeIs('user.register') || request()->routeIs('user.login')) ? 'panel' : ''); ?> c-white sd-oreng mt-5rem login-form">
                <div class="panel-header">
                    <?php if(request()->routeIs('user.login')): ?>
                        <h3 class="text-center font-weight-light my-4" style="font-size:22px;"><?php echo app('translator')->get('Login'); ?></h3>
                    <?php elseif(request()->routeIs('user.register')): ?>
                        <h3 class="text-center font-weight-light my-4" style="font-size:22px;"><?php echo app('translator')->get('Create New Account'); ?></h3>
                    
                    <?php endif; ?>
                </div>
                <?php if(!auth()->check()): ?>
                    <div class="panel-body <?php echo e((request()->routeIs('tos') ||  request()->routeIs('policy') || request()->routeIs('faq')) ? 'mt-5' : ''); ?>">
                        <?php if (! empty(trim($__env->yieldContent('content')))): ?>
                            <?php echo $__env->yieldContent('content'); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
        <?php echo $__env->yieldContent('modal'); ?>
    </div>
    
    <?php if(auth()->check()): ?>
        <div class="bottom-nav" >
        <div class="top-navbar-link-container" >
            <a href="<?php echo e(route('user.home')); ?> " class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.home' ? 'top-bar-active' :  ''); ?>">
                <img src="<?php echo e(asset('asset/img/dashboard.svg')); ?>" style="pointer-events:none;">
                <span class="title">Earn</span>
            </a>
            <!--<a href="<?php echo e(route('user.offer.reports')); ?> " class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.offer.reports' ? 'top-bar-active' :  ''); ?>">
                <img src="<?php echo e(asset('asset/img/history.svg')); ?>" style="pointer-events:none;">
                <span class="title">History</span>
            </a>-->
             <?php if(auth()->check()): ?>
             <?php if(userInfo()->role): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="top-navbar-link"  style="font-size:14px;" target="_blank">
                             <i><img src="<?php echo e(asset('asset/img/admindashboard.svg')); ?>" ></i>
                          <span class="title">Admin</span>
                        </a>
                <?php endif; ?>
                <?php endif; ?>
            
            <a href="<?php echo e(route('user.commissions')); ?>" class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.commissions' ? 'top-bar-active' :  ''); ?>">
                <img src="<?php echo e(asset('asset/img/referrals.svg')); ?>" style="pointer-events:none;">
                <span class="title">Referrals</span>
            </a>
            
            <a href="<?php echo e(route('user.withdraw')); ?>" class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.withdraw' ? 'top-bar-active' :  ''); ?>">
                <img src="<?php echo e(asset('asset/img/cashout.svg')); ?>" style="pointer-events:none;">
                <span class="title">Shop</span>
            </a>
             
             
             <a href="<?php echo e(route('user.profile.setting')); ?>" class="top-navbar-link <?php echo e(Route::currentRouteName() == 'user.profile.setting' ? 'top-bar-active' :  ''); ?>">
                        <img src="<?php echo e(asset('asset/img/settings.svg')); ?>" style="pointer-events:none;">
                        <span class="title">Profile</span>
                    </a>
           
            
            
            <a class="top-navbar-link">
                        <img src="<?php echo e(asset('asset/img/leaderboard.svg')); ?>" style="pointer-events:none;">
                        <span class="title">Leaders</span>
                    </a>
                
            
            
        </div>
    </div>
    <?php endif; ?>
    
<?php echo $__env->make('layouts.frontend.partial.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.components.js-notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if (! empty(trim($__env->yieldContent('editor')))): ?>
    <?php echo $__env->make('layouts.components.nice-editor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.components.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('script'); ?>

<script>
    
    $(document).ready(function(){
       $(".menu-toggle").click(function(){
        //  console.log('called'); 
         var hasClass = $(".dashboard").hasClass('dashboard-compact');
         if(hasClass == false){
            // margin left increase  
            $('#last_offers').css({
                "margin-left": "270px"
            });
            
            $(".footer").css({
                 "margin-left": "270px"
            });
            
         }
         else{
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
<?php /**PATH /home/freebpbk/public_html/core/resources/views/layouts/theme/default.blade.php ENDPATH**/ ?>