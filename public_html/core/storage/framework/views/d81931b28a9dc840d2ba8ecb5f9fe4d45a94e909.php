<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo e(route('moder.gateway.list')); ?>"
                        class="btn btn-sm btn-primary box-shadow1 text-small float-start"><i
                            class="fa fa-fw fa-backward"></i><?php echo app('translator')->get('Go
                        Back'); ?></a>
                    <h3 class="card-title text-center"><?php echo e(__($gateway->name)); ?> Gateway</h3>
                </div>
                <form action="<?php echo e(route('moder.gateway.automatic.update', $gateway->code)); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="alias" value="<?php echo e($gateway->alias); ?>">
                    <input type="hidden" name="description" value="<?php echo e($gateway->description); ?>">

                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.image','data' => ['src' => ''.e(getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size'])).'','height' => '100']]); ?>
<?php $component->withName('bs::image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['src' => ''.e(getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size'])).'','height' => '100']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="form-group col-md-6 my-2">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'file','name' => 'image','class' => 'form-control','id' => 'image','accept' => '.png, .jpg, .jpeg']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'file','name' => 'image','class' => 'form-control','id' => 'image','accept' => '.png, .jpg, .jpeg']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <label for="image" class="bg-primary form-label"><i
                                            class="fa fa-pencil"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $__env->make('admin.gateway.parties.global-setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <hr />
                            <div class="container">
                                <h3 class="text-center"> Currencies Setting For <?php echo e($gateway->name); ?> </h3>
                                <p><?php echo e(__($gateway->description)); ?></p>
                            </div>
                            <?php echo $__env->make(
                                'admin.gateway.parties.enabled-currencies'
                            , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <select class="newCurrencyVal form-control w-75 w-sm-100">
                                    <option value=""><?php echo app('translator')->get('Select currency'); ?></option>
                                    <?php $__empty_1 = true; $__currentLoopData = $supportedCurrencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency => $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($currency); ?>" data-symbol="<?php echo e($symbol); ?>">
                                            <?php echo e(__($currency)); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo app('translator')->get('No available currency support'); ?></option>
                                    <?php endif; ?>
                                </select>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary newCurrencyBtn"
                                        data-crypto="<?php echo e($gateway->crypto); ?>"
                                        data-name="<?php echo e($gateway->name); ?>"><?php echo app('translator')->get('Add new'); ?>
                                    </button>
                                </div>
                            </div>

                            <?php echo $__env->make('admin.gateway.parties.child-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block py-2">
                                <?php echo app('translator')->get('Update Setting'); ?>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.gateway.parties.confirm-delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('asset/admin/gateway.js')); ?>"></script>
<?php $__env->stopPush(); ?>
</div>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/gateway/edit.blade.php ENDPATH**/ ?>