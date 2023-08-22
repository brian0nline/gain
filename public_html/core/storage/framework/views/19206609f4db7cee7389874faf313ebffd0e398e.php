<head>
    <title>Offers Stats | Freeloot</title>
</head>

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-2">
                <input type="search" wire:model="search" class="form-control"
                    placeholder="Search By Username, TRX" />
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <select class="form-control" wire:change="$set('isPaid', $event.target.value)">
                        <option value=""><?php echo app('translator')->get('Filter By Paid'); ?></option>
                        <option value="paid"><?php echo app('translator')->get('Paid'); ?></option>
                        <option value="not_paid"><?php echo app('translator')->get('Not Paid'); ?></option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('Offer Name'); ?></th>
                    <th><?php echo app('translator')->get('Username'); ?></th>
                    <th><?php echo app('translator')->get('TRX'); ?></th>
                    <th><?php echo app('translator')->get('Rewards'); ?></th>
                    <th><?php echo app('translator')->get('Status'); ?></th>
                    <th><?php echo app('translator')->get('Action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td data-label="<?php echo app('translator')->get('Offer Name'); ?>"><?php echo e($offer->offers->name); ?>

                            <a href="<?php echo e(route('moder.offer.index')); ?>" class="text-danger"></a>
                        </td>
                        <td data-label="<?php echo app('translator')->get('SubId'); ?>">
                            <?php echo e(__(@$offer->users->fullname)); ?>

                            <br />
                            <span class="text-warning">@ <?php echo e(@$offer->users->username); ?></span>
                        </td>

                        <td data-label="<?php echo app('translator')->get('TRX'); ?>"><?php echo e(__(@$offer->trx)); ?>

                        </td>

                        <td data-label="<?php echo app('translator')->get('Rewards'); ?>"><?php echo e(__(@$offer->amount)); ?><i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i>
                        </td>

                        <td data-label="<?php echo app('translator')->get('Status'); ?>">
                            <?php echo bolToText($offer->isPaid, true, 'Not Paid', 'Paid'); ?>

                        </td>


                        <td data-label="<?php echo app('translator')->get('Action'); ?>" class="d-flex">
                            <?php if(!$offer->isPaid): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['href' => '#','wire:click' => 'sendPayment('.e($offer->id).')','icon' => 'share','title' => 'Send Payment','size' => 'sm','color' => 'info','style' => 'box-shadow:none;']]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '#','wire:click' => 'sendPayment('.e($offer->id).')','icon' => 'share','title' => 'Send Payment','size' => 'sm','color' => 'info','style' => 'box-shadow:none;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['href' => '#','wire:click' => 'reversePayment('.e($offer->id).')','icon' => 'share','title' => 'Reverse','size' => 'sm','color' => 'danger','style' => 'box-shadow:none;']]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '#','wire:click' => 'reversePayment('.e($offer->id).')','icon' => 'share','title' => 'Reverse','size' => 'sm','color' => 'danger','style' => 'box-shadow:none;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>                             
                            <?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['href' => '#','wire:click' => 'delete('.e($offer->id).')','icon' => 'trash','title' => 'Delete','size' => 'sm','color' => 'warning','confirm' => true,'style' => 'box-shadow:none;']]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '#','wire:click' => 'delete('.e($offer->id).')','icon' => 'trash','title' => 'Delete','size' => 'sm','color' => 'warning','confirm' => true,'style' => 'box-shadow:none;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="text-muted text-center" colspan="100%"><?php echo e(__('No Data Yet!')); ?></td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
        
            <?php echo e($offers->links()); ?>

    </div>
</div>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/system/admin/offer-wall/livewire-analysis.blade.php ENDPATH**/ ?>