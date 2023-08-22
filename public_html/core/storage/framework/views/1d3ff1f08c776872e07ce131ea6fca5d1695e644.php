<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo e(asset('asset/storage/Favicon-img.png')); ?>" rel="icon">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>
       <?php if(View::hasSection('title')): ?>
            <?php echo $__env->yieldContent('title'); ?>
        <?php else: ?>
            Admin Dashboard | Freeloot
        <?php endif; ?>
       
    </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link href="<?php echo e(asset('asset/static/app/css/app.css')); ?>?v=1" rel="stylesheet">
    <?php if (! empty(trim($__env->yieldContent('checkbox')))): ?>
        <link rel="stylesheet" href="<?php echo e(asset('asset/static/checkbox/bootstrap-toggle.min.css')); ?>">
    <?php endif; ?>
    <link href="<?php echo e(asset('asset/admin/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/admin/style.css')); ?>" rel="stylesheet">
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
    background-color: #242B27;
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
    background-color: #242B27;
    border: 0;
}
    </style>
    <?php echo $__env->yieldPushContent('style'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <link rel="manifest" href="<?php echo e(asset('asset/json/manifest.json')); ?>">
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
                    <div class="admin-top-header w-100" style="display:flex; align-items: center; justify-content: space-between; background: #121714; padding: 4px 15px">
                        <div class="left-part">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="<?php echo e(route('welcome')); ?>">
                                    <span>
                                        <img src="<?php echo e(asset('asset/img/freelootlogo.svg')); ?>" width="200" class="dark-logo" alt="logo" style="pointer-events:none;" />
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
                                                <div class="drop-title"><?php echo app('translator')->get('Notifications'); ?></div>
                                            </li>
                                            <li>
                                                <div class="message-center">
                                                    <?php $__currentLoopData = $adminNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="javascript:void(0)">
                                                            <div class="btn btn-primary btn-circle text-white"><i
                                                            class="fa fa-link"></i>
                                                            </div>
                                                            <div class="mail-contnet">
                                                                <span class="mail-desc"><?php echo e($notify->title); ?></span>
                                                                <span
                                                                    class="time"><?php echo e(showDateTime($notify->created_at)); ?></span>
                                                            </div>
                                                        </a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                                                </div>
                                            </li>
                                            <li>
                                                <a class="nav-link text-center link" href="<?php echo e(route('moder.notifications')); ?>">
                                                    <strong><?php echo app('translator')->get('Check
                                                        all notifications'); ?></strong> <i class="fa fa-angle-right"></i> </a>
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
                                                    <a href="<?php echo e(route('user.home')); ?>">
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
                                            <img src="https://freeloot.net/asset/img/dashboardadmin.svg" style="pointer-events:none;"> 
                                            Dashboard <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu"  style="color:#fff">
                                            <li><a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>"> Dashboard</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                            <img src="https://freeloot.net/asset/img/layersadmin.svg" style="pointer-events:none;"> Offerwalls  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.offer.builtin.index')); ?>">Builtin Offerwalls</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.offer.index')); ?>">Web Offerwalls</a></li>
                                            <li><a class="dropdown-item" >API Offerwalls</a></li>
                                            <li><a class="dropdown-item" >Custom Offers</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.offer.analysis')); ?>">Stats</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://freeloot.net/asset/img/referraladmin.svg" style="pointer-events:none;"> Referral System  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.referral.index')); ?>">Levels</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.referral.customize')); ?>">Ref Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://freeloot.net/asset/img/managecashouts.svg" style="pointer-events:none;"> Withdrawals  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.withdraw.method.index')); ?>">Manage</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.withdraw.pending')); ?>">Pending
                                            <?php if($pending_withdraw_count): ?>
                                            <span
                                                class="badge badge-warning pill bg-primary ml-auto p-0" style="background:#e84b3c;"><?php echo e($pending_withdraw_count); ?></span>
                                        <?php endif; ?></a></li>
                                            
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.withdraw.log')); ?>">History</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://freeloot.net/asset/img/accounts.svg" style="pointer-events:none;"> Users  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.users.all')); ?>">Manage All</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.users.email.all')); ?>">Email To All</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://freeloot.net/asset/img/supportadmin.svg" style="pointer-events:none;"> Support  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.ticket.pending')); ?>">Pending</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.ticket.index')); ?>">All</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://freeloot.net/asset/img/settingsadmin.svg" style="pointer-events:none;"> Settings  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.settings.control')); ?>">General</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.settings.authentication')); ?>">Google Login</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.settings.security')); ?>">Captcha</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.email.setting')); ?>">Email-Sender</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown dropdown-hover medium-hide-link">
                                        <a href="#" class="nav-link dropdown-toggle"  data-bs-toggle="dropdown">
                                            <img src="https://freeloot.net/asset/img/bars.svg" style="pointer-events:none;"> Other  <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.ads.index')); ?>">Ads</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.offers.config')); ?>">Anti-Fraud System</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.language.manage')); ?>">Language</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.tools')); ?>">Templates</a></li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('moder.email.templates')); ?>">Email Templates</a></li>
                                        </ul>
                                    </li>
                                    <!--DESKTOP NAVBAR LINKS-->
                                    
                            </ul>
                           
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        
         <form id="logout-form" action="<?php echo e(url('logout')); ?>"><?php echo csrf_field(); ?></form>
        
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li><a class="waves-effect waves-dark" href="<?php echo e(route('user.home')); ?>" aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/homeuseradmin.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                    <?php echo app('translator')->get('User Dashboard'); ?>
                                </span></a>
                        </li>
                        <li><a class="waves-effect waves-dark" href="<?php echo e(route('admin.dashboard')); ?>"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/dashboardadmin.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                    <?php echo app('translator')->get('Dashboard'); ?>
                                </span></a>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/layersadmin.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu"><?php echo app('translator')->get('    Offerwalls'); ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('moder.offer.builtin.index')); ?>"><?php echo app('translator')->get('Builtin Offerwalls'); ?></a></li>
                                <li><a href="<?php echo e(route('moder.offer.index')); ?>"><?php echo app('translator')->get('Web Offerwalls'); ?></a></li>
                                <li><a class="dropdown-item" ><?php echo app('translator')->get('API Offerwalls'); ?></a></li>
                                <li><a class="dropdown-item" ><?php echo app('translator')->get('Custom Offers'); ?></a></li>
                                <li><a href="<?php echo e(route('moder.offer.analysis')); ?>"><?php echo app('translator')->get('Stats'); ?></a></li>

                            </ul>
                        </li>
                         <li><a class="waves-effect waves-dark"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/microtasksadmin.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                    <?php echo app('translator')->get('Micro Tasks'); ?>
                                </span></a>
                        </li>
                         <li><a class="waves-effect waves-dark"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/leaderboardadmin.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                    <?php echo app('translator')->get('LeaderBoard'); ?>
                                </span></a>
                        </li>
                        <li><a class="waves-effect waves-dark" href="<?php echo e(route('moder.ads.index')); ?>"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/advertising.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                    <?php echo app('translator')->get('Ads'); ?>
                                </span></a>
                        </li>


                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/referraladmin.svg')); ?>" style="pointer-events:none;"></i></i><span
                                    class="hide-menu"><?php echo app('translator')->get('Referral System'); ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('moder.referral.index')); ?>"><?php echo app('translator')->get('Levels'); ?></a></li>
                                <li><a href="<?php echo e(route('moder.referral.customize')); ?>"><?php echo app('translator')->get('Ref Page'); ?></a></li>

                            </ul>
                        </li>


                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/managecashouts.svg')); ?>" style="pointer-events:none;"></i></i><span
                                    class="hide-menu"><?php echo app('translator')->get('Withdrawals'); ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('moder.withdraw.method.index')); ?>"><?php echo app('translator')->get('Manage'); ?></a></li>
                                <li><a href="<?php echo e(route('moder.withdraw.pending')); ?>"><?php echo app('translator')->get('Pending'); ?>
                                        <?php if($pending_withdraw_count): ?>
                                            <span
                                                class="badge badge-warning pill bg-primary ml-auto p-0" style="background:#e84b3c;"><?php echo e($pending_withdraw_count); ?></span>
                                        <?php endif; ?>
                                    </a></li>

                                <li><a href="<?php echo e(route('moder.withdraw.log')); ?>"><?php echo app('translator')->get('History'); ?></a>
                                </li>

                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/accounts.svg')); ?>" style="pointer-events:none;"></i><span
                                    class="hide-menu"><?php echo app('translator')->get('Users'); ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('moder.users.all')); ?>"><?php echo app('translator')->get('Manage All'); ?>
                                    </a></li>
                                <li><a href="<?php echo e(route('moder.users.email.all')); ?>"><?php echo app('translator')->get('Email To
                                        All'); ?></a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/supportadmin.svg')); ?>" style="pointer-events:none;"></i><span
                                    class="hide-menu"><?php echo app('translator')->get('Support'); ?></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo e(route('moder.ticket.pending')); ?>"><?php echo app('translator')->get('Pending'); ?>
                                        <?php if(0 < $pending_ticket_count): ?>
                                            <span class="badge badge-info pill bg-primary ml-auto p-0">
                                                <i class="fa fa-exclamation"></i>
                                            </span>
                                        <?php endif; ?>
                                    </a></li>
                                <li><a href="<?php echo e(route('moder.ticket.index')); ?>"><?php echo app('translator')->get('All'); ?></a></li>

                        </li>

                    </ul>
                    </li>


                    <li><a class="waves-effect waves-dark" href="<?php echo e(route('moder.email.templates')); ?>"
                            aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/emailadmin.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                <?php echo app('translator')->get('Email Templates'); ?>
                            </span></a>
                    </li>
                    <li><a class="waves-effect waves-dark"  href="<?php echo e(route('moder.tools')); ?>"
                            aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/companytemplates.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                <?php echo app('translator')->get('FL Tools/TMPLT'); ?>
                            </span></a>
                    </li>
                    <li><a class="waves-effect waves-dark" href="<?php echo e(route('moder.language.manage')); ?>"
                            aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/language.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                <?php echo app('translator')->get('Language'); ?>
                            </span></a>
                    </li>
                     <li><a class="waves-effect waves-dark" href="<?php echo e(route('moder.offers.config')); ?>"
                                aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/antifraudsystem.svg')); ?>" style="pointer-events:none;"></i><span class="hide-menu">
                                    <?php echo app('translator')->get('Anti-Fraud System'); ?>
                                </span></a>
                        </li>
                    <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i><img src="<?php echo e(asset('asset/img/settingsadmin.svg')); ?>" style="pointer-events:none;"></i><span
                                class="hide-menu"><?php echo app('translator')->get('Settings'); ?></span></a>

                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(route('moder.settings.general')); ?>"><?php echo app('translator')->get('Appereance'); ?>
                                </a></li>
                            <li><a href="<?php echo e(route('moder.settings.authentication')); ?>"><?php echo app('translator')->get('Google Login'); ?>
                                </a></li>
                            <li><a href="<?php echo e(route('moder.settings.security')); ?>"><?php echo app('translator')->get('Captcha'); ?>
                                </a></li>
                            <li><a href="<?php echo e(route('moder.settings.control')); ?>"><?php echo app('translator')->get('General'); ?>
                                </a></li>
                            <li><a href="<?php echo e(route('moder.email.setting')); ?>"><?php echo app('translator')->get('Email-Sender'); ?>
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
                                <?php if (! empty(trim($__env->yieldContent('panel')))): ?>
                                    <?php echo $__env->yieldContent('panel'); ?>
                                <?php else: ?>
                                    <?php echo e($slot); ?>

                                <?php endif; ?>

                            </div>
                        </div>
                        <!-- /page content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- footer content -->

    </div>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('loader', [])->html();
} elseif ($_instance->childHasBeenRendered('eTNu5yW')) {
    $componentId = $_instance->getRenderedChildComponentId('eTNu5yW');
    $componentTag = $_instance->getRenderedChildComponentTagName('eTNu5yW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('eTNu5yW');
} else {
    $response = \Livewire\Livewire::mount('loader', []);
    $html = $response->html();
    $_instance->logRenderedChild('eTNu5yW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('modals', [])->html();
} elseif ($_instance->childHasBeenRendered('jyXlLyU')) {
    $componentId = $_instance->getRenderedChildComponentId('jyXlLyU');
    $componentTag = $_instance->getRenderedChildComponentTagName('jyXlLyU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jyXlLyU');
} else {
    $response = \Livewire\Livewire::mount('modals', []);
    $html = $response->html();
    $_instance->logRenderedChild('jyXlLyU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('toasts', [])->html();
} elseif ($_instance->childHasBeenRendered('ou5xMH5')) {
    $componentId = $_instance->getRenderedChildComponentId('ou5xMH5');
    $componentTag = $_instance->getRenderedChildComponentTagName('ou5xMH5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ou5xMH5');
} else {
    $response = \Livewire\Livewire::mount('toasts', []);
    $html = $response->html();
    $_instance->logRenderedChild('ou5xMH5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <!-- Custom Theme Scripts -->
    
    <script src="<?php echo e(asset('asset/admin/app.js')); ?>?v=2"></script>
    
    <?php if (! empty(trim($__env->yieldContent('checkbox')))): ?>
        <script src="<?php echo e(asset('asset/static/checkbox/bootstrap-toggle.min.js')); ?>"></script>
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
    <?php endif; ?>
    <script src="<?php echo e(asset('asset/static/app/js/app.js')); ?>"></script>
    <?php echo $__env->make('layouts.components.nice-editor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.components.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.components.js-notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $("[title]").tooltip();
    </script>
    <?php echo $__env->yieldPushContent('script'); ?>

</body>

</html>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/layout/primary.blade.php ENDPATH**/ ?>