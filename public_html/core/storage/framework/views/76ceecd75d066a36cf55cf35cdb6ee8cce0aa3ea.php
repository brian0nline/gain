<?php $__env->startSection('panel'); ?>
    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius-10 ">
                <div class="card-body p-0">

                    <div class="table-responsive-sm table-responsive">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('User'); ?></th>
                                    <th><?php echo app('translator')->get('Login at'); ?></th>
                                    <th><?php echo app('translator')->get('IP'); ?></th>
                                    <th><?php echo app('translator')->get('Location'); ?></th>
                                    <th><?php echo app('translator')->get('Browser | OS'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $login_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>

                                        <td data-label="<?php echo app('translator')->get('User'); ?>">
                                            <span class="font-weight-bold"><?php echo e(@$log->user->fullname); ?></span>
                                            <br>
                                            <span class="small"> <a
                                                    href="<?php echo e(route('moder.users.detail', $log->user_id)); ?>"><span>@</span><?php echo e(@$log->user->username); ?></a>
                                            </span>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Login at'); ?>">
                                            <?php echo e(showDateTime($log->created_at)); ?> <br>
                                            <?php echo e(diffForHumans($log->created_at)); ?>

                                        </td>

                                        <td data-label="<?php echo app('translator')->get('IP'); ?>">
                                            <span class="font-weight-bold">
                                                <?php echo e($log->user_ip); ?>

                                            </span>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Location'); ?>"><?php echo e(__($log->city)); ?> <br>
                                            <?php echo e(__($log->country)); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Browser | OS'); ?>">
                                            <?php echo e(__($log->browser)); ?> <br> <?php echo e(__($log->os)); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    <?php echo e(paginateLinks($login_logs)); ?>

                </div>
            </div><!-- card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/users/logins.blade.php ENDPATH**/ ?>