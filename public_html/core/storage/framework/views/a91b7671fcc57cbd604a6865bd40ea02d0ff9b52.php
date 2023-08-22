<?php $__env->startSection('title', trans('Login | Freeloot')); ?>
<?php $__env->startSection('content'); ?>


<?php if(session()->has('notify')): ?>
    <?php $__currentLoopData = session('notify'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php 
        $alert_type = $msg[0];
    ?>
        <div class="alert alert-danger alert-dismissible fade show">
          <?php echo e($msg[1]); ?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" style="box-shadow:none;"></button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php if(set('enable_google_auth')): ?>
  <a href="<?php echo e(url('auth/google')); ?>">
<div class="d-grid gap-6">
    
  <button class="btn btn-primary" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;"><img src="<?php echo e(asset('asset/img/googleloginlogo.svg')); ?>" style="width:25px;"></button>
</div>
</a>

<?php endif; ?>

<form class="account-form" method="POST" action="<?php echo e(route('user.login')); ?>" onsubmit="return submitUserForm();">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label style="font-size:11px;"><?php echo app('translator')->get('Email'); ?> <sup class="text-danger">*</sup></label>
        <input type="text" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo app('translator')->get('Email'); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label  style="font-size:11px;"><?php echo e(__('Password')); ?> <sup class="text-danger">*</sup></label>
        <input id="password" type="password" class="form-control" placeholder="<?php echo app('translator')->get('Enter your password'); ?>" name="password" required>
    </div>

    <div class="form-group">
        <?php if($enabledCaptcha): ?>
        <?php echo $captcha; ?>

        <?php endif; ?>
    </div>

   
    <div class="form-group text-end">
        <a href="<?php echo e(route('user.password.request')); ?>" class="text-drak" style="text-decoration:none;color: #4aa276"><?php echo app('translator')->get('Forgot Password?'); ?></a>
    </div>
    
    <div class="d-grid gap-6">
        <button type="submit" class="btn btn-primary" style="box-shadow: none;font-size:14px;border-radius:10px;"><?php echo app('translator')->get('Login Now'); ?></button>
    </div>
    <p class="text-center mt-3"><span class=""><?php echo app('translator')->get('New to'); ?> Freeloot?</span>
        <a href="<?php echo e(route('user.register')); ?>" class="text-base"style="text-decoration:none;color: #4aa276"><?php echo app('translator')->get('Register here'); ?></a>
    </p>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/auth/login.blade.php ENDPATH**/ ?>