<div>
    <div wire:poll>
        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="offer-wrapper animated zoomIn"  >
            <?php if($offer->users && $offer->users->profile &&  $offer->users->profile->image): ?>
                <?php if(!empty($offer->users->google_id)): ?>
                <img style="height: 25px;width:25px;border-radius: 15px;margin-left:5px;" src="<?php echo e($offer->users->profile->image); ?>" alt=""   />
                <?php else: ?>
                <img style="height: 25px;width:25px;border-radius: 15px;margin-left:5px;" src="<?php echo e(getImage(imagePath()['users']['path'] . '/' . $offer->users->profile->image)); ?>" alt=""    />
                <?php endif; ?>
            <?php else: ?>
            <img style="height: 25px;width:25px;border-radius: 15px;margin-left:5px;" src="<?php echo e(asset('asset/images/users/default.png')); ?>" alt=""   />
            <?php endif; ?>
                <?php
                if($offer->offers->name == 'AdscendMedia'){
                    $offername = 'Adscend';
                }
                else if($offer->offers->name == 'AdGateMedia'){
                    $offername = 'Adgate';
                }
                else if($offer->offers->name == 'CPX Research'){
                    $offername = 'CPX';
                }
                 else if($offer->offers->name == 'OGads'){
                    $offername = 'OGAds';
                }
                else{
                     $offername = $offer->offers->name;
                }
                ?>
                <p style="display:flex;flex-direction:column;gap:3px" >
                    <span style="color: #fff;margin-left:5px;" ><?php echo e($offername ?? '--'); ?> </span>
                    <span style="margin-left:5px;"  ><?php echo html_entity_decode(strtolower( substr($offer->users->username,0,10))) ?? '--'; ?></span>
                </p>
                <p class="offer-amount"><?php echo e($offer->amount + 0); ?></p>
            </div>
    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div style="margin-top:8px;margin-bottom:-20px;">
     <h2 style="margin-left:15px;font-size:14px;" ><img src="<?php echo e(asset('asset/img/live.svg')); ?>"style="width:13px;">  LIVE</h2>
     </div><?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/live-state.blade.php ENDPATH**/ ?>