<?php $attributes = $attributes->exceptProps([
    'label' => null,
]); ?>
<?php foreach (array_filter(([
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
        'form-check-label',
    ])->merge([
        //
    ]);
?>

<?php if($label || !$slot->isEmpty()): ?>
    <label <?php echo e($attributes); ?>>
        <?php echo e($label ?? $slot); ?>

    </label>
<?php endif; ?>
<?php /**PATH /home/freebpbk/public_html/core/vendor/bastinald/laravel-bootstrap-components/src/Providers/../../resources/views/components/check-label.blade.php ENDPATH**/ ?>