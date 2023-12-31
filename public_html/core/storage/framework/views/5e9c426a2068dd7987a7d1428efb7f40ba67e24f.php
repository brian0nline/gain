<?php $__env->startSection('title', __('Cashout Requests | Freeloot')); ?>
<?php $__env->startSection('page-title', __('Cashout Methods | Freeloot')); ?>
<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start" style="margin-top:10px;"><?php echo app('translator')->get('Manage Cashouts Requests'); ?></h4>
        </div>
        
        <div class="card-body">
            <div class="row justify-content-center">
                <?php if(request()->routeIs('moder.withdraw.log') || request()->routeIs('moder.withdraw.method') || request()->routeIs('moder.users.withdrawals') || request()->routeIs('moder.users.withdrawals.method')): ?>
                    <div class="col-xl-4 col-sm-6 mb-30">
                        <div class="card box-shadow2 b-radius-5 bg-success">
                            <div class="text-center">
                                <h2 class="text-white"style="margin-top: 7px;word-spacing:10px;">
                                    <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i><?php echo e($withdrawals->where('status', 1)->sum('amount')); ?></h2>
                                <p class="text-white"><?php echo app('translator')->get('Approved Withdrawals'); ?></p>
                            </div>
                        </div>
                        <!- card bg-dark end ->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30">
                        <div class="card" style="background: #fcc109;border-color: #fcc109;">
                            <div class="text-center">
                                <h2 class="text-white" style="margin-top: 7px;">
                                    <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i><?php echo e($withdrawals->where('status', 2)->sum('amount')); ?></h2>
                                <p class="text-white"><?php echo app('translator')->get('Pending Withdrawals'); ?></p>
                            </div>
                        </div>
                        <!- card bg-dark end ->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30">
                        <div class="card" style="background: #e84b3c;border-color: #e84b3c;">
                            <div class="text-center" >
                                <h2 class="text-white" style="margin-top: 7px;">
                                    <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i><?php echo e($withdrawals->where('status', 3)->sum('amount')); ?></h2>
                                <p class="text-white"><?php echo app('translator')->get('Rejected Withdrawals'); ?></p>
                            </div>
                        </div>
                        <!- card bg-dark end ->
                    </div>
                <?php endif; ?>
                <div class="col-lg-12">
                    <div class="card b-radius-10 ">
                        <div class="card-body p-0">
                            <?php if(!request()->routeIs('moder.users.withdrawals') && !request()->routeIs('moder.users.withdrawals.method')): ?>
                            <?php endif; ?>
                            <div class="overflow-auto">
                                <table class="table custom-table">
                                    <thead>
                                    <tr>
                                        
                                        <th><?php echo app('translator')->get('Initiated'); ?></th>
                                        <th><?php echo app('translator')->get('User'); ?></th>
                                        <th><?php echo app('translator')->get('Amount'); ?></th>
                                        <th><?php echo app('translator')->get('Conversion'); ?></th>
                                        <th><?php echo app('translator')->get('Status'); ?></th>
                                        <th><?php echo app('translator')->get('Action'); ?></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php
                                            $details = $withdraw->withdraw_information != null ? json_encode($withdraw->withdraw_information) : null
                                        ?>
                                        <tr>
                                         
                                            <td data-label="<?php echo app('translator')->get('Initiated'); ?>">
                                                <?php echo e(showDateTime($withdraw->created_at)); ?> <br>
                                                <?php echo e(diffForHumans($withdraw->created_at)); ?>

                                            </td>

                                            <td data-label="<?php echo app('translator')->get('User'); ?>">
                                                <span class="font-weight-bold"><?php echo e(@$withdraw->user->fullname); ?></span>
                                                <br>
                                                <span class="small"> <a
                                                        href="<?php echo e(route('moder.users.detail', $withdraw->user_id)); ?>"><span>@</span><?php echo e(@$withdraw->user->username); ?></a>
                                            </span>
                                            </td>


                                            <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                                <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i><?php echo e(showAmount($withdraw->amount)); ?> - <span
                                                    class="text-danger" data-toggle="tooltip"
                                                    data-original-title="<?php echo app('translator')->get('charge'); ?>"><?php echo e(showAmount($withdraw->charge)); ?>

                                            </span>
                                                <br>
                                                <strong data-toggle="tooltip"
                                                        data-original-title="<?php echo app('translator')->get('Amount after charge'); ?>">
                                                    <?php echo e(showAmount($withdraw->amount - $withdraw->charge)); ?>

                                                    <?php echo e(__($general->cur_text)); ?>

                                                </strong>

                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Conversion'); ?>">
                                                1 <?php echo e(__($general->cur_text)); ?> = <?php echo e(showAmount($withdraw->rate)); ?>

                                                <?php echo e(__($withdraw->currency)); ?>

                                                <br>
                                                <strong><?php echo e(showAmount($withdraw->final_amount)); ?>

                                                    <?php echo e(__($withdraw->currency)); ?></strong>
                                            </td>


                                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                <?php if($withdraw->status == 2): ?>
                                                    <span
                                                        class="text-small badge font-weight-normal bg-warning"><?php echo app('translator')->get('Pending'); ?></span>
                                                <?php elseif($withdraw->status == 1): ?>
                                                    <span
                                                        class="text-small badge font-weight-normal bg-success"><?php echo app('translator')->get('Approved'); ?></span>
                                                    <br><?php echo e(diffForHumans($withdraw->updated_at)); ?>

                                                <?php elseif($withdraw->status == 3): ?>
                                                    <span
                                                        class="text-small badge font-weight-normal bg-danger"><?php echo app('translator')->get('Rejected'); ?></span>
                                                    <br><?php echo e(diffForHumans($withdraw->updated_at)); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                                <a href="<?php echo e(route('moder.withdraw.details', $withdraw->id)); ?>"
                                                   class="icon-btn ml-1 " data-toggle="tooltip"
                                                   data-original-title="<?php echo app('translator')->get('Detail'); ?>">
                                                    <i><img src="<?php echo e(asset('asset/img/desktop.svg')); ?>"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td class="text-muted text-center"
                                                colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    </tbody>
                                </table>
                                <!- table end ->
                            </div>
                        </div>

                        <div class="card-footer py-4">
                            <?php echo e(paginateLinks($withdrawals)); ?>

                        </div>
                    </div>
                    <!- card end ->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/withdraw/withdrawals.blade.php ENDPATH**/ ?>