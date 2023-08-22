<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius-10 ">
                <div class="card-body p-0">
                    <form
                        action="<?php echo e(route('moder.users.search',$scope =str_replace('admin.users.','',request()->route()->getName()) ?? 'null')); ?>"
                        method="GET" class="form-inline float-sm-right ">
                        <div class="input-group has_append">
                            <input type="text" name="search" class="form-control" style="border-bottom-left-radius:0px;border-top-left-radius:10px;" placeholder="<?php echo app('translator')->get('Username or email'); ?>"
                                value="<?php echo e($search = '' ?? null); ?>">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="background: #4aa276;border-color:#4aa276;border-bottom-right-radius:0px;border-top-right-radius:10px;border-bottom-left-radius:0px;border-top-left-radius: 0px;box-shadow:none;" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="btn-group-sm" style="margin-top:5px;">
                        <a href="<?php echo e(route('moder.users.active')); ?>" class="btn btn-success" style="border-top-left-radius: 0px;box-shadow:none;">Active users</a>
                        <a href="<?php echo e(route('moder.users.banned')); ?>" class="btn btn-danger" style="box-shadow:none;">Banned users</a>
                        <a href="<?php echo e(route('moder.users.email.unverified')); ?>" class="btn btn-success"style="box-shadow:none;">Email Unverified</a>
                        <a href="<?php echo e(route('moder.users.sms.unverified')); ?>" class="btn btn-success"style="box-shadow:none;">SMS Unverified</a>
                        <a href="<?php echo e(route('moder.users.with.balance')); ?>" class="btn btn-success"style="box-shadow:none;">Have Balance</a>
                    </div>
                    <div class="table custom-table">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('User'); ?></th>
                                    <th><?php echo app('translator')->get('Country'); ?></th>
                                    <th><?php echo app('translator')->get('Joined At'); ?></th>
                                    <th><?php echo app('translator')->get('Balance'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('User'); ?>">
                                            <span class="font-weight-bold"><?php echo e($user->fullname); ?></span>
                                            <br>
                                            <span class="small">
                                                <a
                                                    href="<?php echo e(route('moder.users.detail', $user->id)); ?>"><span>@</span><?php echo e($user->username); ?></a>
                                            </span>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Country'); ?>">
                                            <span class="font-weight-bold" data-toggle="tooltip"
                                                data-original-title="<?php echo e(@$user->address->country); ?>"><?php echo e($user->country_code); ?></span>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Joined At'); ?>">
                                            <?php echo e(showDateTime($user->created_at)); ?>

                                            <br> <?php echo e(diffForHumans($user->created_at)); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Balance'); ?>">
                                            <span class="font-weight-bold">

                                                <i><img src="<?php echo e(asset('asset/img/coins.svg')); ?>"></i><?php echo e(showAmount($user->balance)); ?>

                                            </span>
                                        </td>


                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="<?php echo e(route('moder.users.detail', $user->id)); ?>" class="icon-btn"
                                                data-toggle="tooltip" title="" data-original-title="<?php echo app('translator')->get('Details'); ?>">
                                                <i><img src="<?php echo e(asset('asset/img/desktop.svg')); ?>"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    <?php echo e(paginateLinks($users)); ?>

                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/demo.freeloot.net/core/resources/views/admin/users/list.blade.php ENDPATH**/ ?>