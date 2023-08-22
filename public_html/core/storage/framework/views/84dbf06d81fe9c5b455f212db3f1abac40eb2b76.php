<div
    id="laravel-livewire-toasts"
    class="toast position-fixed align-items-center text-white bg-<?php echo e($color); ?> border-0 fade hide"
    style="top: 1rem; right: 1rem; width: 18rem; z-index: 1090;"
    data-bs-delay="<?php echo e(config('laravel-livewire-toasts.hide_delay')); ?>"
    data-error-message="<?php echo e(__(config('laravel-livewire-toasts.error_message'))); ?>">
    <div class="d-flex">
        <div class="toast-body">
            <?php echo e($message); ?>

        </div>

        <button
            type="button"
            class="btn-close btn-close-white me-2 m-auto"
            data-bs-dismiss="toast"></button>
    </div>
</div>
<?php /**PATH /home/freebpbk/demo.freeloot.net/core/vendor/bastinald/laravel-livewire-toasts/src/Providers/../../resources/views/toasts.blade.php ENDPATH**/ ?>