<!DOCTYPE html>
<html>

<head>
    <title><?php echo e($pageTitle); ?></title>
    <style>
        .info {
            margin-top: 40px;
            margin-left: 40px;
            margin-bottom: 25px;
        }

        p {
            margin: 0;
            margin-bottom: 10px;
        }

        h4 {
            margin: 0;
            margin-bottom: 10px;
        }

    </style>
</head>

<body>
    <div class="info">
        <h4><?php echo e(__($email->subject)); ?></h4>
        <p><strong><?php echo app('translator')->get('To'); ?>: </strong> <?php echo e($email->email_to); ?></p>
        <p><strong><?php echo app('translator')->get('From'); ?>: </strong> <?php echo e(__($general->sitename)); ?> <?php echo e('<' . $email->email_from . '>'); ?></p>
        <p><strong><?php echo app('translator')->get('Via'); ?>: </strong> <span>@</span><?php echo e(__($email->mail_sender)); ?>

            <?php echo e(showDateTime($email->created_at)); ?></p>
    </div>
    <?php echo $email->message ?>
</body>

</html>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/users/email_details.blade.php ENDPATH**/ ?>