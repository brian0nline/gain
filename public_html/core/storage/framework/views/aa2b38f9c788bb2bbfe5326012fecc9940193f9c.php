<?php $__env->startPush('style'); ?>
<style>
    body .list-group-item span{
        color: #000 !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-5 col-md-5 mb-30">

            <div class="card b-radius-10 overflow-hidden shadow">
                <div class="card-body p-0" style="background: #3b4740">
                    <a href="<?php echo e(route('moder.users.all')); ?>" class="btn btn-sm btn-primary box-shadow1 text-small" style="background: #4aa276;border-color: #4aa276;box-shadow:none;border-top-right-radius:0px;border-bottom-left-radius:0px;"><i
                            class="fa fa-fw fa-backward"></i> <?php echo app('translator')->get('Go
                                                    Back'); ?> </a>
                    <div class="p-3 ">
                        <div class="">
                        </div>
                        <div class="mt-15">
                            <h4 class=""><?php echo e($user->fullname); ?></h4>
                            <span class="text-small"><?php echo app('translator')->get('Joined At'); ?>
                                <strong><?php echo e(showDateTime($user->created_at, 'd M, Y h:i A')); ?></strong></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-radius-10 overflow-hidden mt-30 shadow">
                <div class="card-body" style="background: #3b4740">
                    <h5 class="mb-20 text-muted" style="color:#fff !important;"><?php echo app('translator')->get('User Info'); ?></h5>
                    <ul class="list-group" style="background: #3b4740">

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            <?php echo app('translator')->get('Username'); ?>
                            <span class="font-weight-bold"><?php echo e($user->username); ?></span>
                        </li>


                        <li class="list-group-item d-flex justify-content-between align-items-center"style="background: #3b4740;border:none;">
                            <?php echo app('translator')->get('Status'); ?>
                            <?php if($user->status == 1): ?>
                                <span class="badge badge-pill bg-success"><?php echo app('translator')->get('Active'); ?></span>
                            <?php elseif($user->status == 0): ?>
                                <span class="badge badge-pill bg-danger"><?php echo app('translator')->get('Banned'); ?></span>
                            <?php endif; ?>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between align-items-center"style="background: #3b4740;border:none;">
                            <?php echo app('translator')->get('Verification'); ?>
                            <?php if($user->active_status_by_admin == 1): ?>
                                <span class="badge badge-pill bg-success"><?php echo app('translator')->get('Verified'); ?></span>
                            <?php elseif($user->active_status_by_admin == 0): ?>
                                <span class="badge badge-pill bg-danger"><?php echo app('translator')->get('Not Verified'); ?></span>
                            <?php endif; ?>
                        </li>
                        

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            <?php echo app('translator')->get('Balance'); ?>
                            <span class="font-weight-bold"><?php echo e(showAmount($user->balance)); ?>

                                <?php echo e(__($general->cur_text)); ?></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            <?php echo app('translator')->get('Referred By'); ?>
                            <span class="font-weight-bold">
                                <?php if($reff != null): ?>
                                    <a href="<?php echo e(route('moder.users.detail', $reff->id)); ?>"> <?php echo e($reff->username); ?> </a>
                                <?php else: ?>
                                    <?php echo app('translator')->get('none'); ?>
                                <?php endif; ?>
                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            <?php echo app('translator')->get('Total Referrals'); ?>
                            <span class="font-weight-bold"><a href="<?php echo e(route('moder.users.referrals', $user->id)); ?>">
                                    <?php echo e($user->referral->count()); ?></a> </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            <?php echo app('translator')->get('Total Referral Commissions'); ?>
                            <span class="font-weight-bold"><a
                                    href="<?php echo e(route('moder.users.commissions.deposit', $user->id)); ?>">
                                    <?php echo e($user->commissions->sum('amount')); ?> <?php echo e($general->cur_text); ?> </a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card b-radius-10 overflow-hidden mt-30 shadow">
                <div class="card-body" style="background: #3b4740;">
                    <h5 class="mb-20 text-muted"  style="color:#fff !important;"><?php echo app('translator')->get('Actions'); ?></h5>
                    <a data-toggle="modal" href="#addSubModal" class="btn btn-success  btn-block my-1 w-100" style="box-shadow:none;background:#299740;border-color:#299740">
                        <?php echo app('translator')->get('Add/Subtract Balance'); ?>
                    </a>
                    <a href="<?php echo e(route('moder.users.login.history.single', $user->id)); ?>"
                        class="btn btn-primary  btn-block my-1 w-100"  style="box-shadow:none;background: #e84b3c;border-color:#e84b3c;">
                        <?php echo app('translator')->get('Login Logs'); ?>
                    </a>
                    <a href="<?php echo e(route('moder.users.email.single', $user->id)); ?>"
                        class="btn btn-info btn-block my-1 w-100"  style="box-shadow:none;color:#fff;background: #51AEE5;border-color:#51AEE5;">
                        <?php echo app('translator')->get('Send Email'); ?>
                    </a>
                    <a href="<?php echo e(route('moder.users.login', $user->id)); ?>" target="_blank"
                        class="btn btn-dark  btn-block my-1 w-100"  style="box-shadow:none;background:#9F9898;border-color:#9F9898">
                        <?php echo app('translator')->get('Login as User'); ?>
                    </a>
                    <a href="<?php echo e(route('moder.users.email.log', $user->id)); ?>"
                        class="btn btn-warning  btn-block my-1 w-100"  style="box-shadow:none;background:#F3D55B;border-color:#F3D55B;">
                        <?php echo app('translator')->get('Email Log'); ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-7 col-md-7 mb-30">

            <div class="row mb-none-30">
                <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                    <div class="panel d-flex justify-content-around align-items-center">
                        <div class="icon">
                           <i><img src="<?php echo e(asset('asset/img/depositedadmin.svg')); ?>"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="currency-sign"> <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i></span>
                                <span class="amount"><?php echo e(showAmount($totalDeposit)); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Total Deposited'); ?></span>
                            </div>
                            <a class="pane-link" href="<?php echo e(route('moder.deposit.user.view', $user->id)); ?>"
                                class="item-link">Details</a>
                        </div>
                    </div>
                </div><!-- panel end -->


                <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                    <div class="panel d-flex justify-content-around align-items-center">
                        <div class="icon">
                            <i><img src="<?php echo e(asset('asset/img/withdrawalsadmin.svg')); ?>"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="currency-sign"><i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i></span>
                                <span class="amount"><?php echo e(showAmount($totalWithdraw)); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Total Withdrawn'); ?></span>
                            </div>
                            <a class="pane-link"
                                href="<?php echo e(route('moder.users.withdrawals', $user->id)); ?>">Details</a>
                        </div>
                    </div>
                </div><!-- panel end -->

                <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                    <div class="panel d-flex justify-content-around align-items-center">
                        <div class="icon">
                            <i><img src="<?php echo e(asset('asset/img/transactionsadmin.svg')); ?>"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount"><?php echo e($totalTransaction); ?></span>
                            </div>
                            <div class="desciption">
                                <span><?php echo app('translator')->get('Total Transactions'); ?></span>
                            </div>
                            <a class="pane-link"
                                href="<?php echo e(route('moder.users.transactions', $user->id)); ?>">Details</a>
                        </div>
                    </div>
                </div><!-- panel end -->

            </div>


            <div class="card mt-50">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-2"><?php echo app('translator')->get('User Information'); ?></h5>

                    <form action="<?php echo e(route('moder.users.update', [$user->id])); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;"><?php echo app('translator')->get('First Name'); ?><span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="<?php echo e($user->firstname); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold" style="margin-bottom:5px;"><?php echo app('translator')->get('Last Name'); ?> <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="lastname"
                                        value="<?php echo e($user->lastname); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;"><?php echo app('translator')->get('Email'); ?> <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="<?php echo e($user->email); ?>">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;"><?php echo app('translator')->get('Address 1'); ?> </label>
                                    <input class="form-control" type="text" name="address[address1]"
                                        value="<?php echo e(@$userAddress['address1']); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;"><?php echo app('translator')->get('Address 2'); ?> </label>
                                    <input class="form-control" type="text" name="address[address2]"
                                        value="<?php echo e(@$userAddress['address2']); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;"><?php echo app('translator')->get('City'); ?> </label>
                                    <input class="form-control" type="text" name="address[city]"
                                        value="<?php echo e(@$userAddress['city']); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;"><?php echo app('translator')->get('State'); ?> </label>
                                    <input class="form-control" type="text" name="address[state]"
                                        value="<?php echo e(@$userAddress['state']); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;"><?php echo app('translator')->get('Zip/Postal'); ?> </label>
                                    <input class="form-control" type="text" name="address[zip]"
                                        value="<?php echo e(@$userAddress['zip']); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;"><?php echo app('translator')->get('Country'); ?> </label>
                                    <select name="address[country]" class="form-control">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country); ?>"
                                                <?php if($country == @$userAddress['country']): ?> selected <?php endif; ?>>
                                                <?php echo e(__($country)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6"><?php echo app('translator')->get('User Status'); ?> </label>
                                <input type="checkbox" class="col-6" data-onstyle="success" 
                                    data-offstyle="danger" 
                                    data-on="<?php echo app('translator')->get('Active'); ?>"
                                    data-off="<?php echo app('translator')->get('Banned'); ?>" name="status"
                                    <?php if($user->status): ?> checked <?php endif; ?>>
                            </div>

                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6"><?php echo app('translator')->get('Email Verification'); ?> </label>
                                <input type="checkbox" class="col-6" data-on="<?php echo app('translator')->get('Verified'); ?>"
                                    data-off="<?php echo app('translator')->get('Unverified'); ?>" name="ev"
                                    data-onstyle="success" data-offstyle="danger"
                                    <?php if($user->ev): ?> checked <?php endif; ?>>

                            </div>

                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6" ><?php echo app('translator')->get('SMS Verification'); ?> </label>
                                <input type="checkbox" class="col-6" data-on="<?php echo app('translator')->get('Verified'); ?>"
                                    data-off="<?php echo app('translator')->get('Unverified'); ?>" name="sv"
                                    data-onstyle="success" data-offstyle="danger"
                                    <?php if($user->sv): ?> checked <?php endif; ?>>

                            </div>
                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6"><?php echo app('translator')->get('2FA Status'); ?> </label>
                                <input type="checkbox" class="col-6" data-on="<?php echo app('translator')->get('Active'); ?>"
                                    data-off="<?php echo app('translator')->get('Deactive'); ?>" name="ts"
                                    data-onstyle="success" data-offstyle="danger"
                                    <?php if($user->ts): ?> checked <?php endif; ?>>
                            </div>

                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6"><?php echo app('translator')->get('2FA Verification'); ?> </label>
                                <input type="checkbox" class="col-6" data-on="<?php echo app('translator')->get('Verified'); ?>"
                                    data-off="<?php echo app('translator')->get('Unverified'); ?>" name="tv"
                                    data-onstyle="success" data-offstyle="danger"
                                    <?php if($user->tv): ?> checked <?php endif; ?>>
                            </div>
                            
                                <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6"><?php echo app('translator')->get('User Verification'); ?> </label>
                                <input type="checkbox" class="col-6" data-on="<?php echo app('translator')->get('Verified'); ?>"
                                    data-off="<?php echo app('translator')->get('Unverified'); ?>" name="active_status_by_admin"
                                    data-onstyle="success" data-offstyle="danger"
                                    <?php if($user->active_status_by_admin == 1): ?> checked <?php endif; ?>>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block my-1 w-100" style="box-shadow:none;background: #4aa276;border-color: #4aa276;"><?php echo app('translator')->get('Save Changes'); ?>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    
    <div id="addSubModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title"><?php echo app('translator')->get('Add / Subtract Balance'); ?></h5>
                  
                </div>
                <form action="<?php echo e(route('moder.users.add.sub.balance', $user->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-6oup col-md-12">
                                <input type="checkbox" class="col-6" 
                                 data-onstyle="success" data-offstyle="danger"
                                data-on="<?php echo app('translator')->get('Add Balance'); ?>"
                                    data-off="<?php echo app('translator')->get('Subtract Balance'); ?>" name="act" checked>
                            </div>


                            <div class="form-group col-md-12">
                                <label><?php echo app('translator')->get('Amount'); ?><span class="text-danger">*</span></label>
                                <div class="input-group has_append">
                                    <input type="text" name="amount" class="form-control"
                                        placeholder="<?php echo app('translator')->get('Please provide positive amount'); ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text btn-primary" style="background: #3b4740;border-color: #3b4740"><i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #242B27;">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" style="background: #3b4740;border-color: #3b4740;box-shadow:none;"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn-success" style="background: #4aa276;border-color: #4aa276;box-shadow:none;"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('asset/static/checkbox/bootstrap-toggle.min.css')); ?>">
    <style>
        
        .form-control:focus{
            border: 2px solid #4aa276;
            box-shadow: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('asset/static/checkbox/bootstrap-toggle.min.js')); ?>"></script>
    <script>
        $(function() {
            $('input[type="checkbox"]').bootstrapToggle({
                // onActiveCls: 'btn-info',
                // offActiveCls: 'btn-dark',
                size: 'small',
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/users/detail.blade.php ENDPATH**/ ?>