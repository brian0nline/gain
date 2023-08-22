<?php $__env->startSection('title', __('Captcha Settings')); ?>
<?php $__env->startSection('page-title', __('Captcha Setting')); ?>

<div>
    <div class="">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2  style="margin-top:10px;"class="card-title"><?php echo app('translator')->get('Basic Settings'); ?> </h2>

                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form class="demo-form" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Enable Captcha on Registration Page'); ?></label>
                                <select wire:model="setting.en_cap_register" class="form-control">
                                    <option value="1"><?php echo app('translator')->get('Enable'); ?></option>
                                    <option <?php if(set('en_cap_register') == '0'): ?> selected="selected" <?php endif; ?> value="0">
                                        <?php echo app('translator')->get('Disable'); ?>
                                    </option>
                                </select>
                                <div class="form-group" style="margin-top:10px;">
                                    <label><?php echo app('translator')->get('Enable Captcha on Login page'); ?></label>
                                    <select wire:model="setting.en_cap_login" class="form-control">
                                        <option value="1"><?php echo app('translator')->get('Enable'); ?></option>
                                        <option <?php if(set('en_cap_login') == '0'): ?> selected="selected" <?php endif; ?> value="0">
                                            <?php echo app('translator')->get('Disable'); ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top:10px;">
                                <label>Default Captcha</label>
                                <select wire:model="setting.default_captcha" class="form-control">
                                    <option value="Recaptcha"> <?php echo app('translator')->get('Recaptcha'); ?></option>
                                    <option value="hcaptcha"
                                        <?php if(set('default_captcha') == 'hcaptcha'): ?> selected="selected" <?php endif; ?>>
                                        <?php echo app('translator')->get('Hcptcha'); ?>
                                    </option>
                                    <option value="raincaptcha"
                                        <?php if(set('default_captcha') == 'raincaptcha'): ?> selected="selected" <?php endif; ?>>
                                        <?php echo app('translator')->get('Rain captcha'); ?>
                                    </option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-success" value="save" style="margin-top:20px;box-shadow:none;background:#4aa276;border-color:#4aa276;" disabled/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;"class="card-title"><?php echo app('translator')->get('Google Recaptcha'); ?> </h2>

                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form class="demo-form" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Recaptcha Public Key'); ?></label>
                                <input type="text" class="form-control" wire:model="setting.re_public_key"
                                    value="<?php echo e(set('re_public_key')); ?>">
                            </div>
                            <div class="form-group" style="margin-top:10px;">
                                <label><?php echo app('translator')->get('Recaptcha Secret Key'); ?></label>
                                <input type="text" class="form-control" wire:model="setting.re_secret_key"
                                    value="<?php echo e(set('re_secret_key')); ?>">
                            </div>
                            <input type="submit" class="btn btn-success" value="<?php echo app('translator')->get('save'); ?>"style="margin-top:20px;box-shadow:none;background:#4aa276;border-color:#4aa276;" disabled/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2  style="margin-top:10px;" class="card-title"><?php echo app('translator')->get('Hcaptcha Setup'); ?> </h2>

                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form class="demo-form" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Hcaptcha Public Key'); ?></label>
                                <input type="text" class="form-control" wire:model="setting.hc_public_key"
                                    value="<?php echo e(set('hc_public_key')); ?>">
                            </div>
                            <div class="form-group" style="margin-top:10px;">
                                <label><?php echo app('translator')->get('Hcaptcha Secret Key'); ?></label>
                                <input type="text" class="form-control" wire:model="setting.hc_secret_key"
                                    value="<?php echo e(set('hc_secret_key')); ?>">
                            </div>
                            <input type="submit" class="btn btn-success" value="<?php echo app('translator')->get('save'); ?>" style="margin-top:20px;box-shadow:none;background:#4aa276;border-color:#4aa276;"disabled />

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2  style="margin-top:10px;" class="card-title"><?php echo app('translator')->get('Rain Captcha Setup'); ?></h2>

                    </div>
                    <div class="card-body">
                        <!-- start form for validation -->
                        <form class="demo-form" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Rain Captcha Public Key'); ?></label>
                                <input type="text" class="form-control" wire:model="setting.rain_public_key"
                                    value="<?php echo e(set('rain_public_key')); ?>">
                            </div>
                            <div class="form-group" style="margin-top:10px;">
                                <label><?php echo app('translator')->get('Rain Captcha Secret Key'); ?></label>
                                <input type="text" class="form-control" wire:model="setting.rain_secret_key"
                                    value="<?php echo e(set('rain_secret_key')); ?>">
                            </div>
                            <input type="submit" class="btn btn-success" value="<?php echo app('translator')->get('save'); ?>" style="margin-top:20px;box-shadow:none;background:#4aa276;border-color:#4aa276;"disabled />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/admin/setting/security.blade.php ENDPATH**/ ?>