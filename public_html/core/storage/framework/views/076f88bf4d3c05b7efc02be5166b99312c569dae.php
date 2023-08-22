<?php $__env->startPush('style'); ?>
<style>
    .form-group label{
        color: #000 !important;
    }
    
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', __('Create Withdraw Method | Freeloot')); ?>
<?php $__env->startSection('page-title', __('Create Withdraw Method')); ?>
<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card my-2">
                <form action="<?php echo e(route('moder.withdraw.method.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <a href="<?php echo e(route('moder.withdraw.method.index')); ?>"
                            class="btn btn-sm btn-primary box-shadow1 text-small"style="background:#4aa276;border-color: #4aa276;box-shadow:none;">
                            <i class="fa fa-fw fa-backward"></i> <?php echo app('translator')->get('Go Back'); ?>
                        </a>
                        <div class="payment-method-item">
                            <div class="payment-method-header">
                                <div class="card-header row my-4" >
                                    <div class="avatar-preview col-6">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.image','data' => ['src' => ''.e(getImage('/', imagePath()['withdraw']['method']['size'])).'','height' => '50']]); ?>
<?php $component->withName('bs::image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['src' => ''.e(getImage('/', imagePath()['withdraw']['method']['size'])).'','height' => '50']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                    <div class="custom-file col-6">
                                        <input type="file" name="image" class="form-control" id="image"
                                            accept=".png, .jpg, .jpeg" />
                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo app('translator')->get('Choose Method
                                            Image'); ?> </label>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('Method Name'); ?>"
                                            name="name" value="<?php echo e(old('name')); ?>" />
                                     
                                    </div>
                                    <div class="row my-4" style="border-color:#242b27;background:#242b27;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100" style="color:#fff !important;"><?php echo app('translator')->get('Currency'); ?> <span
                                                        class="text-danger">*</span></label>

                                                <div class="input-group">
                                                    <input type="text" name="currency" class="form-control border-radius-5"
                                                        value="<?php echo e(old('currency')); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100" style="color:#fff !important;"><?php echo app('translator')->get('Rate'); ?> <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group has_append">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;">1 <?php echo e(__($general->cur_text)); ?> =
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0" name="rate"
                                                        value="<?php echo e(old('rate')); ?>" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;"><span class="currency_symbol"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="w-100"style="color:#fff !important;"><?php echo app('translator')->get('Processing Time'); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="delay" class="form-control border-radius-5"
                                                    value="<?php echo e(old('delay')); ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="row">
                                    <div class="col-lg-6"  style="background: #242b27;">
                                        <div class="card mb-2">
                                            <h5 class="card-header"><?php echo app('translator')->get('Range'); ?></h5>
                                            <div class="card-body">
                                                <div class="input-group has_append mb-3">
                                                    <label class="w-100"><?php echo app('translator')->get('Minimum Amount'); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="min_limit"
                                                        placeholder="0" value="<?php echo e(old('min_limit')); ?>" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;"> <?php echo e(__($general->cur_text)); ?> </div>
                                                    </div>
                                                </div>
                                                <div class="input-group has_append">
                                                    <label class="w-100"><?php echo app('translator')->get('Maximum Amount'); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="0"
                                                        name="max_limit" value="<?php echo e(old('max_limit')); ?>" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary" style="background:#3B4740;border-color:#3B4740;"> <?php echo e(__($general->cur_text)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6"  style="background: #242b27;">
                                        <div class="card ">
                                            <h5 class="card-header"><?php echo app('translator')->get('Charge'); ?></h5>
                                            <div class="card-body">
                                                <div class="input-group has_append mb-3">
                                                    <label class="w-100"><?php echo app('translator')->get('Fixed Charge'); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="0"
                                                        name="fixed_charge" value="<?php echo e(old('fixed_charge')); ?>" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;"> <?php echo e(__($general->cur_text)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group has_append">
                                                    <label class="w-100"><?php echo app('translator')->get('Percent Charge'); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="0"
                                                        name="percent_charge" value="<?php echo e(old('percent_charge')); ?>">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text btn-primary"  style="background:#3B4740;border-color:#3B4740;">%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"  style="background: #242b27;">
                                        <div class="card my-2">

                                            <h5 class="card-header"><?php echo app('translator')->get('Instructions'); ?> </h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <textarea rows="5" class="form-control border-radius-5 nicEdit"
                                                        name="instruction"><?php echo e(old('instruction')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12"  style="background: #242b27;">
                                        <div class="card my-2">
                                            <h5 class="card-header"><?php echo app('translator')->get('User data'); ?>
                                                <button type="button" class="btn btn-sm btn-dark addUserData" style="background:#242B27;border-color:#242B27;box-shadow:none;">
                                                    <i class="fas fa-fw fa-plus"></i><?php echo app('translator')->get('Add New'); ?>
                                                </button>
                                            </h5>

                                            <div class="card-body">
                                                <div class="row addedField">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                           
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block" style="background:#4aa276;border-color:#4aa276;box-shadow:none;" ><?php echo app('translator')->get('Save Method'); ?></button>
                    </div>
                </form>
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
        (function($) {
            "use strict";
            $('input[name=currency]').on('input', function() {
                $('.currency_symbol').text($(this).val());
            });
            $('.addUserData').on('click', function() {
                var html = `
                    <div class="col-md-12 user-data">
                        <div class="form-group">
                            <div class="input-group mb-md-0 mb-4">
                                <div class="col-md-4">
                                    <input name="field_name[]" class="form-control" type="text" required placeholder="<?php echo app('translator')->get('Field Name'); ?>">
                                </div>
                                <div class="col-md-3 mt-md-0 mt-2">
                                    <select name="type[]" class="form-control">
                                        <option value="text" > <?php echo app('translator')->get('Input Text'); ?> </option>
                                        <option value="textarea" > <?php echo app('translator')->get('Textarea'); ?> </option>
                                        <option value="file"> <?php echo app('translator')->get('File'); ?> </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-md-0 mt-2">
                                    <select name="validation[]"
                                            class="form-control">
                                        <option value="required"> <?php echo app('translator')->get('Required'); ?> </option>
                                        <option value="nullable">  <?php echo app('translator')->get('Optional'); ?> </option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-md-0 mt-2 text-right">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger btn-lg removeBtn w-100" type="button" style="box-shadow:none;">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>`;

                $('.addedField').append(html);
            });

            $(document).on('click', '.removeBtn', function() {
                $(this).closest('.user-data').remove();
            });
            <?php if(old('currency')): ?>
                $('input[name=currency]').trigger('input');
            <?php endif; ?>
        })(jQuery);
    </script>
    <?php $__env->startSection('editor', true); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/withdraw/create.blade.php ENDPATH**/ ?>