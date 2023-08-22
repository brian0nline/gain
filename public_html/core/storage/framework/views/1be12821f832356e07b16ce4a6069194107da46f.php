<?php $__env->startSection('title', __('Manage manual gateway')); ?>
<?php $__env->startSection('page-title', __('Manage manual gateway')); ?>
<div>


    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start"><?php echo app('translator')->get('Manage Manual Deposits'); ?></h4>
            <a class="btn btn-sm btn-light float-end"
               href="<?php echo e(route('moder.gateway.manual-create')); ?>"><i class="fas fa-fw fa-plus"></i><?php echo app('translator')->get('Add
                        New'); ?></a>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="search" wire:model="search" class="form-control" :placeholder="__('Search By Name')"/>
            </div>
            <div class="overflow-auto">
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead>
                    <tr>
                        <th><?php echo app('translator')->get('Gateway'); ?></th>
                        <th><?php echo app('translator')->get('Status'); ?></th>
                        <th><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('Gateway'); ?>">
                                <div class="user">
                                    <div class="thumb">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.image','data' => ['height' => '25','src' => ''.e(getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size'])).'']]); ?>
<?php $component->withName('bs::image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['height' => '25','src' => ''.e(getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size'])).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                    <span class="name"><?php echo e(__($gateway->name)); ?></span>
                                </div>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                <?php echo bolToText($gateway->status, true, 'Inactive', 'Active'); ?>

                                <button type="button" class="btn btn-icon btn-sm"
                                        wire:click="updateStatus(<?php echo e($gateway->id); ?>, <?php echo e($gateway->status ? 1 : 0); ?>)">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </button>

                            </td>
                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                <a href="<?php echo e(route('moder.gateway.manual.edit', $gateway->alias)); ?>"
                                   class="btn btn-icon text-info" data-toggle="tooltip"
                                   title="<?php echo app('translator')->get('Edit'); ?>" data-original-title="<?php echo app('translator')->get('Edit'); ?>">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['type' => 'button','size' => 'sm','wire:click' => 'delete(\''.e($gateway->id).'\')','class' => 'btn-icon text-danger border-0','icon' => 'trash','title' => 'Delete','confirm' => true]]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'button','size' => 'sm','wire:click' => 'delete(\''.e($gateway->id).'\')','class' => 'btn-icon text-danger border-0','icon' => 'trash','title' => 'Delete','confirm' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-muted text-center" colspan="100%"><?php echo e(__('No Data!')); ?></td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/gateway/manual/index.blade.php ENDPATH**/ ?>