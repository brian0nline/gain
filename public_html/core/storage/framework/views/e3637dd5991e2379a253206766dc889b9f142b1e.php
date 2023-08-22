<head>
    <title> Authorization | Freeloot</title>
</head>


<?php $__env->startSection('2FA | Freeloot'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-md-2 d-none d-md-block"></div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('user.go2fa.verify')); ?>" method="POST" class="login-form">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <p class="text-center"><?php echo app('translator')->get('Current Time'); ?>: <?php echo e(\Carbon\Carbon::now()); ?></p>
                        </div>
                        <div class="form-group" style="margin-top:25px;">
                            <label style="font-size:11px;"><?php echo app('translator')->get('2FA Code'); ?></label>
                            <input type="text" name="code" id="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="d-grid gap-6">
                                <button type="submit" class="btn btn-primary" style="box-shadow: none;font-size:14px;border-radius:10px;"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 d-none d-md-block"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('#code').on('input change', function() {
                var xx = document.getElementById('code').value;

                $(this).val(function(index, value) {
                    value = value.substr(0, 7);
                    return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
                });

            });
        })(jQuery)
    </script>
   
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/auth/authorization/2fa.blade.php ENDPATH**/ ?>