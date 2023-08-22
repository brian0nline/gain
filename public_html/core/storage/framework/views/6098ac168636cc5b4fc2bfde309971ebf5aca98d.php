<?php $__env->startSection('title', __('Shop History | Gainify')); ?>

<?php $__env->startPush('css'); ?>
<style>
    .dashboard{
        display: block !important;
    }
   
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container card pt-100 pb-100" style="border-radius:20px;">
       
        <div class="text-end mb-3">
            <a href="<?php echo e(route('user.withdraw')); ?>" class="btn btn-primary" style="box-shadow: none;font-size:14px;">
                <?php echo app('translator')->get('Cashout Now'); ?>
            </a>
        </div>
       
        <div class="row justify-content-center">
            <div class="col-12 table-responsive">
                <table class="table custom-table">
                    <thead class="thead-dark">
                        <tr>
                            <!--<th><?php echo app('translator')->get('Transaction ID'); ?></th>-->
                            <th><?php echo app('translator')->get('Gateway'); ?></th>
                            <th><?php echo app('translator')->get('Amount'); ?></th>
                            <!--<th><?php echo app('translator')->get('Charge'); ?></th>-->
                            <!--<th><?php echo app('translator')->get('After Charge'); ?></th>-->
                            <!--<th><?php echo app('translator')->get('Rate'); ?></th>-->
                            <!--<th><?php echo app('translator')->get('Receivable'); ?></th>-->
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <!--<th><?php echo app('translator')->get('Time'); ?></th>-->
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <!--<td data-label="#<?php echo app('translator')->get('Trx'); ?>"><?php echo e($data->trx); ?></td>-->
                                <td data-label="<?php echo app('translator')->get('Gateway'); ?>"><?php echo e(__($data->method->name)); ?></td>
                                <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                    <strong><?php echo e(showAmount($data->amount)); ?> </strong>
                                </td>
                                <!--<td data-label="<?php echo app('translator')->get('Charge'); ?>" class="text-danger">-->
                                <!--    <?php echo e(showAmount($data->charge)); ?> <?php echo e(__($general->cur_text)); ?>-->
                                <!--</td>-->
                                <!--<td data-label="<?php echo app('translator')->get('After Charge'); ?>">-->
                                <!--    <?php echo e(showAmount($data->after_charge)); ?> <?php echo e(__($general->cur_text)); ?>-->
                                <!--</td>-->
                                <!--<td data-label="<?php echo app('translator')->get('Rate'); ?>">-->
                                <!--    <?php echo e(showAmount($data->rate)); ?> <?php echo e(__($data->currency)); ?>-->
                                <!--</td>-->
                                <!--<td data-label="<?php echo app('translator')->get('Receivable'); ?>" class="text-success">-->
                                <!--    <strong><?php echo e(showAmount($data->final_amount)); ?> <?php echo e(__($data->currency)); ?></strong>-->
                                <!--</td>-->
                                <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                    <?php if($data->status == 2): ?>
                                        <span class="text-small badge font-weight-normal bg-warning"><?php echo app('translator')->get('Pending'); ?></span>
                                    <?php elseif($data->status == 1): ?>
                                        <span class="text-small badge font-weight-normal bg-success"><?php echo app('translator')->get('Completed'); ?></span>
                                        
                                    <?php elseif($data->status == 3): ?>
                                        <span class="text-small badge font-weight-normal bg-danger"><?php echo app('translator')->get('Rejected'); ?></span>
                                        <button class="btn-danger btn-rounded badge approveBtn"
                                            data-admin_feedback="<?php echo e($data->admin_feedback); ?>" style="box-shadow:none;border-radius:10px;"><i
                                                class="fa fa-info"></i>
                                        </button>
                                    <?php endif; ?>

                                </td>
                                <!--<td data-label="<?php echo app('translator')->get('Time'); ?>">-->
                                <!--    <i class="fa fa-calendar"></i> <?php echo e(showDateTime($data->created_at)); ?>-->
                                <!--</td>-->
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-muted text-center" colspan="100%"><?php echo e(__('No data found')); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
            
             <div class="col-12">
                <div class="mt-2">
                    <?php echo e($withdraws->links()); ?>

                </div>
            </div>
        </div>
    </div>



    
    <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header"  style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title"><?php echo app('translator')->get('Details'); ?></h5>
                   
                </div>
                <div class="modal-body" style="border-bottom: 2px solid #242B27;">

                    <div class="withdraw-detail" style="font-size: 12px;"></div>

                </div>
                <div class="modal-footer" style="border-top: 2px solid #242B27;">
                    <!--<button type="button" class="btn btn-danger" data-dismiss="modal"style="background: #3B4740;border-color:#3B4740;box-shadow:none;"><?php echo app('translator')->get('Close'); ?></button>-->
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('datatable', false); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.approveBtn').on('click', function() {
                var modal = $('#detailModal');
                var feedback = $(this).data('admin_feedback');
                modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/user/withdraw/log.blade.php ENDPATH**/ ?>