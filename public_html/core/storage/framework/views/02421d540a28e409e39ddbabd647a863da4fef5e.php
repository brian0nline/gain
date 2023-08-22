<?php $__env->startSection('content'); ?>
    <div class="container card pt-100 pb-100">
        <div class="text-end">
            <a href="<?php echo e(route('ticket')); ?>" class="btn btn-primary btn-sm">
                <?php echo app('translator')->get('My Support Tickets'); ?>
            </a>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card card">
                    <div class="card-body">
                        <form action="<?php echo e(route('ticket.store')); ?>" method="post" enctype="multipart/form-data"
                            onsubmit="return submitUserForm();">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name"><?php echo app('translator')->get('Name'); ?></label>
                                    <input type="text" name="name" value="<?php echo e(@$user->firstname . ' ' . @$user->lastname); ?>"
                                        class="form-control form-control-lg" placeholder="<?php echo app('translator')->get('Enter your name'); ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email"><?php echo app('translator')->get('Email address'); ?></label>
                                    <input type="email" name="email" value="<?php echo e(@$user->email); ?>"
                                        class="form-control form-control-lg" placeholder="<?php echo app('translator')->get('Enter your email'); ?>"
                                        readonly>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="website"><?php echo app('translator')->get('Subject'); ?></label>
                                    <input type="text" name="subject" value="<?php echo e(old('subject')); ?>"
                                        class="form-control form-control-lg" placeholder="<?php echo app('translator')->get('Subject'); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="priority"><?php echo app('translator')->get('Priority'); ?></label>
                                    <select name="priority" class="form-control form-control-lg">
                                        <option value="3"><?php echo app('translator')->get('High'); ?></option>
                                        <option value="2"><?php echo app('translator')->get('Medium'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('Low'); ?></option>
                                    </select>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="inputMessage"><?php echo app('translator')->get('Message'); ?></label>
                                    <textarea name="message" id="inputMessage" rows="6"
                                        class="form-control form-control-lg"><?php echo e(old('message')); ?></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-9 file-upload">
                                    <div class="position-relative">
                                        <input type="file" name="attachments[]" id="inputAttachments"
                                            class="form-control custom--file-upload my-1" />
                                        <label for="inputAttachments"><?php echo app('translator')->get('Attachments'); ?></label>
                                    </div>

                                    <div id="fileUploadsContainer"></div>
                                    <p class="ticket-attachments-message text-muted">
                                        <?php echo app('translator')->get('Allowed File Extensions'); ?>: .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?>, .<?php echo app('translator')->get('png'); ?>,
                                        .<?php echo app('translator')->get('pdf'); ?>, .<?php echo app('translator')->get('doc'); ?>, .<?php echo app('translator')->get('docx'); ?>
                                    </p>
                                </div>

                                <div class="col-sm-1 mt-1">
                                    <button type="button" class="btn btn-primary btn-sm addFile">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="row form-group justify-content-center">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit" id="recaptcha"><i
                                            class="fa fa-paper-plane"></i>&nbsp;<?php echo app('translator')->get('Submit'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.addFile').on('click', function() {
                $("#fileUploadsContainer").append(`
                    <div class="position-relative">
                        <input type="file" name="attachments[]" id="inputAttachments" class="form-control custom--file-upload my-1"/>
                        <label for="inputAttachments"><?php echo app('translator')->get('Attachments'); ?></label>
                    </div>
                `)
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/support/create.blade.php ENDPATH**/ ?>