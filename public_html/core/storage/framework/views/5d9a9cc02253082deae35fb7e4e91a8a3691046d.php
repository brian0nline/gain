<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-md-2 d-none d-md-block"></div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('user.verify.sms')); ?>" method="POST" class="login-form">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <p class="text-center"><?php echo app('translator')->get('Your Mobile Number'); ?>:
                                <strong><?php echo e(auth()->user()->mobile); ?></strong>
                            </p>
                        </div>


                        <div class="form-group">
                            <label><?php echo app('translator')->get('Verification Code'); ?></label>
                            <input type="text" name="sms_verified_code" id="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="btn-area text-center">
                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <p><?php echo app('translator')->get('If you don\'t get any code'); ?>, <a href="<?php echo e(route('user.send.verify.code')); ?>?type=phone"
                                    class="forget-pass">
                                    <?php echo app('translator')->get('Try again'); ?></a></p>
                            <?php if($errors->has('resend')): ?>
                                <br />
                                <small class="text-danger"><?php echo e($errors->first('resend')); ?></small>
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

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/auth/authorization/sms.blade.php ENDPATH**/ ?>