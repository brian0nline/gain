
    <div class="container card pt-100 pb-100" id="twofaauth" style="border-radius:10px;">
        <div class="row justify-content-center mt-4">
            <div class="col-12 ">
                <?php if(Auth::user()->ts): ?>
                    <div class="card card" style="border:none">
                        
                        <div class="card-body" style="border:none" >
                            <div class="form-group mx-auto text-center">
                                <a href="#0" class="btn btn-block btn-lg btn-danger" style="box-shadow: none;font-size:14px;" data-bs-toggle="modal"
                                    data-bs-target="#disableModal">
                                    <?php echo app('translator')->get('Disable 2FA'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card card" style="border-radius:0px;border:none;">
                       
                        <div class="card-body"  style="border:none">
                            <div class="form-group">
                                <div class="input-group input-group w-75 mx-auto mb-3">
                                    <input type="text" name="key" value="<?php echo e($secret); ?>"
                                        class="form-control m-0 rounded-0" id="referralURL" readonly>
                                    <span class="input-group-text copytext" id="copyBoard"> <i class="fa fa-copy"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mx-auto text-center">
                                <img class="mx-auto" style="width:142px" src="<?php echo e($qrCodeUrl); ?>">
                            </div>
                            <div class="form-group mx-auto text-center">
                                <a href="#0" class="btn btn-primary btn-lg mt-3 mb-1" style="box-shadow:none;font-size:14px;" data-bs-toggle="modal"
                                    data-bs-target="#enableModal"><?php echo app('translator')->get('Enable 2FA'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-12">
                <div class="card card" style="border:none" >
                    
                    <div class=" card-body text-center">
                        <p></p>
                        <a  style="box-shadow:none;"
                            href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en"
                            target="_blank">
                            <img src="<?php echo e(asset('asset/img/getitonplaystore2fa.svg')); ?>">
                        
                            
                            </a>
                    </div>
                </div><!-- //. single service item -->
            </div>
        </div>
    </div>



    <!--Enable Modal -->
    <div id="enableModal" class="modal fade" role="dialog">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content bg--dark">
                <div class="modal-header" style="border-bottom: 1px solid #35515F;">
                    <h4 class="modal-title"><?php echo app('translator')->get('Verify Your Otp'); ?></h4>
                    
                </div>
                <form action="<?php echo e(route('user.twofactor.enable')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body ">
                        <div class="form-group">
                            <input type="hidden" name="key" value="<?php echo e($secret); ?>">
                            <input type="text" class="form-control" name="code"
                                placeholder="<?php echo app('translator')->get('Enter Google Authenticator Code'); ?>">
                        </div>
                    </div>
                    <div class="modal-footer"  style="border-top: 1px solid #35515F;">
                        <button type="button" class="btn btn--secondary" data-bs-dismiss="modal" style="background:#4D6D7D;border-color:#4D6D7D;box-shadow:none;color:#fff;"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn-primary" style="background:#6FB99F;border-color:#6FB99F;box-shadow:none;" ><?php echo app('translator')->get('Verify'); ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!--Disable Modal -->
    <div id="disableModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content bg--dark">
                <div class="modal-header"  style="border-bottom: 1px solid #35515F;">
                    <h4 class="modal-title"><?php echo app('translator')->get('Verify Your Otp'); ?></h4>
                    
                </div>
                <form action="<?php echo e(route('user.twofactor.disable')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="code"
                                placeholder="<?php echo app('translator')->get('Enter Google Authenticator Code'); ?>">
                        </div>
                    </div>
                    <div class="modal-footer"  style="border-top: 1px solid #35515F;">
                        <button type="button" class="btn btn--secondary" data-bs-dismiss="modal" style="background:#4D6D7D;border-color:#4D6D7D;box-shadow:none;color:#fff;"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn-primary" style="background:#6FB99F;border-color:#6FB99F;box-shadow:none;" ><?php echo app('translator')->get('Disable'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php $__env->startPush('style'); ?>
    <style>
        .copytext {
            cursor: pointer;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";

            $('.copytext').on('click', function() {
                var copyText = document.getElementById("referralURL");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                iziToast.success({
                    message: "Copied: " + copyText.value,
                    position: "topRight"
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/user/twofactor.blade.php ENDPATH**/ ?>