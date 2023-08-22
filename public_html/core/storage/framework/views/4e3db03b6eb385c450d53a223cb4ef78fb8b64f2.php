<?php $__env->startSection('content'); ?>
    <form class="account-form" method="POST" action="<?php echo e(route('user.password.email')); ?>">
        <?php echo csrf_field(); ?>
        <div class="panel">
        <div class="form-group">
            <label style="font-size:11px;"><?php echo app('translator')->get('Select One'); ?></label>
            <select class="form-control" name="type">
                <option value="email" style="font-size:11px;"><?php echo app('translator')->get('E-Mail Address'); ?></option>
                <option value="username" style="font-size:11px;"><?php echo app('translator')->get('Username'); ?></option>
            </select>
        </div>
        <div class="form-group">
            <label class="my_value" style="font-size:11px;"></label>
            <input type="text" class="form-control <?php $__errorArgs = ['value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="value"
                   value="<?php echo e(old('value')); ?>" required autofocus="off">
        </div>

        <button type="submit" class="btn btn-secondary w-100" style="background:#4aa276;border-color:#4aa276;box-shadow:none;margin-top:10px;"><?php echo app('translator')->get('Send Password Code'); ?></button>

       
    </form>
    </div>

    <script>
        (function ($) {
            "use strict";

            myVal();
            $('select[name=type]').on('change', function () {
                myVal();
            });

            function myVal() {
                $('.my_value').text($('select[name=type] :selected').text());
            }
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/auth/passwords/email.blade.php ENDPATH**/ ?>