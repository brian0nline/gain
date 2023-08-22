
    <div class="container card pt-100 pb-100" style="border-radius:10px;">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">

                <div class="card " style="border:none" >
                    
                    <div class="card-body">

                        <form action="<?php echo e(route('user.change.password')); ?>" method="post" class="register">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="password" style="margin-left: 10px;font-size:14px;"><?php echo app('translator')->get('Current Password'); ?></label>
                                <input id="password" type="password" class="form-control" name="current_password" required
                                    autocomplete="current-password" placeholder="<?php echo app('translator')->get('Current Password'); ?>">
                            </div>
                            <div class="form-group hover-input-popup">
                                <label for="password" style="margin-left: 10px;font-size:14px;"><?php echo app('translator')->get('Password'); ?></label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="current-password" placeholder="<?php echo app('translator')->get('Password'); ?>">
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
                                <label for="confirm_password" style="margin-left: 10px;font-size:14px;"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="current-password"
                                    placeholder="<?php echo app('translator')->get('Confirm Password'); ?>">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="mt-4 btn btn-primary" style="box-shadow: none;font-size:14px;" value="<?php echo app('translator')->get('Update'); ?>" disabled>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('asset/static/app/js/secure_password.js')); ?>"></script>

    <script>
        (function($) {
            "use strict";
            <?php if($general->secure_password): ?>
                $('input[name=password]').on('input', function () {
                secure_password($(this));
                });
            <?php endif; ?>
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/user/password.blade.php ENDPATH**/ ?>