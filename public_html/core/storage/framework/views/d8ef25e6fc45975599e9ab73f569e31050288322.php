<head>
    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" href="<?php echo e(asset('asset/storage/Favicon-img.png')); ?>" />
</head>

<?php $__env->startPush('style'); ?>

<style>
    .dashboard{
        display:block !important
    }
</style>

<?php $__env->stopPush(); ?>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card"  style="border-radius:10px;border:none;">
                    <div class="card-header" style="border-radius:0px;border:none;background: #242b27;">
                        <div class="card-body"  style="border:none;">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="paraff"><?php echo app('translator')->get('Offer Name'); ?></th>
                                            <th class="paraff"><?php echo app('translator')->get('Amount'); ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="paraff"><?php echo e($offer->offers->name); ?></td>
                                               
                                                <td  class="paraff"><?php echo e($offer->amount); ?> <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i></td>
                                                
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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
   

<script>
    $(document).ready(function(){
        $('.offer_type').click(function(e){
            e.preventDefault()
            let url = $(this).attr('href');
            $.ajax({
                url:url,
                type:"GET",
                success:function(res){
                    $('#user_reports').html(res);
                }
            })
        })
    })
</script>
<?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/system/user/offer/reports.blade.php ENDPATH**/ ?>