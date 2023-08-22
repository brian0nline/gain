<?php $__env->startPush('css'); ?>
<style>
    .profileImg{
        margin-left:10px;
        width:100px;
        height:100px;
        object-fit:cover;
        border-radius:12px;
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('title', 'Settings | Freeloot'); ?>
<?php $__env->startSection('content'); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom-color:#242b27;">
    <hr>
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Settings</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Password</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">2FA</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#offers" type="button" role="tab" aria-controls="offers" aria-selected="false">History</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      
    <form action="<?php echo e(route('user.profile.setting.update')); ?>" id="profile-settings-form" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
    <div class="bg-white p-2" style="border-radius: 10px;">
    
   
        <img src=
            class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section" style="margin-top:15px;">
           
          
            <button class="btn btn-primary mr-3" style="margin-left: 20px;font-size:14px;box-shadow:none;"><b>Upload</b></button>
            <?php if(userProfile()['image']): ?>
            <?php if(!empty(userInfo()->google_id)): ?>
             <img src="<?php echo e(userProfile()['image']); ?>" class="profileImg" alt="a" />
            <?php else: ?>
            <img src="<?php echo e(getImage(imagePath()['users']['path'] . '/' . userProfile()['image'])); ?>"
                 class="profileImg" alt="b" />
            <?php endif; ?>
        <?php else: ?>
            <img src="<?php echo e(asset('asset/images/users/default.png')); ?>" class="profileImg" alt="c" />
           
        <?php endif; ?>
        
    <!--</div>-->
     <?php if(empty(userInfo()->google_id)): ?>
        <input type="file" class="form-control" name="image" />
      
    <?php endif; ?>
           
        
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6">
                <label for="username">Username</label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'username','value' => ''.e(userInfo()->username).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'username','value' => ''.e(userInfo()->username).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="firstname" >First Name</label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'firstname','value' => ''.e(userInfo()->firstname).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'firstname','value' => ''.e(userInfo()->firstname).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="lastname" >Last Name</label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'lastname','value' => ''.e(userInfo()->lastname).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'lastname','value' => ''.e(userInfo()->lastname).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div class="col-md-6">
                <label for="phone" >Mobile Number</label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'mobile','value' => ''.e(userInfo()->mobile).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'mobile','value' => ''.e(userInfo()->mobile).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="address" >Address 1</label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'address[address1]','value' => ''.e(@userAddress()['address1']).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'address[address1]','value' => ''.e(@userAddress()['address1']).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
             <div class="col-md-6 ">
                <label for="zip" >ZIP</label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'address[zip]','value' => ''.e(@userAddress()['zip']).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'address[zip]','value' => ''.e(@userAddress()['zip']).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
        
        <div class="row py-2">
            <div class="col-md-6">
                <label for="city" >City</label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'address[city]','value' => ''.e(@userAddress()['city']).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'address[city]','value' => ''.e(@userAddress()['city']).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="state">State</label>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.input','data' => ['type' => 'text','name' => 'address[state]','value' => ''.e(@userAddress()['state']).'']]); ?>
<?php $component->withName('bs::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','name' => 'address[state]','value' => ''.e(@userAddress()['state']).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
        
        <div class="row py-2">
            <div class="col-md-6">
                <label for="country"  style="margin-bottom:8px;">Country</label>
                <select name="country" id="country" class="bg-light">
                <option value="" style="margin-bottom:15px;">Select One</option>
                                        <?php $__currentLoopData = getCountries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country); ?>"
                                                <?php if($country == @userAddress()['country']): ?> selected <?php endif; ?>><?php echo e($country); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            
        </div>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'bs::components.button','data' => ['type' => 'submit','class' => 'my-2 custom-profile-setting-btn','label' => __('Update'),'icon' => 'share','style' => 'box-shadow: none;font-size:14px;']]); ?>
