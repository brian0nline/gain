<?php $__env->startSection('title', __('Create new manual payment')); ?>
<?php $__env->startSection('page-title', __('Create new manual payment')); ?>
<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="<?php echo e(route('moder.gateway.manual.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <div class="payment-method-item">
                            <div class="payment-method-header">
                                <div class="card-header">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.image','data' => ['src' => ''.e(getImage(imagePath()['gateway']['path'], imagePath()['gateway']['size'])).'','height' => '50']]); ?>
<?php $component->withName('bs::image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['src' => ''.e(getImage(imagePath()['gateway']['path'], imagePath()['gateway']['size'])).'','height' => '50']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                    <div class="form-group my-3 float-start">
                                        <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg"
                                               class="form-control w-75" readonly/>
                                    </div>
                                </div>

                                <div class="content">
                                    <div class="row mt-4 mb-none-15">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold"><?php echo app('translator')->get('Gateway Name'); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control "
                                                       placeholder="<?php echo app('translator')->get('Method Name'); ?>" name="name"
                                                       value="<?php echo e(old('name')); ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold"><?php echo app('translator')->get('Currency'); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="currency" placeholder="<?php echo app('translator')->get('Currency'); ?>"
                                                       class="form-control border-radius-5"
                                                       value="<?php echo e(old('currency')); ?>"
                                                       required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <label class="w-100 font-weight-bold"><?php echo app('translator')->get('Rate'); ?> <span
                                                    class="text-danger">*</span></label>

                                            <div class="input-group has_append">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">1 <?php echo e(__($general->cur_text)); ?> =
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="0" name="rate"
                                                       value="<?php echo e(old('rate')); ?>" required/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="currency_symbol"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3">
                                <div class="row">

                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card">
                                            <h5 class="card-header"><?php echo app('translator')->get('Range'); ?></h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold"><?php echo app('translator')->get('Minimum Amount'); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><?php echo e(__($general->cur_sym)); ?>

                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" name="min_limit"
                                                           placeholder="0" value="<?php echo e(old('min_limit')); ?>" required/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold"><?php echo app('translator')->get('Maximum Amount'); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><?php echo e(__($general->cur_sym)); ?>

                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0"
                                                           name="max_limit" value="<?php echo e(old('max_limit')); ?>" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card">
                                            <h5 class="card-header"><?php echo app('translator')->get('Charge'); ?></h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold"><?php echo app('translator')->get('Fixed Charge'); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><?php echo e(__($general->cur_sym)); ?>

                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0"
                                                           name="fixed_charge" value="<?php echo e(old('fixed_charge')); ?>"
                                                           required/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold"><?php echo app('translator')->get('Percent Charge'); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><?php echo app('translator')->get('%'); ?></div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0"
                                                           name="percent_charge" value="<?php echo e(old('percent_charge')); ?>"
                                                           required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <h5 class="card-header"><?php echo app('translator')->get('Deposit Instruction'); ?></h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <textarea rows="8" class="form-control border-radius-5"
                                                              name="instruction" id="content"
                                                              required><?php echo e(old('instruction')); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header"><?php echo app('translator')->get('User data'); ?>
                                                <button type="button"
                                                        class="btn btn-sm btn-dark float-right addUserData"><i
                                                        class="fas fa-fw fa-plus"></i><?php echo app('translator')->get('Add New'); ?>
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
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block"><?php echo app('translator')->get('Save Method'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $__env->startPush('style'); ?>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('script'); ?>
        <script src="<?php echo e(asset('asset/admin/gateway.js')); ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(function () {
                $('#content').summernote({
                    height: 100, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false,
                    callbacks: {
                        onChange: function (contents, $editable) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('page.content', contents);
                        }
                    }
                })
            })
        </script>
    <?php $__env->stopPush(); ?>
</div>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/gateway/manual/create.blade.php ENDPATH**/ ?>