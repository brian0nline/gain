<?php $__env->startSection('panel'); ?>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="margin-top:5px;margin-bottom:5px;"><?php echo app('translator')->get('Customize Referral Page'); ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="margin-top:30px;">
                        <div class="card-header">
                            <h4 class="card-title"style="margin-top:5px;margin-bottom:5px;"><?php echo app('translator')->get('Notes:'); ?></h4>
                        </div>
                        <div class="card-body" style="border-top-left-radius:0px;border-top-right-radius:0px;">
                            <p class="card-text">
                                <?php echo app('translator')->get('You can add banners and helper links for users'); ?>
                            </p>
                            <p class="card-text">
                                <?php echo app('translator')->get('For adding html, Please use edit html from the editor menu'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="<?php echo e(route('moder.referral.do-customize')); ?>" method="post" style="overflow:hidden;">
                        <?php echo csrf_field(); ?>
                        <textarea name="contents" class="form-control nicEdit mb-3">
                    <?php echo e(set('ref_page_content')); ?>

                </textarea>
                        <input type="submit" class="btn btn-success mt-3" value="Save" style="box-shadow:none;">
                    </form>
                </div>
            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('editor', true); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/referral/customize.blade.php ENDPATH**/ ?>