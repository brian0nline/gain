<?php $__env->startSection('panel'); ?>
    <div id="app">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row justify-content-between">
                            <div class="col-md-7">
                                <ul>
                                    <li>
                                        <h5> <?php echo e(__($lang->name)); ?> <?php echo app('translator')->get('Language Keywords'); ?></h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-5 mt-md-0 mt-3">
                                <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-primary box-shadow text-small float-right" style="background:#4aa276;border-color: #4aa276;box-shadow:none;">
                                    <i class="fas fa-plus"></i> <?php echo app('translator')->get('Add New Key'); ?> </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive-sm table-responsive">
                            <table class="table table-light tabstyle-two custom-data-table white-space-wrap" id="myTable">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Key'); ?>
                                    </th>
                                    <th class="text-left">
                                        <?php echo e(__($lang->name)); ?>

                                    </th>

                                    <th class="w-85"><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $json; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('key'); ?>" class="white-space-wrap"><?php echo e($k); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Value'); ?>" class="text-left white-space-wrap"><?php echo e($language); ?></td>


                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="javascript:void(0)"
                                               data-target="#editModal"
                                               data-toggle="modal"
                                               data-title="<?php echo e($k); ?>"
                                               data-key="<?php echo e($k); ?>"
                                               data-value="<?php echo e($language); ?>"
                                               class="editModal btn btn-sm btn-primary ml-1"
                                               data-original-title="<?php echo app('translator')->get('Edit'); ?>" style="background:#4aa276;border-color:#4aa276;box-shadow:none;">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            <a href="javascript:void(0)"
                                               data-key="<?php echo e($k); ?>"
                                               data-value="<?php echo e($language); ?>"
                                               data-toggle="modal" data-target="#DelModal"
                                               class="btn btn-sm btn-danger ml-1 deleteKey"
                                               data-original-title="<?php echo app('translator')->get('Remove'); ?>" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background :#242b27">
                    <div class="modal-header" style="border-bottom:none;">
                        <h4 class="modal-title" id="addModalLabel"> <?php echo app('translator')->get('Add New'); ?></h4>
                        
                    </div>

                    <form action="<?php echo e(route('moder.language.store.key',$lang->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="key" class="font-weight-bold" style="margin-bottom:5px;"><?php echo app('translator')->get('Key'); ?></label>
                                <input type="text" class="form-control form-control-lg " id="key" name="key" placeholder="<?php echo app('translator')->get('Key'); ?>" value="<?php echo e(old('key')); ?>">

                            </div>
                            <div class="form-group">
                                <label for="value" class="font-weight-bold"  style="margin-bottom:5px;margin-top:10px;"><?php echo app('translator')->get('Value'); ?></label>
                                <input type="text" class="form-control form-control-lg" id="value" name="value" placeholder="<?php echo app('translator')->get('Value'); ?>" value="<?php echo e(old('value')); ?>">

                            </div>
                        </div>
                        <div class="modal-footer" style="border-top:none;">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"  style="background:#3B4740;border-color:#3B4740;box-shadow:none;"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn-primary"  style="background:#4aa276;border-color:#4aa276;box-shadow:none;"> <?php echo app('translator')->get('Save'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background: #242b27;">
                    <div class="modal-header" style="border-bottom:none;">
                        <h4 class="modal-title" id="editModalLabel"><?php echo app('translator')->get('Edit'); ?></h4>
                       
                    </div>

                    <form action="<?php echo e(route('moder.language.update.key',$lang->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group ">
                                <label for="inputName" class="font-weight-bold form-title" style="margin-bottom:5px;"></label>
                                <input type="text" class="form-control form-control-lg" name="value" placeholder="<?php echo app('translator')->get('Value'); ?>">
                            </div>
                            <input type="hidden" name="key">
                        </div>
                        <div class="modal-footer"  style="border-top:none;">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"  style="background:#3B4740;border-color:#3B4740;box-shadow:none;"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn-primary"  style="background:#4aa276;border-color:#4aa276;box-shadow:none;"><?php echo app('translator')->get('Update'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- Modal for DELETE -->
        <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="DelModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header" style="border-bottom:none;">
                        <h4 class="modal-title" id="DelModalLabel"><i class='fa fa-trash'></i> <?php echo app('translator')->get('Delete'); ?></h4>
                       
                    </div>
                    <div class="modal-body">
                        <strong><?php echo app('translator')->get('Are you sure to delete?'); ?></strong>
                    </div>
                    <form action="<?php echo e(route('moder.language.delete.key',$lang->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="key">
                        <input type="hidden" name="value">
                        <div class="modal-footer" style="border-top:none;">
                            <button type="button" class="btn btn-dark" data-dismiss="modal" style="background:#3B4740;border-color:#3B4740;box-shadow:none;"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn-danger " style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;"><?php echo app('translator')->get('Delete'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startSection('datatable', true); ?>
    <?php $__env->startSection('checkbox', true); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($){
            "use strict";
            $(document).on('click','.deleteKey',function () {
                var modal = $('#DelModal');
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });
            $(document).on('click','.editModal',function () {
                var modal = $('#editModal');
                modal.find('.form-title').text($(this).data('title'));
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.primary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/freebpbk/public_html/core/resources/views/admin/setting/language/edit_lang.blade.php ENDPATH**/ ?>