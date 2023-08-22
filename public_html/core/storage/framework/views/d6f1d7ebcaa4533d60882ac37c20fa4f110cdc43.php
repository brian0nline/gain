
<?php $__env->startSection('title', __('Create Offerwall')); ?>
<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <?php echo app('translator')->get('Create Offerwall'); ?>
            </h3>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('moder.offer.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">   
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'file','name' => 'image','label' => __('Offerwall Logo'),'placeholder' => __('Offerwall Logo')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'file','name' => 'image','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Offerwall Logo')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Offerwall Logo'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />
                                
                            </div>
                            <div class="col-md-6">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'name','value' => ''.e(old('name')).'','label' => __('Offerwall Name'),'style' => 'box-shadow:none;border-color:#4aa276;','placeholder' => __('Offerwall Name')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'name','value' => ''.e(old('name')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Offerwall Name')),'style' => 'box-shadow:none;border-color:#4aa276;','placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Offerwall Name'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />

                            </div>
                            
                            <div class="col-md-12">
                                <div class="card border-info">
                                    <div class="card-body">
                                        <code  style="color:#e84b3c">
                                            https://surveywall.wannads.com?apiKey=[API_KEY]&userId=[USER_ID]"
                                        </code>
                                        <p class="card-text">
                                            <?php echo app('translator')->get('This is an example of Offerwall URL,'); ?><br>
                                            <?php echo app('translator')->get('You have to change the'); ?> <b>[API_KEY]</b> <?php echo app('translator')->get('with'); ?> <i><?php echo app('translator')->get('your public api key'); ?></i> <?php echo app('translator')->get('and'); ?>
                                            <b>[USER_ID]</b> <?php echo app('translator')->get('with'); ?> <i>subId</i> <br>
                                            <?php echo app('translator')->get('be look like'); ?>
                                            <br>
                                            <code  style="color:#e84b3c">
                                                https://surveywall.wannads.com?apiKey=xxxxxxxx&userId=subId
                                            </code>
                                        </p>
                                    </div>
                                </div>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'iframe_url','value' => ''.e(old('iframe_url')).'','label' => __('Offerwall Iframe URL'),'style' => 'box-shadow:none;border-color:#4aa276;','placeholder' => 'Ex:https://surveywall.wannads.com?apiKey=xxxxxxxx&userId=subId','help' => __('Please, Add the Offerwall URL with the required user identifier inside  {user} without any other parameters')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'iframe_url','value' => ''.e(old('iframe_url')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Offerwall Iframe URL')),'style' => 'box-shadow:none;border-color:#4aa276;','placeholder' => 'Ex:https://surveywall.wannads.com?apiKey=xxxxxxxx&userId=subId','help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Please, Add the Offerwall URL with the required user identifier inside  {user} without any other parameters'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-info">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo app('translator')->get('The postback url setup,'); ?><br>
                                            <?php echo app('translator')->get('postback will receive specific Parameters.'); ?>
                                            <br>
                                            <?php echo app('translator')->get('Here you have to define them.'); ?>
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="box-shadow:none;border-color:#4aa276;">
                                    <label for="endpoint"><?php echo app('translator')->get('The postback endpoint:'); ?></label>
                                    <div class="d-flex">
                                        <input type="text" value="<?php echo e(url('offers/custom/callback')); ?>/" class="form-control w-75"
                                            readonly disabled />
                                        <input type="text" name="endpoint" class="form-control w-25" style="box-shadow:none;border-color:#4aa276;"
                                            value="<?php echo e(old('endpoint')); ?>" />
                                    </div>
                                    <small><?php echo app('translator')->get('Choose random and hard words to be guess'); ?></small>
                                </div>
                                <br />
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'response','value' => ''.e(old('response')).'','placeholder' => 'ok','label' => __('Postback Response'),'style' => 'box-shadow:none;border-color:#4aa276;','help' => __('some of offerwalls postack needs spacific response Ex: Ok, 1')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'response','value' => ''.e(old('response')).'','placeholder' => 'ok','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Postback Response')),'style' => 'box-shadow:none;border-color:#4aa276;','help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('some of offerwalls postack needs spacific response Ex: Ok, 1'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br>

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'signature','value' => ''.e(old('signature')).'','label' => __('Signature identification parametar on postback url'),'style' => 'box-shadow:none;border-color:#4aa276;','placeholder' => 'signature','help' => __('that can be used to verify that the call has been made from offerwall site.')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'signature','value' => ''.e(old('signature')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Signature identification parametar on postback url')),'style' => 'box-shadow:none;border-color:#4aa276;','placeholder' => 'signature','help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('that can be used to verify that the call has been made from offerwall site.'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'signature_structure','value' => ''.e(old('signature_structure')).'','label' => __('Signature structure'),'placeholder' => 'md5(userId.rewards.amount) == signature','help' => 'In most cases, It will be look like md5(userId.rewards.amount) == signature']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'signature_structure','value' => ''.e(old('signature_structure')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Signature structure')),'placeholder' => 'md5(userId.rewards.amount) == signature','help' => 'In most cases, It will be look like md5(userId.rewards.amount) == signature']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />
                            </div>
                            <div class="col-md-6">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'secret_key','value' => ''.e(old('secret_key')).'','label' => __('The app secret key'),'placeholder' => 'xxxxxx','style' => 'box-shadow:none;border-color:#4aa276;','help' => __('This will be usd for security verification')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'secret_key','value' => ''.e(old('secret_key')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('The app secret key')),'placeholder' => 'xxxxxx','style' => 'box-shadow:none;border-color:#4aa276;','help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('This will be usd for security verification'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'user_ident','value' => ''.e(old('user_ident')).'','label' => __('User identification parametar on postback url'),'placeholder' => 'subId','style' => 'box-shadow:none;border-color:#4aa276;','help' => __('This is the unique identifier code of the user who completed action on your platform.')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'user_ident','value' => ''.e(old('user_ident')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('User identification parametar on postback url')),'placeholder' => 'subId','style' => 'box-shadow:none;border-color:#4aa276;','help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('This is the unique identifier code of the user who completed action on your platform.'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'amount','value' => ''.e(old('amount')).'','label' => __('Rewards identification parametar on postback url'),'placeholder' => 'amount','style' => 'box-shadow:none;border-color:#4aa276;','help' => __('The rewards to be credited to your user.')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'amount','value' => ''.e(old('amount')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Rewards identification parametar on postback url')),'placeholder' => 'amount','style' => 'box-shadow:none;border-color:#4aa276;','help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('The rewards to be credited to your user.'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'trx','value' => ''.e(old('trx')).'','label' => __('The transtion identification parametar on postback url'),'placeholder' => 'transId','style' => 'box-shadow:none;border-color:#4aa276;','help' => __('Unique identification code of the transaction made by your user on the platform')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'trx','value' => ''.e(old('trx')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('The transtion identification parametar on postback url')),'placeholder' => 'transId','style' => 'box-shadow:none;border-color:#4aa276;','help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Unique identification code of the transaction made by your user on the platform'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'server_ip','value' => ''.e(old('server_ip')).'','label' => __('The offerwall sites server ip'),'placeholder' => '0.0.0.0','style' => 'box-shadow:none;border-color:#4aa276;','help' => __('Some of sites provides IPs to verify the request from them, If the more than one seperate them by comma.')]]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'server_ip','value' => ''.e(old('server_ip')).'','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('The offerwall sites server ip')),'placeholder' => '0.0.0.0','style' => 'box-shadow:none;border-color:#4aa276;','help' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Some of sites provides IPs to verify the request from them, If the more than one seperate them by comma.'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="<?php echo app('translator')->get('Save'); ?>" class="btn btn-primary" style="box-shadow:none;border-color:#4aa276;background:#4aa276;" />
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/system/admin/offer-wall/index.blade.php ENDPATH**/ ?>