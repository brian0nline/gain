<?php $__env->startSection('content'); ?>
    <form class="account-form" method="POST" action="<?php echo e(route('user.password.update')); ?>">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="email" value="<?php echo e($email); ?>">
        <input type="hidden" name="token" value="<?php echo e($token); ?>">
<div class="panel">
        <div class="account-thumb-area text-center">
            <h3 class="title"><?php echo app('translator')->get('Reset Password'); ?></h3>
        </div>

        <div class="form-group hover-input-popup">
            <label for="password" style="font-size:11px;"><?php echo app('translator')->get('Password'); ?></label>
            <input id="password" type="password" class="form-control" name="password" required>
            <?php if($general->secure_password): ?>
                <div class="input-popup">
                    <p class="error lower"><?php echo app('translator')->get('1 small letter minimum'); ?></p>
                    <p class="error capital"><?php echo app('translator')->get('1 capital letter minimum'); ?></p>
                    <p class="error number"><?php echo app('translator')->get('1 number minimum'); ?></p>
                    <p class="error special"><?php echo app('translator')->get('1 special character minimum'); ?></p>
                    <p class="error minimum"><?php echo app('translator')->get('6 character password'); ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="form-group">
            <label for="password-confirm" style="font-size:11px;"><?php echo app('translator')->get('Confirm Password'); ?></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary w-100" style="border-radius:10px;box-shadow:none;margin-top:15px;"><?php echo app('translator')->get('Reset Password'); ?></button>
    </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('asset/template/dash/secure_password.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            <?php if($general->secure_password): ?>
            $('input[name=password]').on('input', function () {
                secure_password($(this));
            });
            <?php endif; ?>
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/user/auth/passwords/reset.blade.php ENDPATH**/ ?>