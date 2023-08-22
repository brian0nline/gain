<?php $attributes = $attributes->exceptProps([
    'icon' => null,
    'label' => null,
]); ?>
<?php foreach (array_filter(([
    'icon' => null,
    'label' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $attributes = $attributes->class([
        'input-group-text',
    ])->merge([
        //
    ]);
?>

<?php if($icon || $label || !$slot->isEmpty()): ?>
    <span <?php echo e($attributes); ?>>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.icon','data' => ['name' => $icon]]); ?>
<?php $component->withName('bs::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <?php echo e($label ?? $slot); ?>

    </span>
<?php endif; ?>
<?php /**PATH E:\laragon\www\gainify\core\vendor\bastinald\laravel-bootstrap-components\src\Providers/../../resources/views/components/input-addon.blade.php ENDPATH**/ ?>