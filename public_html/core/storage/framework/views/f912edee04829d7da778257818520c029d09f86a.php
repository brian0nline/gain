<?php $__env->startSection('title', 'Confirm Account | Freeloot'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-md-2 d-none d-md-block"></div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('user.verify.email')); ?>" method="POST" class="login-form">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <p class="text-center"><?php echo app('translator')->get('Your Email'); ?>: <strong><?php echo e(auth()->user()->email); ?></strong>
                            </p>
                        </div>


                        <div class="form-group" style="margin-top:50px;">
                            <label style="font-size:11px;"><?php echo app('translator')->get('Verification Code'); ?></label>
                            <input type="text" name="email_verified_code" class="form-control" maxlength="7" id="code">
                        </div>


                        <div class="form-group">
                            <div class="d-grid gap-6">
                                <button type="submit" class="btn btn-primary" style="box-shadow: none;border-radius:10px;"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>


                        <div class="form-group text-center" style="margin-top:15px;">
                            <p style="font-size:11px;"><?php echo app('translator')->get('Please check including your Junk/Spam Folder. if not found, you can'); ?> <a href="<?php echo e(route('user.send.verify.code')); ?>?type=email"
                                    class="forget-pass">
                                    <?php echo app('translator')->get('Resend code'); ?></a></p>
                            <?php if($errors->has('resend')): ?>
                                <br />
                                <small style="text-decoration:none;color:#4aa276;"><?php echo e($errors->first('resend')); ?></small>
                            <?php endif; ?>
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

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/auth/authorization/email.blade.php ENDPATH**/ ?>