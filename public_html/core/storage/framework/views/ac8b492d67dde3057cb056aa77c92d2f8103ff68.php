
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 style="font-size:22px;margin-top:5px;"><?php echo app('translator')->get('Anti-fraud System'); ?></h2>

            </div>
            <!-- start form for validation -->
            <form id="demo-form" data-parsley-validate wire:submit.prevent="save">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.check','data' => ['model' => 'name.single_account_per_ip','label' => __('Single account per ip'),'help' => __('Dont let users open more than one account from the same IP')]]); ?>
<?php $component->withName('bs::check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['model' => 'name.single_account_per_ip','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Single account per ip')),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Dont let users open more than one account from the same IP'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <br>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.check','data' => ['model' => 'name.detect_using_vpn','label' => __('Block VPN Access'),'help' => __('Dont let users using VPN, bots, bad IPs')]]); ?>
<?php $component->withName('bs::check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['model' => 'name.detect_using_vpn','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Block VPN Access')),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Dont let users using VPN, bots, bad IPs'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <br>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.check','data' => ['model' => 'name.auto_ban_multiple_accounts','label' => __('Auto ban multiple accounts'),'help' => __('If users try to create more than account will be banned')]]); ?>
<?php $component->withName('bs::check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['model' => 'name.auto_ban_multiple_accounts','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Auto ban multiple accounts')),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('If users try to create more than account will be banned'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <br>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.check','data' => ['model' => 'name.auto_ban_using_vpn','label' => __('Auto ban users who use VPS'),'help' => __('If users try to use VPN will be banned')]]); ?>
<?php $component->withName('bs::check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['model' => 'name.auto_ban_using_vpn','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Auto ban users who use VPS')),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('If users try to use VPN will be banned'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.check','data' => ['model' => 'name.detect_adblock','label' => __('Detect using Adbloks'),'help' => __('Dont let users use adblock extensions and softwares ')]]); ?>
<?php $component->withName('bs::check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['model' => 'name.detect_adblock','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Detect using Adbloks')),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Dont let users use adblock extensions and softwares '))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <br>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','model' => 'name.proxycheck_io_api','label' => __('Your IPQS Api Key')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','model' => 'name.proxycheck_io_api','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Your IPQS Api Key'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        </div>
                    </div>
                    <br>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.textarea','data' => ['model' => 'name.blocked_country','label' => __('Block these countries from access to the Offers '),'placeholder' => __('USA, UK'),'help' => __(
                        'use country code like USA, UK, .. and celebrate them by comma ,leave it blank to undefined',
                    )]]); ?>
<?php $component->withName('bs::textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['model' => 'name.blocked_country','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Block these countries from access to the Offers ')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('USA, UK')),'help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__(
                        'use country code like USA, UK, .. and celebrate them by comma ,leave it blank to undefined',
                    ))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <button type="submit" class="btn btn-success btn-block w-100" style="box-shadow:none;background: #4aa276;border-color:#4aa276;border-radius:10px;" ><?php echo app('translator')->get('Save'); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/system/admin/setup.blade.php ENDPATH**/ ?>