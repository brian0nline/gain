<div>
    <?php $__env->startSection('title', __('Manage Deposits')); ?>
    <?php $__env->startSection('page-title', __('Manage Deposits')); ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start"><?php echo app('translator')->get('Manage Deposits'); ?></h4>
            <a class="btn btn-sm btn-secondary float-end"
               href="<?php echo e(route('moder.withdraw.method.create')); ?>"><i class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('Add
                        New'); ?></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <input type="search" wire:model="search" class="form-control"
                               :placeholder="__('Search by TRX, Gateway Name, Username')"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select wire:model="filter" class="form-control" wire:chage="$set('filter', '<?php echo e($filter); ?>')">
                            <option value="1"><?php echo app('translator')->get('Approved'); ?></option>
                            <option value="3"><?php echo app('translator')->get('Rejected'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">

                    <div class="overflow-auto">
                        <table class="table table-bordered table-striped table-hover table-responsive-sm">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Gateway | Trx'); ?></th>
                                <th><?php echo app('translator')->get('Initiated'); ?></th>
                                <th><?php echo app('translator')->get('User'); ?></th>
                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                <th><?php echo app('translator')->get('Conversion'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $deposits->where('status' ,  $filter); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $details = $deposit->detail ? json_encode($deposit->detail) : null
                                ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('Gateway | Trx'); ?>">
                                        <span class="font-weight-bold"><?php echo e(__($deposit->gateway->name)); ?>

                                        </span>
                                        <br>
                                        <small> <?php echo e($deposit->trx); ?> </small>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Date'); ?>">
                                        <?php echo e(showDateTime($deposit->created_at)); ?>

                                        <br><?php echo e(diffForHumans($deposit->created_at)); ?>

                                    </td>
                                    <td data-label="<?php echo app('translator')->get('User'); ?>">
                                        <span class="font-weight-bold"><?php echo e($deposit->user->fullname); ?></span>
                                        <br>
                                        <span class="small">
                                            <a
                                                href="<?php echo e(route('moder.users.detail', $deposit->user_id)); ?>"><span>@</span><?php echo e($deposit->user->username); ?></a>
                                        </span>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                        <?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($deposit->amount)); ?> + <span
                                            class="text-danger" data-toggle="tooltip"
                                            data-original-title="<?php echo app('translator')->get('charge'); ?>"><?php echo e(showAmount($deposit->charge)); ?>

                                        </span>
                                        <br>
                                        <strong data-toggle="tooltip"
                                                data-original-title="<?php echo app('translator')->get('Amount with charge'); ?>">
                                            <?php echo e(showAmount($deposit->amount + $deposit->charge)); ?>

                                            <?php echo e(__($general->cur_text)); ?>

                                        </strong>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Conversion'); ?>">
                                        1 <?php echo e(__($general->cur_text)); ?> = <?php echo e(showAmount($deposit->rate)); ?>

                                        <?php echo e(__($deposit->method_currency)); ?>

                                        <br>
                                        <strong><?php echo e(showAmount($deposit->final_amo)); ?>

                                            <?php echo e(__($deposit->method_currency)); ?></strong>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php echo bolToText($deposit->status, true, '', 'Success', 'Pending', 'Rejected'); ?>

                                        <br><?php echo e(diffForHumans($deposit->updated_at)); ?>

                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <a href="<?php echo e(route('moder.deposit.view', $deposit->id)); ?>"
                                           class="icon-btn ml-1 " data-toggle="tooltip" title=""
                                           data-original-title="<?php echo app('translator')->get('Detail'); ?>">
                                            <i class="fa fa-desktop"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center"
                                        colspan="100%"><?php echo e(__('Not Data Avaliable')); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>

                        <?php echo e(paginateLinks($deposits)); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/admin/deposit/log.blade.php ENDPATH**/ ?>