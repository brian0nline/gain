<div wire:poll>
    <div class="chat-container" >
        <div class="chat-button" style="<?php echo e($showChat ? "left:-34px" : "left:-40px"); ?>">
            <button type="button" wire:click="toggleChat()" class="togglebtn">
                <!--<i class="fa-solid fa-arrow-left-long"></i>-->
               <?php if($showChat): ?>
                <i class="fa-solid fa-arrow-right-long"></i>
                <?php else: ?>
               <i class="fa-solid fa-message"></i>
                <?php endif; ?>
            </button>
        </div>
        <?php if($showChat): ?>
            <div class="chat-messages">
                <div class="load-more text-center">
                    <div wire:click="loadMore()" class="btn btn-sm btn-dark align-self-center p-0 px-2" style="font-size:14px;">older..</div>
                </div>
                <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="chats-wrapper">
                        <!--<?php echo e($message->users->profile->image); ?>-->
                        <div class="wrapper-top">
                           <div style="display:flex;" >
                                <div class="chat-header">
                                        <?php if(empty($message->users->profile->image)): ?>
                                            <img src="<?php echo e(asset('asset/images/users/default.png')); ?>" alt="" />
                                        <?php else: ?>
                                            <?php if(strpos($message->users->profile->image, 'http') !== FALSE): ?>
                                            
                                                <img src="<?php echo e($message->users->profile->image); ?>"
                                                    alt="" />
                                            <?php else: ?>
                                             <img src="<?php echo e(getImage(imagePath()['users']['path'] . '/' . $message->users->profile->image)); ?>"
                                                alt="" />
                                           
                                            <?php endif; ?>
                                            
                                        <?php endif; ?>
                                    <h5 class="user"><?php echo e($message->users->username); ?></h5>
                                     <!--<div class="time">-->
                                        <!--<?php echo e(diffForHumans($message->created_at)); ?>-->
                                    <!--</div>-->
                                </div>
                                 <?php if($message->users->profile->user_id == 1): ?>
                                    <div class="admin-chat" style="margin-left:20px;background-color: #e84b3c;color: #fff; border-radius:14px;display:inline-block;font-size:11px;padding: 4px 6px;margin-bottom:5px;letter-spacing: 2px;">
                                        owner
                                    </div>
                                <?php endif; ?>
                               
                            </div>
                        </div>
                        <div class="wrapper-bottom">
                            <p><?php echo e($message->message); ?></p>
                           
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="chart-form position-sticky bottom-0">
                    <?php if(auth()->guard()->check()): ?>
                        <form wire:submit.prevent="sendMessage" id="chat_form">
                            <input wire:model.defer="messageText" type="text" class="form-control" placeholder="Say Something" />
                        </form>
                    <?php else: ?>
                        
                        <form action="<?php echo e(route('user.login')); ?>" id="chat_form">
                            <input wire:model.defer="messageText" type="text" class="form-control" placeholder="Please Login" />
                        </form>
                        
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php /**PATH /home/u972333121/domains/testnetgainify.net/public_html/core/resources/views/chat.blade.php ENDPATH**/ ?>