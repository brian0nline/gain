
<?php $__currentLoopData = session('notify') ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        (function($){
        "use strict";
    console.log('a')
        toastr.<?php echo e($msg[0]); ?>('<?php echo e(__($msg[1])); ?>');
    })(jQuery);
    </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    ?>

    <script>
         (function($){
        "use strict";
        <?php $__currentLoopData = $errors ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error('<?php echo e(__($error)); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    })(jQuery);
    </script>

<script>
    "use strict";
    function notify(status, message) {
        toastr[status](message);
    }
</script>
<?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/layouts/components/js-notify.blade.php ENDPATH**/ ?>