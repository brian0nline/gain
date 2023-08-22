<?php $__env->startSection('title', 'Earn | Freeloot'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
           
        </div>
    </div>
</div>
<?php echo $__env->make('system.user.offer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->startPush('style'); ?>
    <style>
         .panel.m-2.dash-offer {
            font-size: 2.2rem !important;
            font-weight: 900;
            text-transform: uppercase;
            color: #2effa8 !important;
            text-align: center;
            width: 100%;
        }
        
        .panel.m-2.dash-offer a {
            text-decoration: none;
            color: #fdffff;
            border: 1px solid #19e18f;
            padding: 1px 25px;
            font-size: 1.5rem;
            font-weight: 900;
            display: block;
            margin: 15px 0px;
            transition: all 0.2s;
        }
        .panel.m-2.dash-offer a:hover {
            background: #5cf0a5;
            color: #0c001c;
        }
        
        /*Offerwalls Design*/
        .offerwall-container{
            display: flex;
            align-items: center;
            background: #1C1C1C;
            padding: 0;
            margin: 0;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: relative;
            cursor: pointer;
            height: 120px;
        }
        .offerwall-container .left-image{
            width: 136px;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
        }
        
        .offerwall-container .left-image .bgimg{
            width:100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            
        }
          .offerwall-container .right-content {
              width: 100%;
              margin-left: 155px;
              padding: 16px 0;;
              display: flex;
              flex-direction: column;
          }
        .offerwall-container .right-content .top .key{
            font-size: 16px; 
            margin-bottom: 0;
        }
        .offerwall-container .right-content .top .value{
            font-size: 11px; 
            margin-bottom: 0;
            
        }
        
        .offerwall-container .right-content hr{
            width: 85%;
            background: #fff;
            margin: 6px 0;
        }
        
         .offerwall-container .right-content .bottom .key{
            font-size: 14px; 
            margin-bottom: 0;
        }
        .offerwall-container .right-content .bottom .value{
            font-size: 12px; 
            margin-bottom: 0;
        }
        .offerwall-container .right-content .bottom .value i{
            color: yellow;
            font-size: 10px;
        }
        
        .offerwall-container .feature{
           position: absolute;
            right: 0;
            bottom: 0;
            background: #297BFF;
            border-top-left-radius: 7px;
            font-size: 12px;
            border-bottom-right-radius: 7px;
            padding: 5px;
        }
        
        @media(max-width: 420px){
            .offerwall-container{
                height: 95px;
            }
            .offerwall-container .right-content{
                flex-direction:row;
                margin-left: 120px;
                align-items: center;
                padding: 0;
            }
            .offerwall-container .left-image{
                width: 100px;
            }
            .offerwall-container .right-content hr{
                width: 20%;
                background: #fff;
                margin: 0;
                transform: rotate(90deg);
            }
            .offerwall-container .feature{
                font-size:11px;
                padding: 3px
            }
        }
            
        
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('asset/static/social-share/jssocials.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/static/social-share/jssocials-theme-flat.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('asset/static/social-share/jssocials.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('.share-ref').jsSocials({
                shares: ["email", "twitter", "facebook", "linkedin", "pinterest", "whatsapp"],
                url: "<?php echo e(url('?join=')); ?><?php echo e(auth()->user()->username); ?>",
                text: "<?php echo e(set('siteName') . set('siteMetaDescription')); ?>",
                shareIn: "popup",
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/home.blade.php ENDPATH**/ ?>