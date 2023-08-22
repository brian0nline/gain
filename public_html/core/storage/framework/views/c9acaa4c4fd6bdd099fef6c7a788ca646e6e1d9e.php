<?php $__env->startSection('title', __('Support | Freeloot')); ?>

<?php $__env->startSection('content'); ?>
    <div class="card pt-100 pb-100">
        <div class="card-header">
            <h4 class="card-title"><?php echo app('translator')->get('Contact Us'); ?></h4>
        </div>
        <div class="card-body">
            <div class="text-end mb-3">
                <a href="<?php echo e(route('ticket.open')); ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('New Ticket'); ?>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 overflow-auto">
                    <table class="table table-bordered table-hover table-striped">
                        <thead >
                        <tr>
                            <th><?php echo app('translator')->get('Subject'); ?></th>
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <th><?php echo app('translator')->get('Priority'); ?></th>
                            <th><?php echo app('translator')->get('Last Reply'); ?></th>
                            <th><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Subject'); ?>"><a href="<?php echo e(route('ticket.view', $support->ticket)); ?>"
                                                                     class="font-weight-bold">
                                        <?php echo app('translator')->get('Ticket'); ?>
                                        <?php echo e(__($support->subject)); ?> </a></td>
                                <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                    <?php if($support->status == 0): ?>
                                        <span class="badge badge-success py-2 px-3"><?php echo app('translator')->get('Open'); ?></span>
                                    <?php elseif($support->status == 1): ?>
                                        <span class="badge badge-primary py-2 px-3"><?php echo app('translator')->get('Answered'); ?></span>
                                    <?php elseif($support->status == 2): ?>
                                        <span class="badge badge-warning py-2 px-3"><?php echo app('translator')->get('Customer Reply'); ?></span>
                                    <?php elseif($support->status == 3): ?>
                                        <span class="badge badge-dark py-2 px-3"><?php echo app('translator')->get('Closed'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Priority'); ?>">
                                    <?php if($support->priority == 1): ?>
                                        <span class="badge badge-dark py-2 px-3"><?php echo app('translator')->get('Low'); ?></span>
                                    <?php elseif($support->priority == 2): ?>
                                        <span class="badge badge-success py-2 px-3"><?php echo app('translator')->get('Medium'); ?></span>
                                    <?php elseif($support->priority == 3): ?>
                                        <span class="badge badge-primary py-2 px-3"><?php echo app('translator')->get('High'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Last Reply'); ?>">
                                    <?php echo e(\Carbon\Carbon::parse($support->last_reply)->diffForHumans()); ?> </td>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <a href="<?php echo e(route('ticket.view', $support->ticket)); ?>"
                                       class="btn btn-primary btn-sm">
                                        <i class="fa fa-file" title="<?php echo e(__('Read')); ?>"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="100%" class="text-center"> <?php echo app('translator')->get('No results found'); ?>!</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <?php echo e($supports->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/support/index.blade.php ENDPATH**/ ?>