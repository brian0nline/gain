<?php $attributes = $attributes->exceptProps([
    'asset' => null,
    'mix' => null,
    'src' => null,
    'fluid' => false,
    'thumbnail' => false,
    'rounded' => false,
]); ?>
<?php foreach (array_filter(([
    'asset' => null,
    'mix' => null,
    'src' => null,
    'fluid' => false,
    'thumbnail' => false,
    'rounded' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    if ($asset) $src = asset($asset);
    else if ($mix) $src = mix($mix);

    $attributes = $attributes->class([
        'img-fluid' => $fluid,
        'img-thumbnail' => $thumbnail,
        'rounded' => $rounded,
    ])->merge([
        'src' => $src,
    ]);
?>

<img <?php echo e($attributes); ?>>
<?php /**PATH /home/freebpbk/demo.freeloot.net/core/vendor/bastinald/laravel-bootstrap-components/src/Providers/../../resources/views/components/image.blade.php ENDPATH**/ ?>