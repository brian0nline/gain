
<?php $__env->startSection('title', __('Custom Offerwalls | Freeloot')); ?>

<?php $__env->startPush('style'); ?>
<style>
    .bg-dark{
        background: #e46a76 !important ;
        color: #fff !important 
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('panel'); ?>
<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start" style="margin-top:5px;"><?php echo app('translator')->get('Custom Offerwalls'); ?></h4>
            <a href="<?php echo e(route('moder.offer.create')); ?>" class="btn btn-sm btn-dark float-end"style="box-shadow:none;background:#4aa276;border-color:#4aa276;border-radius:10px;" >
                <i class="fas fa-plus" style="box-shadow:none;background:#4aa276;border-color:#4aa276;"></i> <?php echo app('translator')->get('New offerwall'); ?>
            </a>
        </div>
        <div class="card-body">
            <div class="overflow-auto">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Offerwall'); ?></th>
                            <th><?php echo app('translator')->get('Postback'); ?></th>
                            <th><?php echo app('translator')->get('Auto-Pay'); ?></th>
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <th><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <img src="<?php echo e(getImage(imagePath()['offers']['path'] . '/' . $offer->image)); ?>"
                                    height="50px" width="50px" />
                                <br>
                                <?php echo e(__($offer->name)); ?>

                            </td>
                            <td data-url="<?php echo e(route('offers.custom.callback', $offer->endpoint)); ?>"
                                style="max-width: 200px; overflow: auto; cursor: pointer;" class="callbackURL">
                                <i class="fas fa-file d-inline m-1"></i><?php echo e(route('offers.custom.callback', $offer->endpoint)); ?>

                            </td>

                            <td data-label="<?php echo app('translator')->get('Auto Pay'); ?>">
                                <?php echo bolToText($offer->isAutoPay, true, 'Disabled', 'Enabled'); ?>

                                <a href="<?php echo e(route('moder.offer.update-pay', $offer->id)); ?>" class="btn btn-icon btn-sm" style="box-shadow:none;">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </a>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                <?php echo bolToText($offer->isActive, true, 'Disabled', 'Enabled'); ?>

                                <a href="<?php echo e(route('moder.offer.update-status', $offer->id)); ?>"
                                    class="btn btn-icon btn-sm" style="box-shadow:none;">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </a>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                <a href="<?php echo e(route('moder.offer.edit', $offer->id)); ?>"
                                    class="btn btn-sm btn-info  m-1" data-toggle="tooltip" title=""
                                    data-original-title="<?php echo app('translator')->get('Edit'); ?>" style="background:#4aa276;border-color:#4aa276;box-shadow:none;">
                                    <i class="fas fa-edit" style="color:#fff;"></i>
                                </a>
                                <form action="<?php echo e(route('moder.offer.delete', $offer->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                    <button type="submit" class="btn btn-sm btn-info  m-1" data-toggle="tooltip"
                                        title="" data-original-title="<?php echo app('translator')->get('Delete'); ?>" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;" disabled />
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function(){
        $(document).on('click', '.callbackURL' , function(){
            let url = $(this).data('url');
            let $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();
            notify('info', 'Postback Copied');
        })        
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/system/admin/offer-wall/list.blade.php ENDPATH**/ ?>