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

                            <?php case (5): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #7359A5;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 5 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://api.adgem.com/v1/wall?appid=26429&playerid=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/adgem2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#7359A5 !important;">Adgem</p>
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

                            <?php case (8): ?>
                                
                                <div class="col-lg-4 col-md-6 col-sm-10 mb-3">
                                    <div class="offerwallsposition custom-offerwall-style"
                                        style="background: rgb(34, 53, 72);">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 8 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://www.ayetstudios.com/offers/web_offerwall/<?php echo e($oneOffer->public_key); ?>?external_identifier=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <img
                                                    src="<?php echo e(getImage(imagePath()['offers']['path'] . '/' . $oneOffer->image)); ?>">
                                            </a>
                                            <div class="icons">
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                            </div>
                                        </div>
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
                            
                            
                            <?php case (12): ?>
                            <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #017AFF;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 12 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="https://web.bitlabs.ai/?uid=<?php echo e($subId); ?>&token=<?php echo e($oneOffer->public_key); ?>"
                                        target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                        <p class="bonusofferwall"
                                            style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #017AFF;">
                                            +50%</p>

                                        <div class="innerwall2">

                                            <img src="<?php echo e(asset('asset/img/bitlabs2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#017AFF !important">Bitlabs</p>
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

                            <?php case (16): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #FCF80B;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 16 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://wall.make-money.top/?p=<?php echo e($oneOffer->public_key); ?>&u=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/mmwall.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#FCF80B !important;">MM Wall
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

                            <?php case (17): ?>
                                
                                <div class="col-lg-4 col-md-6 col-sm-10 mb-3">
                                    <div class="offerwallsposition custom-offerwall-style"
                                        style="background: rgb(34, 53, 72);">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 17 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://offeroc.com/offerwall/<?php echo e($oneOffer->public_key); ?>/<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <img
                                                    src="<?php echo e(getImage(imagePath()['offers']['path'] . '/' . $oneOffer->image)); ?>">
                                            </a>
                                            <div class="icons">
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break; ?>

                            <?php case (18): ?>
                                
                                <div class="col-lg-4 col-md-6 col-sm-10 mb-3">
                                    <div class="offerwallsposition custom-offerwall-style"
                                        style="background: rgb(34, 53, 72);">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 18 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://theoremreach.com/respondent_entry/direct?api_key=<?php echo e($oneOffer->public_key); ?>&user_id=<?php echo e($subId); ?>&transaction_id=<?php echo e(md5($subId)); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <img
                                                    src="<?php echo e(getImage(imagePath()['offers']['path'] . '/' . $oneOffer->image)); ?>">
                                            </a>
                                            <div class="icons">
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break; ?>
                            
                            <?php case (33): ?>
                            
                             <?php
                                $youmis = \App\Services\YoumiService::getOffers($oneOffer->public_key);
                            ?>
                            
                            <div class="col-lg-4 col-md-6 mb-3 col-6">
                                
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #da0a78;border-radius:12px;">
                                <div
                                    class="innerwall>">
                                    <div
                                            class="innerwall <?= $oneOffer->id == 33 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="#" data-toggle="modal" data-target="#youmi_modal">
                                        <!--<p class="bonusofferwall"
                                            style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;font-size: 13px;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #03ADB4;">
                                            +10%</p>-->

                                        <div class="innerwall2">

                                            <img src="<?php echo e(asset('asset/img/youmi2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#da0a78 !important">Youmi</p>
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
                                </div>
                                </a>
                            </div>
                            <div class="row custom_offers_youmis" >
                                    <div class="modal fade scrollable" id="youmi_modal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  >
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content" style="border-bottom: 1px solid #242B27">
                                                <div class="modal-header" style="border-top-left-radius:12px;border-top-right-radius:12px;">
                                                     <h5 class="modal-title"><img src="<?php echo e(asset('asset/img/youmi.svg')); ?>" style="width:150px;"></h5>
                                                    
                                                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close" style="box-shadow:none;"></button>
                                                </div>
                                                <div class="modal-body p-0" >
                                                    <div class="embed-responsive embed-responsive-16by9" style="max-height:560px;overflow-y:auto;overflow-x:hidden;">
                                                    <div class="row">
                                                    <?php $__currentLoopData = $youmis['offers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $youmi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                        <div class="col-lg-6">
                                                            <div class="offerwallsposition custom-offerwall-style  my-2"
                                                                style="background: #3B4740;border: 1px solid #3B4740;"
                                                                data-href="<?php echo e($youmi['trackinglink']); ?>&aff_sub=<?php echo e($subId); ?>&aff_sub2=<?php echo e(md5($subId)); ?>"
                                                                onclick="window.open($(this).data('href'), '_blank')"
                                                                >
                                                                <p class="bonusofferwall"
                                                                    style="position: absolute; padding: 2px 10px;right: 5px;top: 5px;font-weight: 600;border-radius: 20px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #4aa276;">
                                                                    <?php echo e($youmi['payout'] * 300); ?><i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i></p>
                                                                <div class="text-left ml-2" style="margin-top:32px;margin-left:5px;">
                                                                    <?php echo \Str::limit($youmi['name'], 40, '..'); ?>

                                                                    <p><?php echo e($youmi['category']); ?></p>
                                                                    
                                                                </div>
                                                                <div class="innerwall ">
                                                                    <a href="<?php echo e($youmi['trackinglink']); ?>&aff_sub=<?php echo e($subId); ?>&aff_sub2=<?php echo e(md5($subId)); ?>"
                                                                        target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                                        <img src="<?php echo e($youmi['icon_url']); ?>"
                                                                            class="yomi-modal-img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <?php break; ?>

                            <?php case (19): ?>
                                
                                <div class="col-lg-4 col-md-6 col-sm-10 mb-3">
                                    <div class="offerwallsposition custom-offerwall-style"
                                        style="background: rgb(34, 53, 72);">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 19 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://bitswall.net/offerwall/<?php echo e($oneOffer->public_key); ?>/<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <img
                                                    src="<?php echo e(getImage(imagePath()['offers']['path'] . '/' . $oneOffer->image)); ?>">
                                            </a>
                                            <div class="icons">
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                                <p>
                                                    <span class="fas fa-star" style="color: #fff"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break; ?>

                            <?php case (20): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #fff;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 20 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://www.admantum.com/offers?appid=<?php echo e($oneOffer->public_key); ?>&uid=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/admantum2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#fff !important;">Admantum</p>
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

                            <?php case (21): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #A4C639;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 21 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://wall.cpidroid.com/offer/<?php echo e($oneOffer->public_key); ?>?uid=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/cpidroid2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#A4C639 !important;">CPIDroid
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

                            <?php case (22): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #f6951f;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 22 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://www.offerdaddy.com/wall/<?php echo e($oneOffer->public_key); ?>/<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/offerdaddy2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#f6951f !important;">Offerdaddy
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

                            <?php case (30): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #0E9ED0;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 30 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://asmwall.com/adwall/publisher/116158/profile/19198?subid1=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <p class="bonusofferwall"
                                                    style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #0E9ED0;">
                                                    +10%</p>

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/adscendmedia2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#0E9ED0 !important;">
                                                            Adscendmedia</p>
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

                            <?php case (35): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #25baf1;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 35 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://offerwall.admantium.net?offerwall=8c638380-9960-11ed-acb3-d754f2e43724&user_id=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/admantium2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#25baf1 !important;">Admantium
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

                            <?php case (36): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #fff;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 36 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://offerwall.hangmyads.com/offerwall.php?pubid=4857&subid=<?php echo e($subId); ?>&google_aid=81b99d32-ef62-445d-9460-dce74066cb5a&curr=coins&percent=400"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/hangmyads2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#fff !important">Hang my Ads
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

                            <?php case (37): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #EC7668;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 37 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://wall.lootably.com/?placementID=cldt6m6ki00e401wkd7es5084&sid=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                                <p class="bonusofferwall"
                                                    style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #EC7668;">
                                                    +50%</p>

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/lootably2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#EC7668 !important">Lootably
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

                            <?php case (40): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #2BA4DA;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 40 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://fastsvr.com/list/477886&subid=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/cpalead2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#2BA4DA !important;">CPALead
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

                            <?php case (41): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #5FF442;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 41 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://affgo.xyz/offerwall/?o=ow_638777219ed90&s1=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/affmine2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#5FF442 !important;">Affmine
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

                            <?php case (42): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #BD9243;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 42 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://medioot.com/offer/<?php echo e($oneOffer->public_key); ?>/<?php echo e($subId); ?>" target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/medioot2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#BD9243 !important;">Medioot
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
                             <?php case (43): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #21a0dc;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 43 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="#"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/revu2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#21a0dc !important;">Revu</p>
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
                            <?php case (44): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #F15C4B;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 44 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="#"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/tapresearch2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#F15C4B !important;">Tap Research</p>
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
                            
                            
                            <?php case (45): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #E13232;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 45 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="#"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/personaly2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#E13232 !important;">Personaly</p>
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
                            
                            
                            <?php case (46): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #E9292E;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 46 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="#"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/tapjoy2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#E9292E !important;">Tapjoy</p>
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
                            
                            <?php case (47): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #00D691;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 47 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="#"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/fyber2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#00D691 !important;">Fyber</p>
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
                            
                            
                            <?php case (48): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #001688;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 48 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="#"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/ironsource2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#001688 !important;">Ironsource</p>
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
                            
                            <?php case (49): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #FCC002;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 49 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="#"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/okspin2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#FCC002 !important;">Okspin</p>
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
                            
                            <?php case (53): ?>
                                

                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #FCC002;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 53 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="#"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/luckywall2.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#FCC002 !important;">Lucky Wall</p>
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
                            
                            
                            <?php case (55): ?>
                                
                                <div class="col-lg-4 col-md-6 mb-3 col-6">
                                    <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #4aa276;border-radius:12px;">
                                        <div
                                            class="innerwall <?= $oneOffer->id == 55 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                            <a href="https://affgo.xyz/offerwall/?o=ow_638777219ed90&s1=<?php echo e($subId); ?>"
                                                target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">

                                                <div class="innerwall2">

                                                    <img src="<?php echo e(asset('asset/img/freelootoffers.svg')); ?>"
                                                        style="pointer-events:none;">

                                                    <div>
                                                        <p class="offerwall-name" style="color:#4aa276 !important;">Freeloot Offers
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
                            
                            
                            
                            
                            
                            <?php case (51): ?>
                             <?php
    $ogads = \App\Services\OGAdsService::getOffers($oneOffer->public_key);
?>

<div class="col-lg-4 col-md-6 mb-3 col-6">
    
        <div class="offerwallsposition2 custom-offerwall-style2"
    style="background: #242B27;border: 2px solid #1AB6FF;border-radius:12px;">
    <div
        class="innerwall>">
        <div
                class="innerwall <?= $oneOffer->id == 51 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
        <a href="#" data-toggle="modal" data-target="#ogads_modal">
            <!--<p class="bonusofferwall"
                style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;font-size: 13px;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #03ADB4;">
                +10%</p>-->

            <div class="innerwall2">

                <img src="<?php echo e(asset('asset/img/ogads2.svg')); ?>"
                    style="pointer-events:none;">

                <div>
                    <p class="offerwall-name" style="color:#1AB6FF !important">OGAds</p>
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
    </div>
    </a>
</div>
<div class="row custom_offers_ogadss" >
        <div class="modal fade scrollable" id="ogads_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content" style="border-bottom: 1px solid #242B27">
                    <div class="modal-header" style="border-bottom: 1px solid #242B27">
                        <h5 class="modal-title">OGAds</h5>
                        
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close" style="box-shadow:none;"></button>
                    </div>
                    <div class="modal-body p-0" style="background: #242b27;">
                       
              <div class="embed-responsive embed-responsive-16by9" style="max-height:560px;overflow-y:auto;overflow-x:hidden;">
                        <div class="row">
                            
                          
                         <?php $__currentLoopData = $ogads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ogad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <div class="col-lg-6 my-2">
                                <div class="offerwallsposition custom-offerwall-style"
                                    style="background: #333232;border: 1px solid #1AB6FF;"
                                    data-href="<?php echo e($ogad->link); ?>}"
                                    onclick="window.open($(this).data('href'), '_blank')"
                                    >
                                    <p class="bonusofferwall"
                                        style="position: absolute; padding: 2px 10px;right: 5px;top: 5px;font-weight: 600;border-radius: 20px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #1AB6FF;">
                                        <?php echo e($ogad->payout  * 300); ?><i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>" style="width:22px;"></i></p>
                                    <div class="text-left ml-2" style="margin-left:10px;margin-top:25px;">
                                        <?php echo \Str::limit($ogad->name_short, 60, '..'); ?>

                                    </div>
                                    <div class="innerwall ">
                                        <a href="<?php echo e($ogad->link); ?>"
                                            target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                            <img src="<?php echo e($ogad->picture); ?>"
                                                class="yomi-modal-img" style="width: 71px;margin-left:5px;border-radius:12px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<?php break; ?>
                            
                            
                            
                             <?php case (54): ?>
                                <?php
    $digis = \App\Services\DigiMart::getOffers($oneOffer->public_key);
?>
<div class="col-lg-4 col-md-6 mb-3 col-6">
    
        <div class="offerwallsposition2 custom-offerwall-style2"
    style="background: #242B27;border: 2px solid #fff;border-radius:12px;">
    <div
        class="innerwall>">
        <div
                class="innerwall <?= $oneOffer->id == 54 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
        <a href="#" data-toggle="modal" data-target="#digi_modal">
            <!--<p class="bonusofferwall"
                style="position: absolute; padding: 2px 10px;right: 0px;top: 0px;font-weight: 600;font-size: 13px;border-bottom-left-radius: 10px;border-bottom-right-radius:0px;border-top-right-radius:10px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #03ADB4;">
                +10%</p>-->

            <div class="innerwall2">

                <img src="<?php echo e(asset('asset/img/dtny.svg')); ?>"
                    style="pointer-events:none;">

                <div>
                    <p class="offerwall-name" style="color:#fff !important">DTNY</p>
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
    </div>
    </a>
</div>
<div class="row custom_offers_ogadss" >
    <div class="modal fade" id="digi_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" style="border-radius:12px;">
          <div class="modal-header" style="border-top-left-radius:12px;border-top-right-radius:12px;">
                <h5 class="modal-title"><img src="<?php echo e(asset('asset/img/digitaltechnewyork.svg')); ?>" style="width:130px;"></h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close" style="box-shadow:none;"></button>
          </div>
          <div class="modal-body position-relative px-1">
             
             
            <div class="embed-responsive embed-responsive-16by9" style="max-height:560px;overflow-y:auto;overflow-x:hidden;">
                    <div class="row">
                     <?php if(isset($digis->offers)): ?>
                     <?php $__currentLoopData = $digis->offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $digi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 my-2">
                            <div class="offerwallsposition custom-offerwall-style"
                                style="background: #3B4740;border: 1px solid #3B4740;"
                                data-href="<?php echo e(str_replace("{your_click_id}", userInfo()->id, $digi->your_link)); ?>"
                                onclick="window.open($(this).data('href'), '_blank')"
                                >
                                <p class="bonusofferwall"
                                    style="position: absolute; padding: 2px 10px;right: 5px;top: 5px;font-weight: 600;border-radius: 20px;color: #fff;font-family: 'Montserrat', sans-serif, arial;background-color: #4aa276;">
                                    <?php echo e($digi->payout * 300); ?><i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>" style="width:22px;"></i></p>
                                <div class="text-left ml-2"style="margin-left:10px;margin-top:25px;font-size:13px;">
                                    <?php echo \Str::limit($digi->description, 60, '..'); ?>

                                </div>
                                <div class="innerwall ">
                                    <a href="<?php echo e(str_replace("{your_click_id}", userInfo()->id, $digi->your_link)); ?>"
                                        target="_blank" class="" title="<?php echo e($oneOffer->name); ?>">
                                        <img src="<?php echo e($digi->creative); ?>"
                                            class="yomi-modal-img" style="width: 71px;margin-left:5px;border-radius:12px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    <?php elseif($oneOffer->id == 34): ?>
                        
                        <div class="col-lg-4 col-md-6 col-sm-10 mb-3">
                            <div class="offerwallsposition custom-offerwall-style"
                                style="background: linear-gradient(336.89deg, rgb(19, 23, 57) -26.71%, rgb(7, 22, 57) 107.56%);">
                                <div
                                    class="innerwall <?= $oneOffer->id == 34 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="https://wall.opinioncapital.com/panel/658/<?php echo e($subId); ?>"
                                        target="_blank" class="offer-url" title="<?php echo e($oneOffer->name); ?>">
                                        <img
                                            src="<?php echo e(getImage(imagePath()['offers']['path'] . '/' . $oneOffer->image)); ?>">
                                    </a>
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
                    <?php elseif($oneOffer->id == 32): ?>
                        
                        
                        <div class="col-lg-4 col-md-6 col-sm-10 mb-3">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                        style="background: #242B27;border: 2px solid #E94D4F;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 32 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <?php 
                                    
                                    $hash = md5($subId);
                                    $ip = request()->ip();
                                    $time = time();
                                    $url = "https://wss.pollfish.com/v2/device/register/true?json={\"api_key\": \"$oneOffer->public_key\",\"debug\": true,\"ip\": \"$ip\",\"device_id\": \"$subId\",\"timestamp\": \"$time\",\"encryption\": \"NONE\",\"version\": \"7\",\"os\": \"1\",\"locale\": \"en\",\"content_type\": \"json\"}&dontencrypt=true&sig=$hash";
                                    ?>
                                    <a href="<?php echo e($url); ?>"
                                        target="_blank" class="offer-url">

                                        <div class="innerwall2">

                                            <img src="<?php echo e(asset('asset/img/pollfish2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#E94D4F !important;">Pollfish</p>
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
                                    <a href="https://api.lootably.com/api/offerwall/redirect/offer/101-999?placementID=cldt6m6ki00e401wkd7es5084&rawPublisherUserID=<?php echo e($subId); ?>"
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
                         <?php elseif($oneOffer->id == 50): ?>
                        

                        <div class="col-lg-4 col-md-6 mb-3 col-6">
                            <div class="offerwallsposition2 custom-offerwall-style2"
                                style="background: #242B27;border: 2px solid #4aa276;border-radius:12px;">
                                <div
                                    class="innerwall <?= $oneOffer->id == 50 && $oneOffer->is_available == 0 ? 'unavailable' : '' ?>">
                                    <a href="#"
                                        target="_blank">

                                        <div class="innerwall2">


                                            <img src="<?php echo e(asset('asset/img/videos2.svg')); ?>"
                                                style="pointer-events:none;">

                                            <div>
                                                <p class="offerwall-name" style="color:#4aa276 !important">Videos</p>
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
                                    <a href="https://partner.hideout.tv/click.php?aff=116158&camp=2992522&from=19214&prod=4&prod_channel=5&sub1=<?php echo e($subId); ?>"
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
<?php /**PATH /home/freebpbk/public_html/core/resources/views/system/user/offer/index.blade.php ENDPATH**/ ?>