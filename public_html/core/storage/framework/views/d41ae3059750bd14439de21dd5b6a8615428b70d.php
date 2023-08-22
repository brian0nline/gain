<?php $__env->startSection('title', trans('Register | Freeloot')); ?>
<?php $__env->startSection('content'); ?>

<?php if(set('enable_google_auth')): ?>
 <a href="<?php echo e(url('auth/google')); ?>">
<div class="d-grid gap-2">
    
  <button class="btn btn-primary" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;"><img src="<?php echo e(asset('asset/img/googleloginlogo.svg')); ?>" style="width:25px;"></button>
</div>
</a>
<?php endif; ?>
    <form class="account-form w-100" action="<?php echo e(route('user.register')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(session()->get('reference') != null): ?>
            <div class="form-group">
                <label for="referenceBy"><?php echo app('translator')->get('Reference By'); ?> <sup class="text-danger">*</sup></label>
                <input type="text" name="referBy" id="referenceBy" class="form-control"
                    value="<?php echo e(session()->get('reference')); ?>" readonly>
            </div>
        <?php endif; ?>
         <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="username" style="font-size:11px;"><?php echo e(__('Username')); ?></label>
                        <input id="username" type="text" class="form-control checkUser" name="username"
                            value="<?php echo e(old('username')); ?>" tabindex="1" required placeholder="<?php echo app('translator')->get('Username'); ?>">
                    </div>
                </div>
                
                <div class="col-12">
                     <div class="form-group">
                        <label for="email" style="font-size:11px;"><?php echo app('translator')->get('E-Mail Address'); ?></label>
                        <input id="email" type="email" tabindex="2" class="form-control checkUser" name="email"
                            value="<?php echo e(old('email')); ?>" required placeholder="<?php echo app('translator')->get('E-Mail Address'); ?>">
                    </div>
                </div>
                
                
                <div class="col-12">
                    <div class="form-group">
                        <label for="password" style="font-size:11px;"><?php echo app('translator')->get('Password'); ?></label>
                        <input id="password" type="password" tabindex="3" class="form-control" name="password" required
                            placeholder="<?php echo app('translator')->get('Password'); ?>">
                        <?php if($general->secure_password): ?>
                            <div class="input-popup">
                                <p class="error lower"><?php echo app('translator')->get('1 small letter minimum'); ?></p>
                                <p class="error capital"><?php echo app('translator')->get('1 capital letter minimum'); ?></p>
                                <p class="error number"><?php echo app('translator')->get('1 number minimum'); ?></p>
                                <p class="error special"><?php echo app('translator')->get('1 special character minimum'); ?></p>
                                <p class="error minimum"><?php echo app('translator')->get('6 character password'); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e(__($message)); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        <label for="password-confirm" style="font-size:11px;"><?php echo app('translator')->get('Confirm Password'); ?></label>
                        <input id="password-confirm" tabindex="4" type="password" class="form-control" name="password_confirmation" required
                            autocomplete="new-password" placeholder="<?php echo app('translator')->get('Confirm Password'); ?>">
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        <?php if($enabledCaptcha): ?>
                            <?php echo $captcha; ?>

                        <?php endif; ?>
                    </div>
                </div>
                
                 <div class="col-12">
                    <div class="form-group">
                        <input type="checkbox" checked required class="custom-form-input" />
                        <label class="custom-form-label"><?php echo app('translator')->get('Signing up you agree to the '); ?>
                            <a href="<?php echo e(route('tos')); ?>" style="text-decoration:none;color: #4aa276"><?php echo app('translator')->get('Terms of Service'); ?></a> and 
                            <a href="<?php echo e(route('policy')); ?>" style="text-decoration:none;color: #4aa276"><?php echo app('translator')->get('Privacy Policy'); ?></a>
                        </label>
                    </div>
                </div>
                
                <div class="d-grid gap-6">
                    <button type="submit" class="btn btn-primary mt-3" style="box-shadow: none;border-radius:10px;font-size:14px" disabled><?php echo app('translator')->get('Register
                                        Now'); ?></button>
             <div class="col-12 text-center">
                    <p class="text-center mt-3"><span class=""><?php echo app('translator')->get('Have an account?'); ?></span> <a
                            href="<?php echo e(route('user.login')); ?>" class="text-base"style="text-decoration:none;color: #4aa276"><?php echo app('translator')->get('Login here'); ?></a></p>
                </div>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title" id="existModalLongTitle" style="color: #e84b3c !important;"><?php echo app('translator')->get('Warning'); ?></h5>
                   
                </div>
                <div class="modal-body">
                    <h6><?php echo app('translator')->get('You already have an account please Sign in '); ?></h6>
                </div>
                <div class="modal-footer"  style="border-top: 2px solid #242B27;">
                   
                    <a href="<?php echo e(route('user.login')); ?>" class="btn btn-primary" style="background: #4aa276;border-color:#4aa276;box-shadow:none;"><?php echo app('translator')->get('Login'); ?></a>
                </div>
            </div>
        </div>
    </div>
    </div>

        
       
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .login_wrapper {
            max-width: 720px;
        }
        
   </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <?php if($general->secure_password): ?>
        <script src="<?php echo e(asset('asset/static/app/js/secure_password.js')); ?>"></script>
    <?php endif; ?>
    <script>
        "use strict";

        (function($) {

            <?php if($general->secure_password): ?>
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });
            <?php endif; ?>

            $('.checkUser').on('focusout', function(e) {
                var url = '<?php echo e(route('user.checkUser')); ?>';
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';

                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response['data'] && response['type'] == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response['data'] != null) {
                        $(`.${response['type']}Exist`).text(`${response['type']} already exist`);
                    } else {
                        $(`.${response['type']}Exist`).text('');
                    }
                });
            });

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/user/auth/register.blade.php ENDPATH**/ ?>