<?php $component->withName('bs::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'my-2 custom-profile-setting-btn','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Update')),'icon' => 'share','style' => 'box-shadow: none;font-size:14px;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" style="letter-spacing: 1px;font-size:14px;background:#e84b3c;border-color:#e84b3c;box-shadow: none;" class="btn btn-danger">  <i><img src="<?php echo e(asset('asset/img/bin.svg')); ?>"></i> Delete Account</a>
                <a href="#" onclick="event.preventDefault(); $('form#logout-form').submit();"  style="letter-spacing: 1px;font-size:14px;background:#e84b3c;border-color:#e84b3c;box-shadow: none;" class="btn btn-danger">  <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </form>
    
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <?php echo $__env->make('user.password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
       <?php echo $__env->make('user.twofactor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
  <div class="tab-pane fade" id="offers" role="tabpanel" aria-labelledby="offers-tab">
      <div id="user_reports"></div>
  </div>
</div>




    
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark  p-4">
                <h5 class="text-center" style="font-size:22px;box-shadow:none;"><?php echo app('translator')->get('Delete Account'); ?></h5>
                <form action="<?php echo e(route('user.account.delete')); ?>" method="post">
                   <?php echo csrf_field(); ?>
                    <div class="modal-body">
                       <p class="text-center" style="font-size:14px;">Your account and all data will be deleted permanently and this action cannot be undo.</p> 
                    </div>
                    <div class="modal-footer  justify-content-center border-0">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="background:#3B4740;border-color:#3B4740;box-shadow:none;"><?php echo app('translator')->get('Cancel'); ?></button>
                        <button type="submit" class="btn btn-primary" style="font-size:14px;background:#e84b3c;border-color:#e84b3c;box-shadow:none;"><?php echo app('translator')->get('Delete'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>

<style>
    @import  url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Mukta&family=Poppins&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: "Montserrat", sans-serif, arial;
    background-color: #121714;
    letter-spacing: 3px;
    
}

.wrapper{
    padding: 30px 50px;
    border: 1px solid #4aa276;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 600px;
    
}

ul#myTab {
    background: #242b27;
    font-size: 14px;
    font-weight: 400;
    margin-bottom:15px;
    border-radius:10px;
}

@media  screen and (max-width: 425px) {
  ul#myTab {
    font-size:12px;
  }
}

li.nav-item button {
    color: #fff;
    font-weight: 900;
    padding: 18px 20px;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #ffffff;
    background-color: #4aa276;
    border-color: #4aa276 #4aa276 #fff;
}
.nav-link:focus, .nav-link:hover {
    color: #ffffff;
}
.nav-tabs .nav-link {
    margin-bottom: -1px;
    background: 0 0;
    border: none;
    border-radius:10px;
}
h4{
    letter-spacing: -1px;
    font-weight: 400;
}
.img{
    width: 70px;
    height: 70px;
    border-radius: 6px;
    object-fit: cover;
}
#img-section p,#deactivate p{
    font-size: 12px;
    color: #fff;
    margin-bottom: 10px;
    text-align: justify;
}
#img-section b,#img-section button,#deactivate b{
    font-size: 14px; 
}

label{
    margin-bottom: 0;
    font-size: 11px;
    font-weight: 500;
    color: #fff;
    padding-left: 3px;
}

.form-control{
    border-radius: 10px !important;
}

input[placeholder]{
    font-weight: 500;
}
.form-control:focus{
    box-shadow: none;
    border: 1.5px solid #4aa276;
    color: #fff !important;
    font-size: 14px;
}
select{
    display: block;
    width: 100%;
    border: 1px solid #4aa276;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px;
    color: #fff;
    /* -webkit-appearance: none; */
}

select:focus{
    outline: none;
}
.button{
    background-color: #fff;
    color: #fff;
}

.btn-primary{
    background-color: #0779e4;
}
.danger{
    background-color: #e20404;
    color: #fff;
    
    
}
.danger:hover{
    background-color: #e20404;
    color: #fff;
}
@media(max-width:576px){
    .wrapper{
        padding: 25px 20px;
    }
    #deactivate{
        line-height: 18px;
    }
}

input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #4aa276;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  
}

input[type=file]::file-selector-button:hover {
  background: #4aa276 !important;
}

</style>
    
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('checkbox', true); ?>
<?php $__env->startSection('datatabe', true); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo e(route('user.offer.reports')); ?>",
            type:"GET",
            success:function(res){
                $('#user_reports').html(res);
            }
        })
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/user/profile/setting.blade.php ENDPATH**/ ?>