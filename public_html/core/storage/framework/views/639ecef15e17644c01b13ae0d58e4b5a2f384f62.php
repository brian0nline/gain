<?php if (! empty(trim($__env->yieldContent('datatable')))): ?>
    <?php $__env->startPush('style'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('asset/static/datatable/datatables.min.css')); ?>">
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('script'); ?>
        <script src="<?php echo e(asset('asset/static/datatable/datatables.min.js')); ?>"></script>
        <script>
            (function($) {
                "use strict";

                $('document').ready(function() {
                    $('table').DataTable({
                        scrollCollapse: false,
                        autoWidth: false,
                        responsive: true,
                        searching: false,
                        bLengthChange: false,
                        bPaginate: true,
                        bInfo: false,
                        columnDefs: [{
                            targets: "datatable-nosort",
                            orderable: false,
                        }],
                        "lengthMenu": [
                            [5, 25, 50, -1],
                            [5, 25, 50, "All"]
                        ],
                        "language": {
                            "info": "_START_-_END_ of _TOTAL_ entries",
                            searchPlaceholder: "Search",
                            paginate: {
                                next: '<i class="ion-chevron-right"></i>',
                                previous: '<i class="ion-chevron-left"></i>'
                            }
                        },
                    });
                });
            })(jQuery);
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home/freebpbk/public_html/core/resources/views/layouts/components/datatable.blade.php ENDPATH**/ ?>