@hasSection('datatable')
    @push('style')
        <link rel="stylesheet" href="{{ asset('asset/static/datatable/datatables.min.css') }}">
    @endpush
    @push('script')
        <script src="{{ asset('asset/static/datatable/datatables.min.js') }}"></script>
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
    @endpush
@endif
