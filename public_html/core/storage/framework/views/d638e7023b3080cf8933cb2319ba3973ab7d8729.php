<div>
    <div wire:poll>
        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="offer-wrapper animated zoomIn">
                <?php if($offer->users && $offer->users->profile && $offer->users->profile->image): ?>
                    <?php if(!empty($offer->users->google_id)): ?>
                        <img style="height: 25px;width:25px;margin-left:5px;" src="<?php echo e($offer->users->profile->image); ?>"
                            alt="" />
                    <?php else: ?>
                        <img style="height: 25px;width:25px;margin-left:5px;"
                            src="<?php echo e(getImage(imagePath()['users']['path'] . '/' . $offer->users->profile->image)); ?>"
                            alt="" />
                    <?php endif; ?>
                <?php else: ?>
                    <img style="height: 25px;width:25px;margin-left:5px;"
                        src="<?php echo e(asset('asset/images/users/default.png')); ?>" alt="" />
                <?php endif; ?>
                <?php
                if ($offer->offers->name == 'AdscendMedia') {
                    $offername = 'Adscend';
                } elseif ($offer->offers->name == 'AdGateMedia') {
                    $offername = 'Adgate';
                } elseif ($offer->offers->name == 'CPX Research') {
                    $offername = 'CPX';
                } elseif ($offer->offers->name == 'OGads') {
                    $offername = 'OGAds';
                } else {
                    $offername = $offer->offers->name;
                }
                ?>
                <p style="display:flex;flex-direction:column">
                    <span style="color: #fff;margin-left:5px;margin-bottom:5px;"><?php echo e($offername ?? '--'); ?> </span>
                    <span style="margin-left:5px;margin-bottom:5px;"><?php echo html_entity_decode(strtolower(substr($offer->users->username, 0, 10))) ?? '--'; ?></span>
                </p>
                <p class="offer-amount">
                    <span><img src="<?php echo e(asset('asset/img/coins.svg')); ?>" style="width:15px;"></span>
                    <span><?php echo e($offer->amount + 0); ?></span>
                </p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/live-state.blade.php ENDPATH**/ ?>