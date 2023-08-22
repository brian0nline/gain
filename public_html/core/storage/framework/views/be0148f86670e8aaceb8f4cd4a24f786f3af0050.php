<div class="preloader">
<img src="<?php echo e(asset('asset/img/preloader.svg')); ?>"> 
</div>
<nav class="main-navbar container-fluid">
        <div class="main-navbar-container" id="logo-main-container">
        <!--<?php if(!in_array(Route::currentRouteName(), ['user.home','user.withdraw','user.withdraw.history','user.offer.reports','user.commissions','user.referred','user.profile.setting','user.twofactor','user.change.password','ticket'])): ?>-->
            <?php if(!auth()->check()): ?>
                <a  href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('asset/img/gainifylg.svg')); ?>" style="width:250px;">
                </a>
            <?php else: ?>
                <?php if(in_array(Route::currentRouteName(), ['welcome'])): ?>
                   <a  href="<?php echo e(url('/')); ?>" class="logohomeone" style="display:block">
                    <img src="<?php echo e(asset('asset/img/gainifylg.svg')); ?>">
                </a>
                <a  href="<?php echo e(url('/')); ?>" class="logohometwo" style="display:none">
                    <img src="<?php echo e(asset('asset/img/gainifylg.svg')); ?>">
                </a>
                <?php endif; ?>
            <?php endif; ?>
        <!--<?php endif; ?>-->
            
        <?php if(auth()->guard()->guest()): ?>
            <div class="main-nav-buttons" >
                
                
                 <a  href="<?php echo e(route('user.login')); ?>" style="text-decoration:none;">
             <button class="btn btn-primary nav-link register-btn" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;width:150px;height:35px;color:#fff;text-decoration:none;margin-right:10px;letter-spacing:3px;background: #1F5370;border-color: #1F5370;"><i class="fa-solid fa-user-group"></i> Login</button>
           </a>
             <a  href="<?php echo e(route('user.register')); ?>" style="text-decoration:none;">
             <button class="btn btn-primary nav-link login-btn" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;height:35px;color:#fff;text-decoration:none;letter-spacing:3px;background: #1F5370;border-color: #1F5370;"><i class="fa-solid fa-user-plus"></i>Sign up</button>
           </a>
           
            </div>
        <?php else: ?>
        <div style="margin-top: 35px"></div>
            <?php if(Route::currentRouteName() == 'welcome'): ?>
            <a  href="<?php echo e(route('user.home')); ?>" style="text-decoration:none;margin-right:10px;">
             <button class="btn btn-primary nav-link login-btn text-center" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;width:160px;height:40px;color:#fff;text-decoration:none;letter-spacing:3px;background: #1F5370;border-color: #1F5370;">Dashboard</button>
           </a>
           <?php endif; ?>
        <?php endif; ?>
        </div>
    </div>
</nav>
<div id="last_offers">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('live-state')->html();
} elseif ($_instance->childHasBeenRendered('6kqYy3d')) {
    $componentId = $_instance->getRenderedChildComponentId('6kqYy3d');
    $componentTag = $_instance->getRenderedChildComponentTagName('6kqYy3d');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6kqYy3d');
} else {
    $response = \Livewire\Livewire::mount('live-state');
    $html = $response->html();
    $_instance->logRenderedChild('6kqYy3d', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<div id="chat">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('live-chat')->html();
} elseif ($_instance->childHasBeenRendered('k1joLKy')) {
    $componentId = $_instance->getRenderedChildComponentId('k1joLKy');
    $componentTag = $_instance->getRenderedChildComponentTagName('k1joLKy');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('k1joLKy');
} else {
    $response = \Livewire\Livewire::mount('live-chat');
    $html = $response->html();
    $_instance->logRenderedChild('k1joLKy', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>

<?php /**PATH E:\laragon\www\gainify\core\resources\views/layouts/frontend/partial/header.blade.php ENDPATH**/ ?>