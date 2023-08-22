<?php $__env->startSection('title', __('Notifications | Freeloot')); ?>
<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo app('translator')->get('Manage Notifications'); ?> </h3>
        </div>
        <div class="card-body">
            <a href="<?php echo e(route('moder.notifications.readAll')); ?>" class="btn btn-primary float-end" style="background:#4aa276;border-color:#4aa276;box-shadow:none"><?php echo app('translator')->get('Mark all as
                read'); ?></a>
            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="panel">
                    <div class="panel-body">
                        <a class="nav-link" href="<?php echo e(route('moder.notification.read', $notification->id)); ?>">
                            <h6><?php echo e($notification->title); ?></h6>
                            <span class="date"><i class="fas fa-clock"></i>
                                <?php echo e($notification->created_at->diffForHumans()); ?></span>
                        </a>
                    </div>
                    <div class="panel-footer d-flex">
                        <?php if($notification->read_status == 0): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['color' => 'light','href' => ''.e(route('moder.notification.read', $notification->id)).'','icon' => 'envelope','title' => 'Read','size' => 'sm','class' => 'mx-1','style' => 'background:#4aa276;border-color:#4aa276;box-shadow:none']]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['color' => 'light','href' => ''.e(route('moder.notification.read', $notification->id)).'','icon' => 'envelope','title' => 'Read','size' => 'sm','class' => 'mx-1','style' => 'background:#4aa276;border-color:#4aa276;box-shadow:none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['color' => 'light','href' => '#','icon' => 'envelope-open','title' => 'Readed','size' => 'sm','class' => 'mx-1','style' => 'box-shadow:none']]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['color' => 'light','href' => '#','icon' => 'envelope-open','title' => 'Readed','size' => 'sm','class' => 'mx-1','style' => 'box-shadow:none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['href' => ''.e(route('moder.notification.delete', $notification->id)).'','icon' => 'trash','title' => 'delete','size' => 'sm','class' => 'mx-1','confirmed' => true,'style' => 'background:#e84b3c;border-color:#e84b3c;box-shadow:none']]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('moder.notification.delete', $notification->id)).'','icon' => 'trash','title' => 'delete','size' => 'sm','class' => 'mx-1','confirmed' => true,'style' => 'background:#e84b3c;border-color:#e84b3c;box-shadow:none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(paginateLinks($notifications)); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/notifications.blade.php ENDPATH**/ ?>