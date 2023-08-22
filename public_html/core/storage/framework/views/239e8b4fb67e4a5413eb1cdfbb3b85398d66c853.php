<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    
    
    <?php echo $__env->make('layouts.frontend.partial.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <style>
        .cookie-consent-banner {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 2147483645;
        box-sizing: border-box;
        width: 385px;
        max-width: 100%;
        background-color: #242B27;
        border-radius: 15px;
        text-align: start;
    }

    .cookie-consent-banner__inner {
        max-width: 100%;
        margin: 0 auto;
        padding: 25px 20px;
        display:none;
    }

    .cookie-consent-banner__copy {
        margin-bottom: 16px;
    }

    .cookie-consent-banner__actions {
        display: flex;
        gap: 10px;
        justify-content: flex-start;
        flex-wrap: wrap;
    }

    .cookie-consent-banner__header {
        margin-bottom: 15px;
        font-family: "Montserrat", sans-serif, arial;
        font-weight: normal;
        font-size: 17px;
        font-weight: 600;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .cookie-consent-banner__description {
        font-family: "Montserrat", sans-serif, arial;
        font-weight: normal;
        color: #b0b8c6 !important;
        font-size: 11px;
        line-height:1.6;
        letter-spacing: 1px;
    }

    .cookie-consent-banner__cta {
        box-sizing: border-box;
        display: inline-block;
        min-width: 160px;
        padding: 14px;
        border-radius: 7px;
        text-decoration: none;
        text-align: center;
        font-family: "Montserrat", sans-serif, arial;
        font-weight: normal;
        font-size: 13px;
        background-color: #4aa276;
        color: #000;
        font-weight: 500;
    }
    .cookie-consent-banner__cta:hover{
        color: #000;
    }

    .cookie-consent-banner__cta--secondary,
    .cookie-consent-banner__cta--secondary:hover{
        background-color: #3B4740;
        color: #fff;
    }
    
    
    @media (max-width: 490px){
        .cookie-consent-banner{
            width: 90%;
        }
        .cookie-consent-banner__actions{
            justify-content:center;
        }
        .cookie-consent-banner__cta{
            width:100% !important;
        }
    }
    
    /*sound effect*/
    div#sound_notify {
        max-width: 355px;
    }
    
    .alert.sound_alert {
        display: flex;
    }
    
    </style>

    <?php echo $__env->yieldPushContent('css'); ?>
    
</head>

<body>
    <?php echo $__env->make('layouts.frontend.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(isset($slot)): ?>
        <?php echo e($slot); ?>

    <?php else: ?>
        <?php echo $__env->yieldContent('content'); ?>
    <?php endif; ?>
    <?php echo $__env->make('layouts.frontend.partial.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div id="sound_notify" class="fixed-bottom d-none">
        <div class="alert alert-dark sound_alert alert-dismissible fade show p-0" role="alert">
            <audio controls class="sound_player"  autoplay="true">
              <!--<source src="<?php echo e(asset('asset/static/sound/cash.mp3')); ?>" type="audio/mpeg">-->
              Your browser does not support the audio tag.
            </audio>
            <button type="button" class="btn btn-primary btn-sm" id="remove_sound">
              <i class="fas fa-window-close"></i>
            </button>
        </div>
    </div>
    <?php if(!session()->has('cookie_concent')): ?>
    <div class="cookie-consent-banner" id="cookie-banner">
    <div class="cookie-consent-banner__inner">
        <div class="cookie-consent-banner__copy">
            <div class="cookie-consent-banner__header"> <img src="<?php echo e(asset('asset/images/cookie.png')); ?>" style="width: 20px;" alt=""> We use cookies!</div>
            <div class="cookie-consent-banner__description">
                Hi, this website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. 
                The latter will be set only after consent.
            </div>
        </div>

        <div class="cookie-consent-banner__actions"  style="font-size:14px;">
            <a href="javascript:void(0);" onclick="acceptAll();" class="cookie-consent-banner__cta" style="font-size:14px;">
                Accept all
            </a>

            <a href="javascript:void(0);" onclick="rejectAll();" class="cookie-consent-banner__cta cookie-consent-banner__cta--secondary" style="font-size:14px;">
                Reject all
            </a>
        </div>
    </div>
</div>
    <?php endif; ?>


<script> 

     function acceptAll() {
        $("#cookie-banner").fadeOut(800);
        $.ajax({
            url: "<?php echo e(route('set-cookie-concent')); ?>",
            method: "GET",
            data: {
                "cookie_concent": "yes"
            }
        });

    }

    function rejectAll() {
        $("#cookie-banner").fadeOut(800);
        $.ajax({
            url: "<?php echo e(route('set-cookie-concent')); ?>",
            method: "GET",
            data: {
                "cookie_concent": "no"
            }
        });
    }
</script>
 <?php echo $__env->yieldPushContent('script'); ?>
<script>
    $(document).ready(function(){
        //setInterval(function(){
            //console.log("set time");
        //    $.ajax({
        //       type:"GET",
        //       url:"<?php echo e(route('user.offer.check-user-notify')); ?>",
        //       success:function(res){
        //         if(res === true){
        //             // enable sound,
        //             $('.sound_player').get(0).play();
         //            $('#sound_notify').css('disaplay', 'block');
         //        }  
         //      },
        ////    });
       // },5000);
        
        $('#remove_sound').click(function(e){
            e.preventDefault();
            $.ajax({
                type:"GET",
                url:"<?php echo e(route('user.offer.update-user-notify')); ?>",
                data:{disable:true},
                success:function(res){
                    if(res.data === true){
                        $('.sound_player').get(0).stop();
                        $('#sound_notify').css('disaplay', 'none');
                    }
                }
            })
        })
    })
</script>



</body>

</html>
<?php /**PATH E:\laragon\www\gainify\core\resources\views/layouts/frontend/app.blade.php ENDPATH**/ ?>