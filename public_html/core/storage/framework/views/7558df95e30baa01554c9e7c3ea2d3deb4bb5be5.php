
<?php $__env->startSection('title', __('Offers Stats | Freeloot')); ?>   
<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <?php echo app('translator')->get('Offers Stats'); ?>
            </h3>
        </div>
        <div class="card-body">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.admin-offer-analysis')->html();
} elseif ($_instance->childHasBeenRendered('FJUp7g0')) {
    $componentId = $_instance->getRenderedChildComponentId('FJUp7g0');
    $componentTag = $_instance->getRenderedChildComponentTagName('FJUp7g0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FJUp7g0');
} else {
    $response = \Livewire\Livewire::mount('components.admin-offer-analysis');
    $html = $response->html();
    $_instance->logRenderedChild('FJUp7g0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/system/admin/offer-wall/analysis.blade.php ENDPATH**/ ?>