<?php $__env->startSection('title', __('Email Configuration | Freeloot')); ?>
<?php $__env->startSection('page-title', __('Email Config')); ?>
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 style="margin-top:10px;" class="card-title"><?php echo app('translator')->get('Email-Sender Setup'); ?></h4>
                </div>
                <form wire:submit.prevent="update">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <select wire:model="emailMethod" class="form-control">
                                    <option value="php" <?php if($setting['name'] == 'php'): ?> selected <?php endif; ?>>
                                        <?php echo app('translator')->get('PHP Mail'); ?>
                                    </option>
                                    <option value="smtp" <?php if($setting['name'] == 'smtp'): ?> selected <?php endif; ?>>
                                        <?php echo app('translator')->get('SMTP'); ?>
                                    </option>
                                    <option value="sendgrid" <?php if($setting['name'] == 'sendgrid'): ?> selected <?php endif; ?>>
                                        <?php echo app('translator')->get('SendGrid API'); ?>
                                    </option>
                                    <option value="mailjet" <?php if($setting['name'] == 'mailjet'): ?> selected <?php endif; ?>>
                                        <?php echo app('translator')->get('Mailjet
                                        API'); ?>
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 text-right">
                                <h6 class="mb-4">&nbsp;</h6>
                                <button type="button" data-target="#testMailModal" data-toggle="modal"
                                    class="btn btn-primary" style="background:#e84b3c;border-color: #e84b3c;box-shadow:none;"><?php echo app('translator')->get('Send Test Mail'); ?></button>
                            </div>
                        </div>
                        <div>
                            <?php if($emailMethod == 'smtp'): ?>
                                <div class="row mt-4 configForm" id="smtp">
                                    <div class="col-md-12">
                                        <h6 class="mb-2"><?php echo app('translator')->get('SMTP Configuration'); ?></h6>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-bold"><?php echo app('translator')->get('Host'); ?> <span
                                                class="text-danger">*</span></label>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','model' => 'setting.host']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','model' => 'setting.host']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-bold"><?php echo app('translator')->get('Port'); ?> <span
                                                class="text-danger">*</span></label>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'number','model' => 'setting.port']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'number','model' => 'setting.port']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="font-weight-bold"><?php echo app('translator')->get('Encryption'); ?></label>
                                        <select class="form-control" wire:model="setting.enc">
                                            <option value="ssl"><?php echo app('translator')->get('SSL'); ?></option>
                                            <option value="tls"><?php echo app('translator')->get('TLS'); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="margin-top:10px;" class="font-weight-bold"><?php echo app('translator')->get('Username'); ?> <span
                                                class="text-danger">*</span></label>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','model' => 'setting.username']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','model' => 'setting.username']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="margin-top:10px;" class="font-weight-bold"><?php echo app('translator')->get('Password'); ?> <span
                                                class="text-danger">*</span></label>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'password','model' => 'setting.password']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'password','model' => 'setting.password']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif($emailMethod == 'sendgrid'): ?>
                                <div class="form-row mt-4 configForm" id="sendgrid">
                                    <div class="col-md-12">
                                        <h6 class="mb-2"><?php echo app('translator')->get('SendGrid API Configuration'); ?></h6>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label><?php echo app('translator')->get('App Key'); ?> <span class="text-danger">*</span></label>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','model' => 'setting.appkey']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','model' => 'setting.appkey']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif($emailMethod == 'mailjet'): ?>
                                <div class="row mt-4 configForm" id="mailjet">
                                    <div class="col-md-12">
                                        <h6 class="mb-2"><?php echo app('translator')->get('Mailjet API Configuration'); ?></h6>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold"><?php echo app('translator')->get('Api Public Key'); ?> <span
                                                class="text-danger">*</span></label>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','model' => 'setting.public_key']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','model' => 'setting.public_key']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold"><?php echo app('translator')->get('Api Secret Key'); ?> <span
                                                class="text-danger">*</span></label>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','model' => 'setting.secret_key']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','model' => 'setting.secret_key']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-success mr-2" style="background:#4aa276;border-color: #4aa276;box-shadow:none;" disabled><?php echo app('translator')->get('Update'); ?></button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>


    </div>


    
    <div id="testMailModal" class="modal fade" tabindex="-1" role="dialog" wire:ignore>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #242B27;box-shadow:none;">
                    <h5 class="modal-title"><?php echo app('translator')->get('Mail testing'); ?></h5>
                    <button type="button" class="close btn btn-primary btn-sm" data-dismiss="modal" aria-label="Close" style="background: #121714;border-color:#121714;border-radius:20px;box-shadow:none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="sendTest()">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" wire:model="setting.id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label><?php echo app('translator')->get('Send Email to'); ?> <span class="text-danger">*</span></label>
                                <input type="email" wire:model="testEmail" class="form-control"
                                    placeholder="<?php echo app('translator')->get('Email Address'); ?>" required>
                                <?php $__errorArgs = ['testEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="test-danger"><?php echo e($message); ?> </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #242B27;box-shadow:none;">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" style="background:#3B4740;border-color: #3B4740;box-shadow:none;"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn-success" style="background:#4aa276;border-color: #4aa276;box-shadow:none;" disabled><?php echo app('translator')->get('Send'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        (function() {
            window.addEventListener('hideModal', (event) => {
                $('#testMailModal').modal('hide');
            });
        });
    </script>
</div>
<?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/admin/email/config.blade.php ENDPATH**/ ?>