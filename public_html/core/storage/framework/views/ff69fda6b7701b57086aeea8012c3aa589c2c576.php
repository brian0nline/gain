<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius-10 ">

                <div class="card-body">
                    <?php if(request()->routeIs('admin.users.transactions')): ?>
                        <form action="" method="GET" class="form-inline float-sm-right ">
                            <div class="input-group has_append">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('TRX / Username'); ?>"
                                    value="<?php echo e($search ?? ''); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('moder.report.commissions.search')); ?>" method="GET"
                            class="form-inline float-sm-right  mb-3">
                            <div class="input-group has_append">
                                <input type="text" name="search" class="form-control"
                                    placeholder="<?php echo app('translator')->get('TRX / Username'); ?>" value="<?php echo e($search ?? ''); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                    <div class="table-responsive-sm table-responsive">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('Date'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Description'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Type'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Transaction'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Level'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Percent'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('After balance'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr <?php if($data->amount < 0): ?> class="halka-golapi" <?php endif; ?>>
                                        <td data-label="<?php echo app('translator')->get('Date'); ?>"><?php echo e(showDateTime($data->created_at)); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Description'); ?>"><?php echo e(__($data->title)); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Type'); ?>">
                                            <?php if($data->type == 'deposit'): ?>
                                                <span class="badge badge--success"><?php echo app('translator')->get('Deposit'); ?></span>
                                            <?php elseif($data->type == 'interest'): ?>
                                                <span class="badge badge--info"><?php echo app('translator')->get('Interest'); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge--primary"><?php echo app('translator')->get('Invest'); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Transaction'); ?>"><?php echo e(__($data->trx)); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Level'); ?>"><?php echo e(__(ordinal($data->level))); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Percent'); ?>"><?php echo e(getAmount($data->percent)); ?> %</td>
                                        <td data-label="<?php echo app('translator')->get('Amount'); ?>"><span
                                                class="font-weight-bold"><?php echo e(__($general->cur_sym)); ?>

                                                <?php echo e(getAmount($data->commission_amount)); ?></span></td>
                                        <td data-label="<?php echo app('translator')->get('After balance'); ?>"><?php echo e(__($general->cur_sym)); ?>

                                            <?php echo e(getAmount($data->main_amo)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e(trans($empty_message)); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    <?php echo e($logs->links('admin.partials.paginate')); ?>

                </div>
            </div><!-- card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="mb-3">

        <a href="

        <?php if(request()->routeIs('admin.users.commissions.deposit')): ?> javascript:void(0)
    <?php else: ?>
    <?php echo e(route('moder.users.commissions.deposit', $user->id)); ?> <?php endif; ?>

        " class="btn btn-primary mb-3
    <?php if(request()->routeIs('admin.users.commissions.deposit')): ?> btn-disabled <?php endif; ?>
    "><?php echo app('translator')->get('Deposit
            Commission'); ?></a>


        <a href="

        <?php if(request()->routeIs('admin.users.commissions.buy')): ?> javascript:void(0)
    <?php else: ?>
    <?php echo e(route('moder.users.commissions.buy', $user->id)); ?> <?php endif; ?>

        " class="btn btn-primary mb-3

    <?php if(request()->routeIs('admin.users.commissions.buy')): ?> btn-disabled <?php endif; ?>

    "><?php echo app('translator')->get('Buy Lottery
            Commission'); ?></a>


        <a href="

        <?php if(request()->routeIs('admin.users.commissions.win')): ?> javascript:void(0)
    <?php else: ?>
    <?php echo e(route('moder.users.commissions.win', $user->id)); ?> <?php endif; ?>

        " class="btn btn-primary mb-3 mr-2

    <?php if(request()->routeIs('admin.users.commissions.win')): ?> btn-disabled <?php endif; ?>

    "><?php echo app('translator')->get('Win
            Lottery Commission'); ?></a>
    </div>
    <div>

    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/users/commission-log.blade.php ENDPATH**/ ?>