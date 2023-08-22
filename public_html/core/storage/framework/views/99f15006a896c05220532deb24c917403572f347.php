<?php $__env->startSection('title', __('Google Login Setup | Freeloot')); ?>
<?php $__env->startSection('page-title', __('Site Authentication Setting')); ?>

<div>
    <div class="card shadow-sm" style="border:none;">
        <div class="card-header" style="border:none;">
            <h2 style="margin-top:10px;"class="card-title"><?php echo app('translator')->get('Google Login Setup'); ?> </h2>
        </div>
        <div class="card-body" style="border:none;">
            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-check">
                            <input type="checkbox" 
                            class="form-check-input" 
                            id="setting.enable_google_auth" 
                            wire:model="setting.enable_google_auth" 
                            <?php if(set('enable_google_auth')): ?> checked <?php endif; ?> />
                            <label for="setting.enable_google_auth" class="form-check-inputform-check-label"><?php echo app('translator')->get('Enable Google Authentication'); ?></label>
                        </div>
                        <div class="form-group">
                            <label style="margin-top:15px;margin-bottom:8px;" for="google_client_id">Google Client ID</label>
                            <input type="text" class="form-control" wire:model="setting.google_client_id" value="<?php echo e(set('google_client_id', '***********')); ?>" />
                        </div>
                        <div class="form-group">
                            <label  style="margin-top:15px;margin-bottom:8px;"for="google_secret_key">Google secret key</label>
                            <input type="text" class="form-control" wire:model="setting.google_secret_key" value="<?php echo e(set('google_secret_key', '***********')); ?>" />
                        </div>
                        <div class="form-group">
                            <label style="margin-top:15px;margin-bottom:8px;"for="google_secret_key">Google callback URL</label>
                            <input type="text" class="form-control disabled" readonly value="<?php echo e(url('auth/google/callback')); ?>" />
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>

                <div class="my-3 text-center">
                    <button type="submit" class="btn btn-success" style="box-shadow:none;background:#4aa276;border-color:#4aa276;">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/setting/authentication.blade.php ENDPATH**/ ?>