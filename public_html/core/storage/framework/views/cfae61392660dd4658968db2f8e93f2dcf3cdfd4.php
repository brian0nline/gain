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
                                    <th><?php echo app('translator')->get('Trx'); ?></th>
                                    <th><?php echo app('translator')->get('Transacted'); ?></th>
                                    <th><?php echo app('translator')->get('Amount'); ?></th>
                                    <th><?php echo app('translator')->get('Post Balance'); ?></th>
                                    <th><?php echo app('translator')->get('Detail'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('User'); ?>">
                                            <span class="font-weight-bold"><?php echo e(@$trx->user->fullname); ?></span>
                                            <br>
                                            <span class="small"> <a
                                                    href="<?php echo e(route('moder.users.detail', $trx->user_id)); ?>"><span>@</span><?php echo e(@$trx->user->username); ?></a>
                                            </span>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Trx'); ?>">
                                            <strong><?php echo e($trx->trx); ?></strong>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Transacted'); ?>">
                                            <?php echo e(showDateTime($trx->created_at)); ?><br><?php echo e(diffForHumans($trx->created_at)); ?>

                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Amount'); ?>" class="budget">
                                            <span
                                                class="font-weight-bold <?php if($trx->trx_type == '+'): ?> text-success <?php else: ?> text-danger <?php endif; ?>">
                                                <?php echo e($trx->trx_type); ?> <?php echo e(showAmount($trx->amount)); ?>

                                                <?php echo e($general->cur_text); ?>

                                            </span>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Post Balance'); ?>" class="budget">
                                            <?php echo e(showAmount($trx->post_balance)); ?> <?php echo e(__($general->cur_text)); ?>

                                        </td>


                                        <td data-label="<?php echo app('translator')->get('Detail'); ?>"><?php echo e(__($trx->details)); ?></td>
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
                    <?php echo e(paginateLinks($transactions)); ?>

                </div>
            </div><!-- card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/admin/reports/transactions.blade.php ENDPATH**/ ?>