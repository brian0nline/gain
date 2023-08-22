<?php $__env->startSection('title', __('Shop Preview')); ?>
<?php $__env->startSection('content'); ?>
    <div class="container card pt-100 pb-100" style="border-radius:20px;">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card card-deposit card" style="border:none;">
                    <h5 class="text-center my-1"><?php echo app('translator')->get('Current Balance'); ?> :
                        <strong><?php echo e(showAmount(auth()->user()->balance)); ?> <?php echo e(__($general->cur_text)); ?></strong>
                    </h5>
                    <div class="card-body mt-4">
                        <div class="container">
                            <div class="row" id="withdraw-preview-section">
                                <div class="col-12 mb-3">
                                    <div class="withdraw-details">
                                        <span class="font-weight-bold"><i class="fa fa-info-circle" style="color:#27ABE0"></i>&nbsp;&nbsp; <?php echo app('translator')->get('Request Amount'); ?> :</span>
                                        <span class="font-weight-bold pull-right"> <?php echo e(showAmount($withdraw->amount)); ?>  <?php echo e(__($general->cur_text)); ?></span>
                                    </div>
                                    <div class="withdraw-details">
                                        <span class="font-weight-bold"><i class="fa fa-info-circle"style="color:#27ABE0"></i>&nbsp;&nbsp; <?php echo app('translator')->get('Withdrawal Charge'); ?> :</span>
                                        <span class="font-weight-bold pull-right"><?php echo e(showAmount($withdraw->charge)); ?> <?php echo e(__($general->cur_text)); ?></span>
                                    </div>
                                    <div class="withdraw-details">
                                        <span class="font-weight-bold"><i class="fa fa-info-circle"style="color:#27ABE0"></i>&nbsp;&nbsp; <?php echo app('translator')->get('After Charge'); ?> :</span>
                                        <span class="font-weight-bold pull-right"><?php echo e(showAmount($withdraw->after_charge)); ?>

                                            <?php echo e(__($general->cur_text)); ?></span>
                                    </div>
                                    <div class="withdraw-details">
                                        <span class="font-weight-bold"><i class="fa fa-info-circle"style="color:#27ABE0"></i>&nbsp;&nbsp; <?php echo app('translator')->get('Conversion Rate'); ?> : 1
                                            <?php echo e(__($general->cur_text)); ?> = </span>
                                        <span class="font-weight-bold pull-right"> <?php echo e(showAmount($withdraw->rate)); ?>

                                            <?php echo e(__($withdraw->currency)); ?></span>
                                    </div>
                                    <div class="withdraw-details">
                                        <span class="font-weight-bold"><i class="fa fa-info-circle"style="color:#27ABE0"></i>&nbsp;&nbsp; <?php echo app('translator')->get('You Will Get'); ?> :</span>
                                        <span class="font-weight-bold pull-right"><?php echo e(showAmount($withdraw->final_amount)); ?>

                                            <?php echo e(__($withdraw->currency)); ?></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <form action="<?php echo e(route('user.withdraw.submit')); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php if($withdraw->method->user_data): ?>
                                            <?php $__currentLoopData = $withdraw->method->user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($v->type == 'text'): ?>
                                                    <div class="form-group">
                                                        <label style="margin-left:10px;margin-bottom:10px"><strong><?php echo e(__($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                                    <span class="text-danger">*</span>
                                                                <?php endif; ?>
                                                            </strong></label>
                                                        <input type="text" name="<?php echo e($k); ?>" class="form-control"
                                                            value="<?php echo e(old($k)); ?>"
                                                            placeholder="<?php echo e(__($v->field_level)); ?>"
                                                            <?php if($v->validation == 'required'): ?> required <?php endif; ?>>
                                                        <?php if($errors->has($k)): ?>
                                                            <span class="text-danger"><?php echo e(__($errors->first($k))); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php elseif($v->type == 'textarea'): ?>
                                                    <div class="form-group">
                                                        <label><strong><?php echo e(__($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                                    <span class="text-danger">*</span>
                                                                <?php endif; ?>
                                                            </strong></label>
                                                        <textarea name="<?php echo e($k); ?>" class="form-control"
                                                            placeholder="<?php echo e(__($v->field_level)); ?>" rows="3"
                                                            <?php if($v->validation == 'required'): ?> required <?php endif; ?>><?php echo e(old($k)); ?></textarea>
                                                        <?php if($errors->has($k)): ?>
                                                            <span class="text-danger"><?php echo e(__($errors->first($k))); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php elseif($v->type == 'file'): ?>
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="file" name="<?php echo e($k); ?>" id="inputAttachments"
                                                                <?php echo e($v->validation == 'required' ? 'required' : null); ?>

                                                                class="form-control custom--file-upload my-1" />
                                                            <label for="inputAttachments"><?php echo e(__($v->field_level)); ?>

                                                                <?php if($v->validation == 'required'): ?>
                                                                    <span class="text-danger">*</span>
                                                                <?php endif; ?>
                                                            </label>
                                                        </div>
    
                                                        <?php if($errors->has($k)): ?>
                                                            <br>
                                                            <span class="text-danger"><?php echo e(__($errors->first($k))); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php if(auth()->user()->ts): ?>
                                            <div class="form-group">
                                                <label style="margin-top:10px;margin-bottom:5px;"><?php echo app('translator')->get('Google Authenticator Code'); ?></label>
                                                <input type="text" name="authenticator_code" class="form-control" required>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group text-center">
                                            <button type="submit"
                                                class="btn btn-primary mt-2 text-center" style="box-shadow:none;"><?php echo app('translator')->get('Confirm'); ?></button>
                                        </div>
                                    </form>
                                </div>
                                 <div class="col-12">
                                    <p class="balance"><?php echo app('translator')->get('Balance Will be'); ?> : <?php echo e(showAmount($withdraw->user->balance - $withdraw->amount)); ?>  <?php echo e(__($general->cur_text)); ?></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/withdraw/preview.blade.php ENDPATH**/ ?>