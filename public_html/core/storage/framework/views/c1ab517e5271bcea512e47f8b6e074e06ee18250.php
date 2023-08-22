<?php $__env->startPush('style'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<style>
    div#youmi_modal {
    padding-bottom: 134px;
}


@media  screen and (max-width: 850px) {
  .paraff {
    font-size:12px;
  }
}

@media  screen and (min-width: 992px) {
  .paraff {
    font-size:16px;
  }
}

@media  screen and (max-width: 850px) {
  .hdue {
    font-size:21px;
  }
}

@media  screen and (min-width: 992px) {
  .hdue {
    font-size:24px;
  }
}


@media  screen and (max-width: 850px) {
  .offerwall-name {
    font-size:12px;
  }
}

@media  screen and (min-width: 992px) {
  .offerwall-name {
    font-size:13px;
  }
}







</style>
<?php $__env->stopPush(); ?>

<div class="container-grid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <?php $__currentLoopData = $data['offers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneOffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subId = userInfo()->id;
                    ?>
                   <?php if($oneOffer->id == 51): ?>
                        <?php echo $__env->make('system.user.offer._ogads', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    
                   <?php if($oneOffer->id == 54): ?>
                        <?php echo $__env->make('system.user.offer._digi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                   
                    <?php if($oneOffer->id == 14): ?>
                        <div class="col-12" style="user-select:none;">
                            <h2 class="hdue" style="letter-spacing:3px;opacity: .8;"> <img
                                    src="<?php echo e(asset('asset/img/featured.svg')); ?>" style="pointer-events:none;"> Featured Offerwall</h2>
                            <p class="paraff" style="letter-spacing:3px;opacity: .8;margin-bottom:50px;">The most
                                frequently used offerwall with a special bonus for users</p>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #03ADB4;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 14 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="https://notik.me/coins?api_key=<?php echo e($oneOffer->public_key); ?>&pub_id=PEP8<?php echo e($oneOffer->publish_id); ?>&user_id=<?php echo e($subId); ?>"
                                        target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                        <p class="bonusofferwall"
                                            style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #03ADB4;">
                                            +10%</p>

                                        <div class="innerwall2">

                                            <img src="<?php echo e(asset('asset/img/notik2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#03ADB4 !important">Notik</p>
                                                <div class="icons">
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                        <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                        <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                         <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>"style="width:16px;"></span>
                                                    </p>
                                                    <p>
                                                        <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php $__currentLoopData = $data['offers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneOffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subId = userInfo()->id;
                    ?>

                    <?php if($oneOffer->iframe_url): ?>
                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2">
                                <a href="<?php echo e(Str::replace('subId', $subId, $oneOffer->iframe_url)); ?>" target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                     <div class="innerwall2">
                                    <img src="<?php echo e(getImage(imagePath()['offers']['path'] . '/' . $oneOffer->image)); ?>">
                                     <div>
                                                <p class="offerwall-name" style="color:#03ADB4 !important">"<?php echo e($oneOffer->name); ?>"</p>
                                                <div class="icons">
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                </div>
                                            </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php switch($oneOffer->id):
                            case (4): ?>
                                <div class="col-12" style="user-select:none;">
                                    <h2 class="hdue" style="letter-spacing:3px;opacity: .8;margin-top:50px;"> <img
                                            src="<?php echo e(asset('asset/img/offerwallslayers.svg')); ?>"  style="pointer-events:none;"> OfferWalls</h2>
                                    <p class="paraff" style="letter-spacing:3px;opacity: .8;margin-bottom:45px;">Choose any
                                        offerwall below and
                                        start earning right away</p>
                                </div>

                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #FF9A00;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 4 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://wall.wannads.com?apiKey=<?php echo e($oneOffer->public_key); ?>&userId=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/wannads2.svg')); ?>"
                                                        style="pointer-events: none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#FF9A00 !important;">Wannads</p>
                                                        <div class="icons">
                                                            <p>
                                                                <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            <?php break; ?>

                          

                            <?php case (6): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #E83A3C;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 6 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://www.offertoro.com/ifr/show/<?php echo e($oneOffer->publish_id); ?>/<?php echo e($subId); ?>/<?php echo e($oneOffer->public_key); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <p class="bonusofferwall"
                                                    style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #E83A3C;">
                                                    +50%</p>

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/offertoro2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#E83A3C !important;">Offertoro
                                                        </p>
                                                        <div class="icons">
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            <?php break; ?>

                            <?php case (7): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #46BBF9;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 7 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://wall.adgaterewards.com/<?php echo e($oneOffer->public_key); ?>/<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <!--<p class="bonusofferwall" style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;font-size: 13px;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #46BBF9;">+50%</p>  -->

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/adgatemedia2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#46BBF9 !important;">
                                                            Adgatemedia</p>
                                                        <div class="icons">
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            <?php break; ?>

                            

                            <?php case (11): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #A5CE37;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 11 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://www.kiwiwall.com/wall/<?php echo e($oneOffer->public_key); ?>/<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/kiwiwall2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#A5CE37 !important;">Kiwi Wall
                                                        </p>
                                                        <div class="icons">
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            <?php break; ?>

                            <?php case (13): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #31CE93;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 13 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://offers.monlix.com/?appid=<?php echo e($oneOffer->public_key); ?>&userid=<?php echo e($subId); ?>&subid=<?php echo e($oneOffer->publish_id); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <!--<p class="bonusofferwall" style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;font-size: 13px;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #31CE93;">+50%</p>-->

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/monlix2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#31CE93 !important;">Monlix</p>
                                                        <div class="icons">
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            <?php break; ?>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            <?php case (15): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #4BB170;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 15 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://timewall.io/users/login?oid=<?php echo e($oneOffer->public_key); ?>&uid=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <p class="bonusofferwall"
                                                    style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #4BB170;">
                                                    +10%</p>

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/timewall2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#4BB170 !important;">Timewall
                                                        </p>
                                                        <div class="icons">
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            <?php break; ?>


                           
                            
                            

                            

                            <?php case (29): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #1D57E7;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 29 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://revlum.com/offerwall/<?php echo e($oneOffer->public_key); ?>/<?php echo e($subId); ?>"
                                                target="_blank">
                                                <p class="bonusofferwall"
                                                    style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #1D57E7;">
                                                    +5%</p>

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/revlum2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#1D57E7 !important">Revlum</p>
                                                        <div class="icons">
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                            <p>
                                                               <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            <?php break; ?>

                           
                         
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            <?php default: ?>
                        <?php endswitch; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php $__currentLoopData = $data['offers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneOffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subId = userInfo()->id;
                    ?>
                    <?php if($oneOffer->id == 10): ?>
                        <div class="col-12" style="user-select:none;">
                            <h2 class="hdue" style="letter-spacing:3px;opacity: .8;margin-top:50px;"><img
                                    src="<?php echo e(asset('asset/img/surveysdashboard.svg')); ?>"  style="pointer-events:none;"> Surveys</h2>
                            <p class="paraff" style="letter-spacing:3px;opacity: .8;margin-bottom:50px;">Choose any
                                survey below and
                                start earning right away.</p>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #00BE9D;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 10 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="https://wall.cpx-research.com/index.php?app_id=<?php echo e($oneOffer->public_key); ?>&ext_user_id=<?php echo e($subId); ?>"
                                        target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                        <div class="innerwall2">

                                            <img src="<?php echo e(asset('asset/img/cpxresearch2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name"
                                                    style="color: #00BE9D !important;text-decoration:none;">CPX
                                                    Research</p>
                                                <div class="icons">
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    <?php elseif($oneOffer->id == 31): ?>
                        

                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #26c9db;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 31 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="https://www.surveyb.in/configuration?params=OUJEQnQxL0YrcHR1QlhpL1VGMDdmRDk2c201WFFUeWFRVnFUQmFoL1kxbmVMaGFBdGZtZytlcHNGdlJES0xuR0d1YTJBRCtGS0FkeWlxZU5UeWNtVDE5KzVOQnNySDY3ZnVmbkN4b1ZpWk80ZXBjWURKT04xazB3VWVEaW9OY2J0RXVEckFWS3NNdjAwbjhmajJaMXJGcnhXY2hhUytUVEl3NG55SFZreHFJbVE2bHBkRkN5TGhNVjdOaDZyejBQQ2p2ZG52eEcwcGxuVmdqREZpMk50Zz09&app_uid=<?php echo e($subId); ?>"
                                        target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                        <div class="innerwall2">

                                            <img src="<?php echo e(asset('asset/img/inbrain2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#26c9db !important">Inbrain</p>
                                                <div class="icons">
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    
                   
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $data['offers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneOffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subId = userInfo()->id;
                    ?>
                    <?php if($oneOffer->id == 38): ?>
                        <div class="col-12" style="user-select:none;">
                            <h2 class="hdue" style="letter-spacing:3px;opacity: .8;margin-top:50px;"><img
                                    src="<?php echo e(asset('asset/img/videosection.svg')); ?>"  style="pointer-events:none;"> Videos</h2>
                            <p class="paraff" style="letter-spacing:3px;opacity: .8;margin-bottom:50px;">Earn coins
                                while relaxing and watching videos</p>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #fff;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 38 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="https://partner.hideout.tv/click.php?aff=116158&camp=2992522&from=19214&prod=4&prod_channel=5&sub1=<?php echo e($subId); ?>"
                                        target="_blank" >

                                        <div class="innerwall2">

                                            <img src="<?php echo e(asset('asset/img/hideout2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#fff !important">HideoutTV</p>
                                                <div class="icons">
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    <?php elseif($oneOffer->id == 39): ?>
                        

                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #14FAA6;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 39 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="https://google.com"
                                        target="_blank">

                                        <div class="innerwall2">


                                            <img src="<?php echo e(asset('asset/img/loottv2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#14FAA6 !important">LootTV</p>
                                                <div class="icons">
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                         
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                
                 <?php $__currentLoopData = $data['offers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneOffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subId = userInfo()->id;
                    ?>
                    <?php if($oneOffer->id == 52): ?>
                        <div class="col-12" style="user-select:none;">
                            <h2 class="hdue" style="letter-spacing:3px;opacity: .8;margin-top:50px;"><img
                                    src="<?php echo e(asset('asset/img/videosection.svg')); ?>"> Games</h2>
                            <p class="paraff" style="letter-spacing:3px;opacity: .8;margin-bottom:50px;">Earn coins
                                every minute playing games </p>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #625CFF;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 52 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="https://google.com"
                                        target="_blank" >

                                        <div class="innerwall2">

                                            <img src="<?php echo e(asset('asset/img/playtime2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#625CFF !important">Playtime</p>
                                                <div class="icons">
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                    <p>
                                                       <span> <img src="<?php echo e(asset('asset/img/starsofferwalls.svg')); ?>" style="width:16px;pointer-events:none;"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



               

<div class="modal fade" id="iframe_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content" style="border-radius:12px;">
      <div class="modal-header" style="border-top-left-radius:12px;border-top-right-radius:12px;">
           <h5 class="modal-title" id="offer_title"></h5>
        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close" style="box-shadow:none;"></button>
      </div>
      <div class="modal-body position-relative p-0">
          <div class="iframe-loader">
              <span class="iframe-loader-line"></span>
          </div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item scrollable" src=''></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
   $('[data-target="#youmi_modal"]').click(function(e){
       e.preventDefault();
       $('.modal#youmi_modal').modal('show');
   });
   
   $('[data-target="#ogads_modal"]').click(function(e){
       e.preventDefault();
       $('.modal#ogads_modal').modal('show');
   });
   
   $('[data-target="#digi_modal"]').click(function(e){
       e.preventDefault();
       $('.modal#digi_modal').modal('show');
   });
   $('.offer-url').click(function(e){
       e.preventDefault();
       let url = $(this).attr('href');
       let title = $(this).attr('title');
       $('.modal#iframe_modal #offer_title').html(title);
       let src = $('.modal#iframe_modal iframe').attr('src', url);
       
       $('.iframe-loader').css('display', 'block');
       
       $('.iframe-loader-line').animate({ width: '100%' }, 2000);
      
       $('.modal#iframe_modal').modal('show');
       
       setTimeout(function(){
        $('.iframe-loader').css('display', 'none'); 
       }, 3000);
   })
});
   
</script>
            </div>


<?php $__env->startPush('style'); ?>
 <style>
     
     .close{
         color: #fff; 
    opacity: 1;
     }
 </style>

<?php $__env->stopPush(); ?>



        </div>
    </div>
</div>

</div>
<?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/system/user/offer/index.blade.php ENDPATH**/ ?>