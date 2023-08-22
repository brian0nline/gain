<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive-sm table-responsive">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('SL'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Fullname'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Email'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Phone'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Joined At'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('SL'); ?>">
                                            <?php echo e($loop->iteration); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Fullname'); ?>"><?php echo e(__($referral->fullname)); ?>

                                        <td data-label="<?php echo app('translator')->get('Email'); ?>"><?php echo e(__($referral->email)); ?>

                                        <td data-label="<?php echo app('translator')->get('Phone'); ?>"><?php echo e(__($referral->mobile)); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Joined At'); ?>"><?php echo e(showDateTime($referral->created_at)); ?></td>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo app('translator')->get('User Not Found'); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    <?php echo e($referrals->links('admin.partials.paginate')); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/admin/users/referral.blade.php ENDPATH**/ ?>