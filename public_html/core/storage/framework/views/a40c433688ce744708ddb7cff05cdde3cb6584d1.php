<?php $__env->startSection('title', __('Ads Zone')); ?>
<?php $__env->startSection('panel'); ?>
    <div class="row">
        <?php if(isset($create)): ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="margin-top:10px;"><?php echo app('translator')->get('Create New Ad'); ?></h3>
                </div>
                <div class="card-body">
                    <?php if(isset($edit)): ?>
                        <form action="<?php echo e(route('moder.ads.update', $ads->id)); ?>" method="POST">
                            <?php echo method_field('put'); ?>
                            <?php echo csrf_field(); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'name','placeholder' => __('Ad Name'),'label' => __('Ad Name'),'value' => ''.e($ads->name).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'name','placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ad Name')),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ad Name')),'value' => ''.e($ads->name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <div class="form-group">
                                <label for="contents"><?php echo app('translator')->get('Ad Code'); ?></label>
                                <textarea name="contents" id="contents" rows="5" class="form-control">
                               <?php echo e(trim($ads->contents)); ?>

                           </textarea>
                            </div>
                            <div class="form-group">
                                <label for="size"><?php echo app('translator')->get('Ad Size'); ?></label>
                                <select name="size" id="size" class="form-control" style="box-shadow:none !important;">
                                    <option value="0"><?php echo app('translator')->get('Select One'); ?></option>
                                    <option value="728*90" <?php if($ads->size == '728*90'): ?> selected="selected" <?php endif; ?>>728*90
                                    </option>
                                    <option value="250*250" <?php if($ads->size == '250*250'): ?> selected="selected" <?php endif; ?>>250*250
                                    </option>

                                </select>
                            </div>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['type' => 'submit','label' => __('Update')]]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'submit','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Update'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('moder.ads.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'name','placeholder' => __('Ad Name'),'label' => __('Ad Name')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'name','placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ad Name')),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ad Name'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <br>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.textarea','data' => ['name' => 'contents','placeholder' => __('Ad Code'),'label' => __('Ad Code')]]); ?>
<?php $component->withName('bs::textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'contents','placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ad Code')),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ad Code'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <br>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.select','data' => ['name' => 'size','options' => ['728*90', '250*250'],'placeholder' => __('Select One'),'label' => __('Ad Size')]]); ?>
<?php $component->withName('bs::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'size','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['728*90', '250*250']),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Select One')),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Ad Size'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <br>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['type' => 'submit','label' => __('Create'),'style' => 'background:#6FB99F;border-color: #6FB99F;box-shadow:none;']]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'submit','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create')),'style' => 'background:#6FB99F;border-color: #6FB99F;box-shadow:none;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-12">
                <a href="<?php echo e(route('moder.ads.create')); ?>" class="btn btn-primary" style="background:#6FB99F;border-color: #6FB99F;margin-left: 10px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;box-shadow:none;">
                    <i class="fas fa-plus" style=" font-family: "Montserrat", sans-serif, arial;letter-spacing: 3px;"></i>
                </a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top:5px;margin-bottom:5px;">
                            <?php echo app('translator')->get('Ads Zone'); ?> <i class="fas fa-question-circle" title="<?php echo app('translator')->get('This ads will appear on the offerwall iframe'); ?>"></i>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto">
                            <table class="table table-bordered table-striped table-hover table-responsive-sm">
                                <thead>

                                    <tr>
                                        <th style="width: 10%"><?php echo app('translator')->get('Name'); ?></th>
                                        <th style="width: 60%"><?php echo app('translator')->get('Content'); ?></th>
                                        <th style="width: 10%"><?php echo app('translator')->get('Size'); ?></th>
                                        <th style="width: 10%"><?php echo app('translator')->get('Status'); ?></th>
                                        <th style="width: 10%"><?php echo app('translator')->get('Action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td data-label="<?php echo app('translator')->get('Title'); ?>">
                                                <?php echo e($item->name); ?>

                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Content'); ?>">
                                                <?php echo e($item->contents); ?>

                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Size'); ?>">
                                                <?php echo e($item->size); ?>

                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                <?php echo bolToText($item->isActive, true, __("Inactive"), __("Active")); ?>

                                            </td>
                                            <td data-label="<?php echo app('translator')->get('Action'); ?>" class="d-flex justify-content-between align-items-center  flex-nowrap h-100">
                                                <a href="<?php echo e(route('moder.ads.edit', $item->id)); ?>"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit" title="Edit"></i>
                                                </a>
                                                <form action="<?php echo e(route('moder.ads.destroy', $item->id)); ?>" method="post">
                                                    <?php echo method_field('delete'); ?> <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash" title="<?php echo app('translator')->get('Delete'); ?>"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%"><?php echo e(__('No ads yet')); ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                            <?php echo e(paginateLinks($ads)); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
  
    .form-control:focus{
            border: 2px solid #6FB99F;
            box-shadow: none;
        }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/admin/ads-zone/index.blade.php ENDPATH**/ ?>