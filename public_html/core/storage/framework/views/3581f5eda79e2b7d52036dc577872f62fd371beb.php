<?php $__env->startSection('content'); ?>

    <form class="account-form" method="POST" action="<?php echo e(route('user.password.verify.code')); ?>">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="email" value="<?php echo e($email); ?>">
<div class="panel">
        <div class="form-group">
            <label><?php echo app('translator')->get('Verification Code'); ?></label>
            <input type="text" name="code" id="code" class="form-control">
        </div>

        <button type="submit" class="btn btn-base w-100" style="background:#4aa276;border-color:#4aa276;box-shadow:none;color:#fff;border-radius:10px;"><?php echo app('translator')->get('Verify Code'); ?> <i class="fas fa-sign-in-alt"></i>
        </button>
        <p class="text-center mt-3"><span class="text-white" style="margin-top:30px;"><?php echo app('translator')->get('Please check including your Junk/Spam Folder.
                        if not found, you can'); ?></span>
            <a href="<?php echo e(route('user.password.request')); ?>"  style="text-decoration:none;color:#4aa276;"><?php echo app('translator')->get('Try to send again'); ?></a>
        </p>
    </form>
    </div>

    <script>
        (function ($) {
            "use strict";
            $('#code').on('input change', function () {
                var xx = document.getElementById('code').value;
                $(this).val(function (index, value) {
                    value = value.substr(0, 7);
                    return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
                });
            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/auth/passwords/code_verify.blade.php ENDPATH**/ ?>