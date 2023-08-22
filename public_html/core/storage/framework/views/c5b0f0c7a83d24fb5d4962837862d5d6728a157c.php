<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius-10 ">
                <div class="card-body p-0">
                    <a href="<?php echo e(route('moder.users.detail', $user->id)); ?>" class="btn btn-info" style="box-shadow:none;background:#4aa276;border-color:#4aa276;border-top-right-radius:0px;border-top-left-radius:10px;border-bottom-left-radius:0px"><i
                            class="fas fa-user"></i> <?php echo e($user->fullname); ?></a>

                    <div class="table-responsive-sm table-responsive">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('User'); ?></th>
                                    <th><?php echo app('translator')->get('Sent'); ?></th>
                                    <th><?php echo app('translator')->get('Mail Sender'); ?></th>
                                    <th><?php echo app('translator')->get('Subject'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('User'); ?>">
                                            <span class="font-weight-bold"><?php echo e($log->user->fullname); ?></span>
                                            <br>
                                            <span class="small">
                                                <a
                                                    href="<?php echo e(route('moder.users.detail', $log->user_id)); ?>"><span>@</span><?php echo e($log->user->username); ?></a>
                                            </span>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Sent'); ?>">
                                            <?php echo e(showDateTime($log->created_at)); ?>

                                            <br>
                                            <?php echo e($log->created_at->diffForHumans()); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Mail Sender'); ?>">
                                            <span class="font-weight-bold"><?php echo e(__($log->mail_sender)); ?></span>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Subject'); ?>"><?php echo e(__($log->subject)); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="<?php echo e(route('moder.users.email.details', $log->id)); ?>"
                                               <i><img src="<?php echo e(asset('asset/img/desktop.svg')); ?>"></i></a>
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
                    <?php echo e(paginateLinks($logs)); ?>

                </div>
            </div><!-- card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/admin/users/email_log.blade.php ENDPATH**/ ?>