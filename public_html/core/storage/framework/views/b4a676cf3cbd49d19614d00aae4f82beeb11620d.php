<div id="laravel-livewire-modals" class="modal fade" tabindex="-1"
    data-bs-backdrop="static" data-bs-keyboard="false" wire:ignore.self>
    <?php if($alias): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount($alias, $params)->html();
} elseif ($_instance->childHasBeenRendered($alias)) {
    $componentId = $_instance->getRenderedChildComponentId($alias);
    $componentTag = $_instance->getRenderedChildComponentTagName($alias);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($alias);
} else {
    $response = \Livewire\Livewire::mount($alias, $params);
    $html = $response->html();
    $_instance->logRenderedChild($alias, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>
</div>
<?php /**PATH /home/freebpbk/public_html/core/vendor/bastinald/laravel-livewire-modals/src/Providers/../../resources/views/modals.blade.php ENDPATH**/ ?>