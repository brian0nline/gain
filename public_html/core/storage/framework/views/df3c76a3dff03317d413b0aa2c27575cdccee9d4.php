<head>
    <link rel="manifest" href="/manifest.json">
</head>

<?php $__env->startSection('title', __('Referrals | Freeloot')); ?>

<?php $__env->startPush('css'); ?>
<style>
    .dashboard{
        display: block !important;
    }
    
    @media  screen and (max-width: 425px) {
  .paraff {
    font-size:12px;
  }
}

@media  screen and (min-width: 992px) {
  .paraff {
    font-size:16px;
  }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

   
    <div class="card text-center pt-0" style="border-radius:20px;" id="referrallinkcommition"> 
     <h4 class="text-center" style="margin-top:20px;font-size: 13px;"><?php echo app('translator')->get('YOUR REFERRAL LINK'); ?></h4>
        <div class="card-body text-center p-0" style="border-radius:20px;">
            <!--<h4 class="text-center"><?php echo app('translator')->get('WHERE IS MY REFERRAL LINK?'); ?></h4>-->
            <!--<input type="text" class="form-control w-75 m-auto" value=<?php echo e($userRefLink); ?>" readonly>-->
             
            <div class="form-group" style="border-radius:20px;">
                <div class="input-group input-group w-75 mx-auto mb-3"style="border-radius:20px;">
                    <input type="text" id="reflink" value="<?php echo e($userRefLink); ?>"
                        class="form-control m-0 rounded-0" style="color: #4aa276;border-radius:20px;font-size:14px;";" readonly>
                        <span class="input-group-text copytext" id="copyBoard" style="font-size:14px;border-top-right-radius:10px;border-bottom-right-radius:10px;">Copy 
                    </span>
                </div>
            </div>
           
            <div class="row justify-content-center">
                <div class="col-md-12 overflow-auto">
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th class="paraff"><?php echo app('translator')->get('Commission From'); ?></th>
                            <!--<th><?php echo app('translator')->get('Commission Level'); ?></th>-->
                            <th class="paraff"><?php echo app('translator')->get('Amount'); ?></th>
                            <!--<th><?php echo app('translator')->get('Title'); ?></th>-->
                            <!--<th><?php echo app('translator')->get('Transaction'); ?></th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($commissions) > 0): ?>
                            <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('Commission From'); ?>" class="paraff" style="color:#fff;"><?php echo e(@$log->userFrom->username); ?></td>
                                    <!--<td data-label="<?php echo app('translator')->get('Level'); ?>"><?php echo e($log->level); ?></td>-->
                                    <th data-label="<?php echo app('translator')->get('Amount'); ?>" class="paraff" style="color:#fff;"><?php echo e(getAmount($log->amount)); ?>

                                         <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i></td>
                                    <!--<td data-label="<?php echo app('translator')->get('Title'); ?>"><?php echo e($log->title); ?></td>-->
                                    <!--<td data-label="<?php echo app('translator')->get('Transaction'); ?>"><?php echo e($log->trx); ?></td>-->
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="100%"> <?php echo app('translator')->get('No results found'); ?>!</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <?php echo e($commissions->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
  if (typeof navigator.serviceWorker !== 'undefined') {
    navigator.serviceWorker.register('sw.js')
  }
</script>
    
<?php $__env->stopSection(); ?>




<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";

            $('.copytext').on('click', function() {
                var copyText = document.getElementById("reflink");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
            });
        })(jQuery);
    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/user/commissions.blade.php ENDPATH**/ ?>