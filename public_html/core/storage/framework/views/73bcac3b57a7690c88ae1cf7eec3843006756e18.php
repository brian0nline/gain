<?php $__env->startSection('title', __('Referrals History')); ?>
<?php $__env->startSection('content'); ?>
    <section class="pt-100 pb-100">
        <div class="container card">
            <div class="row justify-content-center mt-2">
                <?php for($i = 1; $i <= $lev; $i++): ?>
                    <div class="col-md-2 col-sm-4 col-6 pb-3">
                        <a href="
                            <?php if(request()->url() == route('user.referred', $i, auth()->user()->id || ($firstActive == 1 && $i == 1))): ?>
                            javascript:void(0)
<?php else: ?>
                        <?php echo e(route('user.referred', $i)); ?>

                        <?php endif; ?>
                            "
                           class="btn btn-primary w-100 btn-block mb-3 text-center <?php if(request()->url() == route('user.referred', $i, auth()->user()->id) || ($firstActive == 1 && $i == 1)): ?> btn-disabled <?php endif; ?>"><?php echo app('translator')->get('Level
                            '.$i); ?></a>
                    </div>
                <?php endfor; ?>
                <div class="col-md-12">
                    <table class="table table-responsive-md custom-table">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('SL'); ?></th>
                            <th><?php echo app('translator')->get('Full Name'); ?></th>
                            <th><?php echo app('translator')->get('User Name'); ?></th>
                            <th><?php echo app('translator')->get('Email'); ?></th>
                            <th><?php echo app('translator')->get('Mobile'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('SL'); ?>"><?php echo e($loop->iteration); ?></td>
                                <td data-label="<?php echo app('translator')->get('Fullname'); ?>"><?php echo e(__($user->fullname)); ?></td>
                                <td data-label="<?php echo app('translator')->get('Username'); ?>"><?php echo e(__($user->username)); ?></td>
                                <td data-label="<?php echo app('translator')->get('Email'); ?>"><?php echo e(showDateTime($user->created_at)); ?></td>
                                <td data-label="<?php echo app('translator')->get('Mobile'); ?>"><?php echo e(__($user->mobile)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="100%" class="text-center"><?php echo app('translator')->get('Data not found'); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <?php echo e($users->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style type="text/css">
        .copytextDiv {
            border: 1px solid rgba(255, 255, 255, 0.15);
            cursor: pointer;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/referred.blade.php ENDPATH**/ ?>