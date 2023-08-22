<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php echo app('translator')->get('Manage Gateways'); ?></h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="search" wire:model="search" class="form-control" placeholder="Search By Name"/>
            </div>
            <div class="overflow-auto">
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead>
                    <tr>
                        <th><?php echo app('translator')->get('Gateway'); ?></th>
                        <th><?php echo app('translator')->get('Supported Currency'); ?></th>
                        <th><?php echo app('translator')->get('Enabled Currency'); ?></th>
                        <th><?php echo app('translator')->get('Status'); ?></th>
                        <th><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $gateways->sortBy('alias'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('Gateway'); ?>">
                                <div class="user">
                                    <div class="thumb">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.image','data' => ['height' => '24','rounded' => true,'src' => ''.e(getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size'])).'']]); ?>
<?php $component->withName('bs::image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['height' => '24','rounded' => true,'src' => ''.e(getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size'])).'']); ?>
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


                            <td data-label="<?php echo app('translator')->get('Supported Currency'); ?>">
                                <?php echo e(count(json_decode($gateway->supported_currencies, true))); ?>

                            </td>
                            <td data-label="<?php echo app('translator')->get('Enabled Currency'); ?>">
                                <?php echo e($gateway->currencies->count()); ?>

                            </td>


                            <td data-label="<?php echo app('translator')->get('Status'); ?>">

                                <?php echo bolToText($gateway->status, true, 'Inactive', 'Active'); ?>


                                <button type="button" class="btn btn-icon btn-sm"
                                        wire:click="updateStatus(<?php echo e($gateway->id); ?>, <?php echo e($gateway->status ? 1 : 0); ?>)">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </button>

                            </td>
                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                <a href="#" class="btn btn-icon text-info" data-toggle="tooltip"
                                   data-original-title="<?php echo app('translator')->get('Edit'); ?>"
                                   wire:click.prevent="edit('<?php echo e($gateway->alias); ?>')">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?>

                            </td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
                <?php echo e(paginateLinks($gateways)); ?>

            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/gateway/index.blade.php ENDPATH**/ ?>