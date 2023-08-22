<?php $__env->startSection('content'); ?>
    <div class="container card pt-100 pb-100">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card">
                    <div class="card-header card-header-bg d-flex flex-wrap justify-content-between align-items-center">
                        <h5 class="card-title mt-0">
                            <?php if($my_ticket->status == 0): ?>
                                <span class="badge badge--success py-2 px-3"><?php echo app('translator')->get('Open'); ?></span>
                            <?php elseif($my_ticket->status == 1): ?>
                                <span class="badge badge--primary py-2 px-3"><?php echo app('translator')->get('Answered'); ?></span>
                            <?php elseif($my_ticket->status == 2): ?>
                                <span class="badge badge--warning py-2 px-3"><?php echo app('translator')->get('Replied'); ?></span>
                            <?php elseif($my_ticket->status == 3): ?>
                                <span class="badge badge--dark py-2 px-3"><?php echo app('translator')->get('Closed'); ?></span>
                            <?php endif; ?>
                            [<?php echo app('translator')->get('Ticket'); ?>#<?php echo e($my_ticket->ticket); ?>] <?php echo e($my_ticket->subject); ?>

                        </h5>
                        <?php if($my_ticket->status != 3): ?>
                        <button class="btn btn-danger btn-sm close-button" type="button" title="<?php echo app('translator')->get('Close Ticket'); ?>"
                            data-toggle="modal" data-target="#DelModal"><i class="fa fa-lg fa-times-circle"></i>
                        </button>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="card bg-transparent">
                                <div class="card-body">
                                    <?php if($my_ticket->status != 3): ?>
                                        <form method="post" action="<?php echo e(route('ticket.reply', $my_ticket->id)); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="replayTicket" value="1">
                                            <div class="row justify-content-between">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea name="message" class="form-control form-control-lg" id="inputMessage" placeholder="<?php echo app('translator')->get('Your Reply'); ?>" rows="4"
                                                            cols="10" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-md-8">
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-11">
                                                            <div class="position-relative">
                                                                <input type="file" name="attachments[]"
                                                                    id="inputAttachments"
                                                                    class="form-control custom--file-upload my-1" />
                                                                <label for="inputAttachments"><?php echo app('translator')->get('Attachments'); ?></label>
                                                            </div>
                                                            <div id="fileUploadsContainer"></div>
                                                            <p class="my-2 ticket-attachments-message text-muted">
                                                                <?php echo app('translator')->get('Allowed File Extensions'); ?>: .<?php echo app('translator')->get('jpg'); ?>,
                                                                .<?php echo app('translator')->get('jpeg'); ?>, .<?php echo app('translator')->get('png'); ?>,
                                                                .<?php echo app('translator')->get('pdf'); ?>,
                                                                .<?php echo app('translator')->get('doc'); ?>, .<?php echo app('translator')->get('docx'); ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group">
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-primary btn-sm mt-1 addFile">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary custom-success mt-1">
                                                        <i class="fa fa-reply"></i> <?php echo app('translator')->get('Reply'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php else: ?>
                                        <h3><?php echo app('translator')->get('Your Ticket closed,'); ?>  
                                            <br />
                                            <?php echo app('translator')->get('You Can'); ?>  <a href="<?php echo e(route('ticket.open')); ?>"><?php echo app('translator')->get('Open new'); ?></a>
                                        </h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-transparent">
                                    <div class="card-body">
                                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($message->admin_id == 0): ?>
                                                <div class="row border border-primary border-radius-3 my-3 py-3 mx-2">
                                                    <div class="col-md-3 border-right text-right">
                                                        <h5 class="my-3"><?php echo e($message->ticket->name); ?></h5>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted font-weight-bold my-3">
                                                            <?php echo app('translator')->get('Posted on'); ?>
                                                            <?php echo e($message->created_at->format('l, dS F Y @ H:i')); ?></p>
                                                        <p><?php echo e($message->message); ?></p>
                                                        <?php if($message->attachments()->count() > 0): ?>
                                                            <div class="mt-2">
                                                                <?php $__currentLoopData = $message->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <a href="<?php echo e(route('ticket.download', encrypt($image->id))); ?>"
                                                                        class="mr-3"><i
                                                                            class="fa fa-file"></i> <?php echo app('translator')->get('Attachment'); ?>
                                                                        <?php echo e(++$k); ?>

                                                                    </a>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="row border border-warning border-radius-3 my-3 py-3 mx-2"
                                                    style="background-color: #ffd96729">
                                                    <div class="col-md-3 border-right text-right">
                                                        <h5 class="my-3"><?php echo e($message->admin->name); ?></h5>
                                                        <p class="lead text-muted"><?php echo app('translator')->get('Staff'); ?></p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="text-muted font-weight-bold my-3">
                                                            <?php echo app('translator')->get('Posted on'); ?>
                                                            <?php echo e($message->created_at->format('l, dS F Y @ H:i')); ?></p>
                                                        <p><?php echo e($message->message); ?></p>
                                                        <?php if($message->attachments()->count() > 0): ?>
                                                            <div class="mt-2">
                                                                <?php $__currentLoopData = $message->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <a href="<?php echo e(route('ticket.download', encrypt($image->id))); ?>"
                                                                        class="mr-3"><i
                                                                            class="fa fa-file"></i> <?php echo app('translator')->get('Attachment'); ?>
                                                                        <?php echo e(++$k); ?>

                                                                    </a>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?php echo e(route('ticket.reply', $my_ticket->id)); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="replayTicket" value="2">
                    <div class="modal-header">
                        <h5 class="modal-title"> <?php echo app('translator')->get('Confirmation'); ?>!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <strong><?php echo app('translator')->get('Are you sure you want to close this support ticket'); ?>?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary btn-sm" data-bs-dismiss="modal"><i
                                class="fa fa-times"></i>
                            <?php echo app('translator')->get('Close'); ?>
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                            <?php echo app('translator')->get('Confirm'); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.delete-message').on('click', function(e) {
                $('.message_id').val($(this).data('id'));

            });
            $('.addFile').on('click', function() {
                $("#fileUploadsContainer").append(
                    `
                    <div class="position-relative">
                        <input type="file" name="attachments[]" id="inputAttachments" class="form-control custom-file-upload my-1"/>
                        <label for="inputAttachments"><?php echo app('translator')->get('Attachments'); ?></label>
                    </div>
                    `
                )
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/support/view.blade.php ENDPATH**/ ?>