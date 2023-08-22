<?php $__env->startSection('title', __('Appeareance Settings')); ?>
<?php $__env->startSection('page-title', __('Site General Setting')); ?>

<div>
    <div class="">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;" class="card-title"><?php echo app('translator')->get('Basic Settings'); ?> </h2>
                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form id="demo-form" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteName"><?php echo app('translator')->get('Site Name * :'); ?></label>
                                <input type="text" id="siteName" class="form-control" wire:model="setting.siteName"
                                    value="<?php echo e(set('siteName')); ?>" required />
                            </div>

                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteDescription"><?php echo app('translator')->get('Site Short Descrition *'); ?> :</label>
                                <input type="text" id="siteDescription" class="form-control"
                                    wire:model="setting.siteDescription" data-parsley-trigger="change"
                                    value="<?php echo e(set('siteDescription')); ?>" required />
                            </div>

                            <button type="submit" style="margin-top:20px;" class="btn btn-success btn-block my-2"><?php echo app('translator')->get('Save'); ?></button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;"class="card-title"><?php echo app('translator')->get('SEO Settings'); ?></h2>
                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form id="demo-form2" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteMetaName"><?php echo app('translator')->get('Site Meta Name * :'); ?></label>
                                <input type="text" id="siteMetaName" class="form-control"
                                    wire:model="setting.siteMetaName" value="<?php echo e(set('siteMetaName')); ?>" required />
                            </div>

                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteMetaDescription"><?php echo app('translator')->get('Site Meta Description * :'); ?></label>
                                <textarea id="siteMetaDescription" class="form-control" rows="5"
                                    wire:model="setting.siteMetaDescription" data-parsley-trigger="change" required />
                                <?php echo e(set('siteMetaDescription')); ?>

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteMetaKeywords"><?php echo app('translator')->get('Site Meta Keywords *'); ?> :</label>
                                <input type="text" id="siteMetaKeywords" class="form-control"
                                    wire:model="setting.siteMetaKeywords" data-parsley-trigger="change"
                                    value="<?php echo e(set('siteMetaKeywords')); ?>" required />
                            </div>

                            <button type="submit" class="btn btn-success btn-block my-2"><?php echo app('translator')->get('Save'); ?></button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;" class="card-title"><?php echo app('translator')->get('Social Sharing Settings'); ?></h2>
                    </div>
                    <div class="card-body">
                        <!-- start form for validation -->
                        <form id="demo-form3" data-parsley-validate wire:submit.prevent="saveSocial"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label  style="margin-top:10px;"for="siteSocialName"><?php echo app('translator')->get('Site Social Title * :'); ?></label>
                                <input  style="margin-top:10px;"type="text" id="siteSocialName" class="form-control"
                                    wire:model="setting.siteSocialName" value="<?php echo e(set('siteSocialName')); ?>"
                                    required />
                            </div>

                            <div class="form-group">
                                <label for="siteSocialDescription"<?php echo app('translator')->get('Site Social Description * :'); ?></label>
                                <textarea style="margin-top:10px;" id="siteSocialDescription" class="form-control" rows="5"
                                    wire:model="setting.siteSocialDescription" data-parsley-trigger="change" required />
                                <?php echo e(set('siteSocialDescription')); ?>

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteSocialImage"><?php echo app('translator')->get('Social Image'); ?> * :</label>
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo e(asset('asset/storage/social-img.png')); ?>"
                                            alt="social-image" width="100px" height="100px"
                                            class="mb-5 img-responsive rounded mx-auto d-block bg-light" />
                                    </div>
                                    <div class="col-6">
                                        <input type="file" id="siteSocialImage" class="form-control"
                                            wire:model="setting.siteSocialImage" />
                                        <div wire:loading wire:target=" setting.siteSocialImage"><i
                                            class="spinner-border text-primary"></i>
                                    </div>
                                    <?php $__errorArgs = ['setting.siteSocialImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                    </div>

                    <button type="submit" class="btn btn-success btn-block my-2"><?php echo app('translator')->get('Save'); ?></button>

                    </form>
                    <!-- end form for validations -->

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h2 style="margin-top:10px;"class="card-title"><?php echo app('translator')->get('Logo And Favicon Settings'); ?></h2>
                </div>
                <div class="card-body">
                    <!-- start form for validation -->
                    <form id="demo-form4" data-parsley-validate wire:submit.prevent="saveSiteLogoAndFavicon"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="siteSocialImage"><?php echo app('translator')->get('Site Logo Image'); ?> * :</label>
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?php echo e(asset('asset/storage/logo-img.png')); ?>" alt="logo-image"
                                        width="100px" height="100px"
                                        class="mb-5 img-responsive rounded mx-auto d-block bg-light" />
                                </div>

                                <div class="col-6">
                                    <input type="file" id="siteLogoImage" class="form-control"
                                        wire:model="setting.siteLogoImage" />
                                        <div wire:loading wire:target="setting.siteLogoImage"><i
                                        class="spinner-border text-primary"></i>
                                </div>
                                <?php $__errorArgs = ['setting.siteLogoImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                </div>
                <div class="form-group">
                    <label for="siteSocialImage"><?php echo app('translator')->get('Site Favicon Image'); ?> * :</label>
                    <div class="row">
                        <div class="col-3">
                            <img src="<?php echo e(asset('asset/storage/Favicon-img.png')); ?>" alt="Favicon-image"
                                width="100px" height="100px"
                                class="mb-5 img-responsive rounded mx-auto d-block bg-light" />
                        </div>
                        <div class="col-6">
                            <input type="file" id="siteFaviconImage" class="form-control"
                                wire:model="setting.siteFaviconImage" "/>
                                        <div wire:loading wire:target=" setting.siteFaviconImage"><i
                                class="spinner-border text-primary"></i>
                        </div>
                        <?php $__errorArgs = ['setting.siteFaviconImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-success btn-block my-2"><?php echo app('translator')->get('Save'); ?></button>

            </form>
            <!-- end form for validations -->

        </div>
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 style="margin-top:10px;"class="card-title"><?php echo app('translator')->get('VPS Settings '); ?></h2>
                    </div>
                    <div class="card-body">

                        <!-- start form for validation -->
                        <form id="demo-form" data-parsley-validate wire:submit.prevent="save">
                            <div class="form-group">
                                <label style="margin-top:10px;" for="siteName"><?php echo app('translator')->get('Enable strick VPS Mode'); ?>:</label>
                                <select class="form-control" wire:model="setting.strick_vps">
                                    <option value="1"><?php echo app('translator')->get('Enabled'); ?></option>
                                    <option value="0" <?php if(set('strick_vps')): ?> checked <?php endif; ?>><?php echo app('translator')->get('Disabled'); ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="margin-top:10px;" for="proxycheck_api"><?php echo app('translator')->get('Broxycheck.io API '); ?>* :</label>
                                <input type="text" id="proxycheck_api" class="form-control"
                                    wire:model="setting.proxycheck_api" data-parsley-trigger="change"
                                    value="<?php echo e(set('proxycheck_api')); ?>" required />
                            </div>

                            <button type="submit" class="btn btn-success btn-block my-2"><?php echo app('translator')->get('Save'); ?></button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
    </div>
</div>
</div>
</div>

</div>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('asset/static/iCheck/skins/flat/green.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('asset/static/iCheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/static/parsleyjs/dist/parsley.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/setting/general.blade.php ENDPATH**/ ?>