<?php $__env->startSection('title', __('Manage Support Tickets')); ?>
<?php $__env->startSection('page-title', __('Manage Support Tickets')); ?>

<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php echo app('translator')->get('Manage Support Tickets'); ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="search" class="form-control" wire:model="search" placeholder="__('Search By Sender')"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select wire:model="status" class="form-select">
                            <option value=""><?php echo app('translator')->get('Filter By Status'); ?></option>
                            <option value="0"><?php echo app('translator')->get('Open'); ?></option>
                            <option value="1"><?php echo app('translator')->get('Answered'); ?></option>
                            <option value="2"><?php echo app('translator')->get('Customer Reply'); ?></option>
                            <option value="3"><?php echo app('translator')->get('Closed'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select wire:model="priority" class="form-select">
                            <option><?php echo app('translator')->get('Filter By Priority'); ?></option>
                            <option value="1"><?php echo app('translator')->get('Low'); ?></option>
                            <option value="2"><?php echo app('translator')->get('Medium'); ?></option>
                            <option value="3"><?php echo app('translator')->get('High'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card b-radius-10 ">
                        <div class="card-body p-0">
                            <div class="overflow-auto">
                                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                                    <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('Subject'); ?></th>
                                        <th><?php echo app('translator')->get('Submitted By'); ?></th>
                                        <th><?php echo app('translator')->get('Status'); ?></th>
                                        <th><?php echo app('translator')->get('Priority'); ?></th>
                                        <th><?php echo app('translator')->get('Last Reply'); ?></th>
                                        <th><?php echo app('translator')->get('Action'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($status) || $status == '0'): ?>
                                        <?php  $items = $items->where('status', $status) ?>
                                    <?php elseif(!empty($priority)): ?>
                                        <?php  $items = $items->where('priority', $priority) ?>
                                    <?php endif; ?>

                                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td data-label="<?php echo app('translator')->get('Subject'); ?>">
                                                <a href="<?php echo e(route('moder.ticket.view', $item->id)); ?>"
                                                   class="font-weight-bold">
                                                    [<?php echo app('translator')->get('Ticket'); ?>#<?php echo e($item->ticket); ?>] <?php echo e($item->subject); ?> </a>
                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Submitted By'); ?>">

                                                <p class="font-weight-bold"> <?php echo e($item->name); ?></p>

                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                <?php if($item->status == 0): ?>
                                                    <span class="badge bg-success"><?php echo app('translator')->get('Open'); ?></span>
                                                <?php elseif($item->status == 1): ?>
                                                    <span class="badge  bg-primary"><?php echo app('translator')->get('Answered'); ?></span>
                                                <?php elseif($item->status == 2): ?>
                                                    <span class="badge bg-warning"><?php echo app('translator')->get('Customer Reply'); ?></span>
                                                <?php elseif($item->status == 3): ?>
                                                    <span class="badge bg-info"><?php echo app('translator')->get('Closed'); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Priority'); ?>">
                                                <?php if($item->priority == 1): ?>
                                                    <span class="badge bg-info"><?php echo app('translator')->get('Low'); ?></span>
                                                <?php elseif($item->priority == 2): ?>
                                                    <span class="badge  bg-warning"><?php echo app('translator')->get('Medium'); ?></span>
                                                <?php elseif($item->priority == 3): ?>
                                                    <span class="badge bg-danger"><?php echo app('translator')->get('High'); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Last Reply'); ?>">
                                                <?php echo e(diffForHumans($item->last_reply)); ?>

                                            </td>

                                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                                <a href="<?php echo e(route('moder.ticket.view', $item->id)); ?>"
                                                   class="icon-btn  ml-1" data-toggle="tooltip" title=""
                                                   data-original-title="<?php echo app('translator')->get('Details'); ?>">
                                                    <i class="fas fa-desktop"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%"><?php echo e(__('No Data Yet!')); ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        <div class="card-footer py-4">

                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('style'); ?>

    <?php $__env->stopPush(); ?>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/support/index.blade.php ENDPATH**/ ?>