<?php $__env->startSection('title', 'Referral System | Freeloot'); ?>

<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-md-12">
           
        </div>
        <div class="col-md-6 mb-4">
            <div class="card mt-2">
                <h5 class="card-header bg--primary" style="margin-top:10px;margin-bottom:5px;"><?php echo app('translator')->get('Deposit Commissions'); ?>
                    <?php if($general->dc == 0): ?>
                        <span class="badge badge-danger float-right" style="color:#e84b3c;"><?php echo app('translator')->get('Disabled'); ?></span>
                    <?php else: ?>
                        <span class="badge badge-success float-right"><?php echo app('translator')->get('Enabled'); ?></span>
                    <?php endif; ?>
                </h5>
                <div class="card-body parent">

                    <div class="row">
                        <div class="col-md-12">
                            <?php if($general->dc == 0): ?>
                                <a href="<?php echo e(route('moder.referral.status', 'dc')); ?>"
                                    class="btn btn-info btn-sm mb-3" style="background:#4aa276;border-color:#4aa276;box-shadow:none;"><?php echo app('translator')->get('Enable Now'); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('moder.referral.status', 'dc')); ?>"
                                    class="btn btn-danger btn-sm mb-3" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;"><?php echo app('translator')->get('Disable Now'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="table-responsive-sm mt-2 mb-2">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('Level'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Deposit Amount'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Commission'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $trans->where('commission_type', 'deposit'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-label="Level"><?php echo app('translator')->get('LEVEL'); ?># <?php echo e($p->level); ?></td>
                                        <td data-label="required"><?php echo app('translator')->get('Required'); ?> => <?php echo e($p->required); ?> $</td>
                                        <td data-label="Commission"><?php echo e($p->percent); ?> %</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                    <hr>

                    <div class="row mb-5">
                        <div class="col-md-12 mb-3">
                            <input type="number" name="level" placeholder="<?php echo app('translator')->get('HOW MANY LEVELS'); ?>"
                                class="form-control levelGenerate">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-success generate" style="box-shadow:none;">
                                <?php echo app('translator')->get('GENERATE'); ?>
                            </button>
                        </div>
                    </div>

                    <form action="<?php echo e(route('moder.store.refer')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="commission_type" value="deposit">
                        <div class="d-none levelForm">

                            <div class="form-group">
                                <label class="text-success"> <?php echo app('translator')->get('Level & Commission :'); ?>
                                    <small><?php echo app('translator')->get('(Old Levels will Remove After Generate)'); ?></small>
                                </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="description referral-desc">
                                            <div class="row">
                                                <div class="col-md-12 planDescriptionContainer">

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block my-3"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card mt-2">
                <h5 class="card-header bg--primary" style="margin-top:10px;margin-bottom:5px;"><?php echo app('translator')->get('Earning Commissions'); ?>
                    <?php if($general->wc == 0): ?>
                        <span class="badge badge-danger float-right"><?php echo app('translator')->get('Disabled'); ?></span>
                    <?php else: ?>
                        <span class="badge badge-success float-right"><?php echo app('translator')->get('Enabled'); ?></span>
                    <?php endif; ?>
                </h5>
                <div class="card-body parent">


                    <div class="row">
                        <div class="col-md-12">
                            <?php if($general->wc == 0): ?>
                                <a href="<?php echo e(route('moder.referral.status', 'wc')); ?>"
                                    class="btn btn-primary" style="background:#4aa276;border-color:#4aa276;box-shadow:none;"><?php echo app('translator')->get('Enable Now'); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('moder.referral.status', 'wc')); ?>"
                                    class="btn btn-danger btn-sm mb-3" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;"><?php echo app('translator')->get('Disable Now'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="table-responsive-sm mt-2 mb-2">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo app('translator')->get('Level'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Required Users'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Commission'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $trans->where('commission_type', 'win'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-label="Level"><?php echo app('translator')->get('LEVEL'); ?># <?php echo e($p->level); ?></td>
                                        <td data-label="required"><?php echo app('translator')->get('Required'); ?> => <?php echo e($p->required); ?> <?php echo app('translator')->get('Users'); ?></td>
                                        <td data-label="Commission"><?php echo e($p->percent); ?> %</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                    <hr>


                    <div class="row mt-3 mb-5">
                        <div class="col-md-12 mb-3">
                            <input type="number" name="level" placeholder="<?php echo app('translator')->get('HOW MANY LEVELS'); ?>"
                                class="form-control input-lg levelGenerate">
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success btn-sm generate" style="box-shadow:none;">
                                <?php echo app('translator')->get('GENERATE'); ?>
                            </button>
                        </div>
                    </div>

                    <form action="<?php echo e(route('moder.store.refer')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="commission_type" value="win">
                        <div class="d-none levelForm">

                            <div class="form-group">
                                <label class="text-success"> <?php echo app('translator')->get('Level & Commission :'); ?>
                                    <small><?php echo app('translator')->get('(Old Levels will Remove After Generate)'); ?></small>
                                </label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="description referral-desc">
                                            <div class="row">
                                                <div class="col-md-12 planDescriptionContainer">

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block my-3"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('style'); ?>
<style>
  
    .form-control:focus{
            border: 2px solid #4aa276;
            box-shadow: none;
        }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            "use strict";

            var max = 1;
            $(document).ready(function() {
                $(".generate").on('click', function() {

                    var levelGenerate = $(this).parents('.parent').find('.levelGenerate').val();
                    var a = 0;
                    var val = 1;
                    var viewHtml = '';
                    if (levelGenerate !== '' && levelGenerate > 0) {
                        $(this).parents('.parent').find('.levelForm').removeClass('d-none');
                        $(this).parents('.parent').find('.levelForm').addClass('d-block');

                        for (a; a < parseInt(levelGenerate); a++) {
                            viewHtml += `<div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text no-right-border">LEVEL</span>
                            </div>
                            <input name="level[]" class="form-control margin-top-10 no-left-border width-120" type="number" readonly value="${val++}" required placeholder="Level">
                            <input name="required[]" class="form-control margin-top-10" type="text" required placeholder="<?php echo app('translator')->get("Required"); ?>">
                            <input name="percent[]" class="form-control margin-top-10" type="text" required placeholder="<?php echo app('translator')->get("Percentage %"); ?>">
                            <span class="input-group-btn">
                            <button class="btn btn-danger btn-sm margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button></span>
                            </div>`;
                        }
                        $(this).parents('.parent').find('.planDescriptionContainer').html(viewHtml);

                    } else {
                        alert('Level Field Is Required');
                    }
                });

                $(document).on('click', '.delete_desc', function() {
                    $(this).closest('.input-group').remove();
                });
            });


        });
    </script>
    
<?php $__env->stopPush(); ?>



<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/referral/index.blade.php ENDPATH**/ ?>