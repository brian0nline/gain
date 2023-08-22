
<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="margin-top:5px;"><?php echo app('translator')->get('Manage Email Templates'); ?></h4>
        </div>
        <div class="card-body">
            
            <div class="overflow-auto">
                <table class="table custom-table">
                    <thead>
                    <tr>
                        <th><?php echo app('translator')->get('Name'); ?></th>
                        <th><?php echo app('translator')->get('Subject'); ?></th>
                        <th><?php echo app('translator')->get('Status'); ?></th>
                        <th><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('Name'); ?>"><?php echo e(__($template->name)); ?></td>
                            <td data-label="<?php echo app('translator')->get('Subject'); ?>"><?php echo e(__($template->subj)); ?></td>
                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                <?php echo bolToText($template->email_status, true, 'Disabled', 'Enabled'); ?>

                                <button type="button" class="btn btn-icon btn-sm"
                                        wire:click="updateStatus(<?php echo e($template->id); ?>, <?php echo e($template->email_status); ?>)">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </button>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                <a href="#" wire:click.prevent="edit(<?php echo e($template->id); ?>)"
                                   class="btn btn-icon text-info  ml-1 editGatewayBtn" data-toggle="tooltip" title=""
                                   data-original-title="<?php echo app('translator')->get('Edit'); ?>" style="box-shadow:none;">
                                    <i class="fas fa-edit" style="color: #6FB99F;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-muted text-center" colspan="100%"><?php echo e(__('No Data Yet!')); ?></td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
                <!- table end ->
                <?php echo e($templates->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/admin/email/index.blade.php ENDPATH**/ ?>