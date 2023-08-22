<?php $__env->startSection('title', __('General Settings')); ?>

<?php $__env->startPush('style'); ?>
<style>
    .btn.btn-dark.btn-sm.active.toggle-off{
        background: #c82333 !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-title', __('General')); ?>
<div>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="margin-top:10px;" class="card-title"><?php echo app('translator')->get('Manage Website'); ?> </h2>

                    </div>
                    <div class="card-body" wire:ignore>
                        <!-- start form for validation -->
                        <form id="demo-form" action="<?php echo e(route('moder.update.setting.control')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Currency'); ?></label>
                                        <input class="form-control" type="text" name="cur_text" wire:model="setting.cur_text" />
                                    </div>
                                    <div class="form-group ">
                                        <label style="margin-top:10px;"><?php echo app('translator')->get('Currency Symbol'); ?> </label>
                                        <input class="form-control" type="text" name="cur_sym" wire:model="setting.cur_sym" />
                                    </div>
                                   

                                    <div class="form-group">
                                        <label style="margin-top:10px;" class=""> <?php echo app('translator')->get('Timezone'); ?></label>
                                        <select name="updateTimezone" class="form-control" wire:model="updateTimezone">
                                            <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="'<?php echo e(@$timezone); ?>'">
                                                    <?php echo e(__($timezone)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-top:10px;"><?php echo app('translator')->get('User Registration'); ?></label>
                                        <br>
                                        <input type="checkbox" <?php if($setting['registration']): ?>  checked <?php endif; ?> data-onstyle="success" data-offstyle="danger"   name="registration" />
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-top:10px;"><?php echo app('translator')->get('Force SSL'); ?></label>
                                        <br>
                                        <input type="checkbox" <?php if($setting['force_ssl']): ?>  checked <?php endif; ?> data-onstyle="success" data-offstyle="danger"   name="force_ssl" />
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label style="margin-top:10px;"><?php echo app('translator')->get('Withdraw Status'); ?></label>
                                        <br>
                                        <input type="checkbox" <?php if($setting['withdraw_status']): ?>  checked <?php endif; ?> data-onstyle="success" data-offstyle="danger" name="withdraw_status" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label ><?php echo app('translator')->get('Force Secure Password'); ?></label>
                                        <br>
                                        <input style="margin-top:10px;" type="checkbox" <?php if($setting['secure_password']): ?>  checked <?php endif; ?> data-onstyle="success" data-offstyle="danger"   name="secure_password"/>
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-top:10px;"> <?php echo app('translator')->get('Email Verification'); ?></label>
                                        <br>
                                        <input type="checkbox" <?php if($setting['ev']): ?> checked <?php endif; ?> data-onstyle="success" data-offstyle="danger"   name="ev" />
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-top:10px;"><?php echo app('translator')->get('Email Notification'); ?></label>
                                        <br>
                                        <input type="checkbox" <?php if($setting['en']): ?>  checked <?php endif; ?> data-onstyle="success" data-offstyle="danger"   name="en" />
                                    </div>
                                    
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="<?php echo app('translator')->get('Save'); ?>" style="margin-top:20px;box-shadow:none;" disabled />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startSection('checkbox', true); ?>
<?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/admin/setting/setup.blade.php ENDPATH**/ ?>