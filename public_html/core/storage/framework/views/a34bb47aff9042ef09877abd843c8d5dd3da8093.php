<?php $__env->startSection('title', __('Cashout Methods | Freeloot')); ?>
<?php $__env->startSection('page-title', __('Cashout Methods | Freeloot')); ?>
<?php $__env->startSection('panel'); ?>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start" style="margin-top:10px;"><?php echo app('translator')->get('Manage Cashouts Methods'); ?></h4>
            <a class="btn btn-sm btn-secondary float-end" style="background: #4aa276;border-color: #4aa276;margin-top:5px;box-shadow:none;"
               href="<?php echo e(route('moder.withdraw.method.create')); ?>"><i class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('Add
                        New'); ?></a>
        </div>
        <div class="card-body">
            <div class="overflow-auto">
                <table class="table custom-table">

                    <thead>
                    <tr>
                        <th><?php echo app('translator')->get('Method'); ?></th>
                        <th><?php echo app('translator')->get('Currency'); ?></th>
                        <th><?php echo app('translator')->get('Charge'); ?></th>
                        <th><?php echo app('translator')->get('Withdraw Limit'); ?></th>
                        <th><?php echo app('translator')->get('Processing Time'); ?> </th>
                        <th><?php echo app('translator')->get('Status'); ?></th>
                        <th><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('Method'); ?>">
                                <div class="user">
                                    <div class="thumb">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.image','data' => ['src' => ''.e(getImage(imagePath()['withdraw']['method']['path'] . '/' . $method->image,imagePath()['withdraw']['method']['size'])).'','height' => '50']]); ?>
<?php $component->withName('bs::image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['src' => ''.e(getImage(imagePath()['withdraw']['method']['path'] . '/' . $method->image,imagePath()['withdraw']['method']['size'])).'','height' => '50']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>

                                    <span class="name"><?php echo e(__($method->name)); ?></span>
                                </div>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Currency'); ?>" class="font-weight-bold">
                                <?php echo e(__($method->currency)); ?></td>
                            <td data-label="<?php echo app('translator')->get('Charge'); ?>" class="font-weight-bold">
                                <?php echo e(showAmount($method->fixed_charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                <?php echo e(0 < $method->percent_charge ? ' + ' . showAmount($method->percent_charge) . ' %' : ''); ?>

                            </td>
                            <td data-label="<?php echo app('translator')->get('Withdraw Limit'); ?>" class="font-weight-bold">
                                <?php echo e($method->min_limit + 0); ?>

                                - <?php echo e($method->max_limit + 0); ?> <?php echo e(__($general->cur_text)); ?></td>
                            <td data-label="<?php echo app('translator')->get('Processing Time'); ?>"><?php echo e($method->delay); ?></td>
                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                <?php if($method->status == 1): ?>
                                    <span
                                        class="text-small badge font-weight-normal bg-success"><?php echo app('translator')->get('Active'); ?></span>
                                <?php else: ?>
                                    <span
                                        class="text-small badge font-weight-normal bg-warning"><?php echo app('translator')->get('Disabled'); ?></span>
                                <?php endif; ?>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                <a href="<?php echo e(route('moder.withdraw.method.edit', $method->id)); ?>"
                                   class="btn btn-sm ml-1" data-toggle="tooltip"
                                   data-original-title="<?php echo app('translator')->get('Edit'); ?>" style="box-shadow:none;"><i class="fas fa-pen" style="color:#fff;"></i></a>
                                <?php if($method->status == 1): ?>
                                    <a href="javascript:void(0)"
                                       class="btn btn-sm btn-danger deactivateBtn  ml-1" data-toggle="tooltip"
                                       data-original-title="<?php echo app('translator')->get('Disable'); ?>" data-id="<?php echo e($method->id); ?>"
                                       data-name="<?php echo e(__($method->name)); ?>" style="box-shadow:none;">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="btn btn-sm btn-success activateBtn  ml-1" data-toggle="tooltip"
                                       data-original-title="<?php echo app('translator')->get('Enable'); ?>" data-id="<?php echo e($method->id); ?>"
                                       data-name="<?php echo e(__($method->name)); ?>"  style="box-shadow:none;">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
                <!- table end ->
            </div>
        </div>
    </div>


    
    <div id="activateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title"><?php echo app('translator')->get('Withdrawal Method Activation Confirmation'); ?></h5>
                  
                </div>
                <form action="<?php echo e(route('moder.withdraw.method.activate')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to activate'); ?> <span class="font-weight-bold method-name"></span>
                            <?php echo app('translator')->get('method'); ?>?</p>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #242B27;">
                        <button type="button" class="btn btn-dark" style="background:#3B4740;border-color:#3B4740;box-shadow:none;"  data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn-primary" style="background:#4aa276;border-color:#4aa276;box-shadow:none;"><?php echo app('translator')->get('Activate'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div id="deactivateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:20px;">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title"><?php echo app('translator')->get('Want to disable this method?'); ?></h5>
                   
                </div>
                <form action="<?php echo e(route('moder.withdraw.method.deactivate')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to disable'); ?> <span class="font-weight-bold method-name"></span>
                            <?php echo app('translator')->get('method'); ?>?</p>
                    </div>
                    <div class="modal-footer"  style="border-top: 2px solid #242B27;">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" style="background:#3B4740;border-color:#3B4740;box-shadow:none;"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn-danger" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;" ><?php echo app('translator')->get('Disable'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.activateBtn').on('click', function () {
                var modal = $('#activateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
                modal.modal('show');
            });

            $('.deactivateBtn').on('click', function () {
                var modal = $('#deactivateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/withdraw/index.blade.php ENDPATH**/ ?>