<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="shortcut icon" href="<?php echo e(asset('asset/img/favicon.svg')); ?>" />
<!-- CSRF Token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="description" content=""/>

<title>
    <?php if(View::hasSection('title')): ?>
        <?php echo $__env->yieldContent('title'); ?>
    <?php else: ?>
         <?php if(Auth::check()): ?>
            <?php if(is_null(request()->segment(count(request()->segments())))): ?>
            Gainify
            <?php else: ?>
            <?php echo e(ucwords(request()->segment(count(request()->segments())))); ?> | freeloot
            <?php endif; ?>
        <?php else: ?>
            Gainify
        <?php endif; ?>
    <?php endif; ?>
</title>

<link rel="stylesheet" href="<?php echo e(asset('asset/vendor/wow/animate.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('asset/vendor/fontawesome/css/all.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('asset/vendor/bootstrap/css/bootstrap.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('asset/vendor/toastr/build/toastr.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('asset/css/custom.css?ver=1.0.2')); ?>" />

<?php echo $__env->yieldPushContent('style'); ?>
    <style>
    
.custom-offerwall-style a {
    overflow:hidden;
    margin-top:20px;
}
.row.custom_offers_youmis {
    flex-wrap: nowrap;
    overflow-y: hidden;
    overflow-x: auto;
    padding: 0;
}

.offerwallsposition.custom-offerwall-style {
    display: flex;
    justify-content: start;
    flex-flow: row-reverse;
    overflow: hidden;
    align-items: center;
    cursor: pointer;
}

.row.custom_offers_youmis img {
    width: 22px;
    border-radius: 13px;
}

.modal#youmi_modal img.yomi-modal-img {
    max-width: 75px;
    min-width: 57px !important;
    align-self: flex-start;
    margin: 7px;
}

iframe.embed-responsive-item {
    width: 100%;
    height: 570px;
    overflow-x:auto;
    overflow-y:hidden;
}

div.iframe-loader {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #090c0afa;
    min-height: 720px;
}

span.iframe-loader-line {
    display: block;
    content: '';
    height: 3px;
    background: #4aa276;
    width: 0%;
}

</style>

<?php echo \Livewire\Livewire::styles(); ?>


<?php if (! empty(trim($__env->yieldContent('checkbox')))): ?>
    <link rel="stylesheet" href="<?php echo e(asset('asset/static/checkbox/bootstrap-toggle.min.css')); ?>">
<?php endif; ?>
<script src="<?php echo e(asset('asset/js/jquery.min.js')); ?>"></script>

<?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/layouts/frontend/partial/head.blade.php ENDPATH**/ ?>