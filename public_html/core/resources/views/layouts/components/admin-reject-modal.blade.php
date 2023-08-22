{{-- confirm reject --}}
@push('script')
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="rejectModalTitle">@lang('Confirm Action')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>@lang('Are you sure to reject the task')</p>
                    <input type="text" class="form-control" placeholder="Whey ??" name="reason" />
                    <small>@lang('Optionally')</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="button" class="btn btn-primary" id="confirmBtn">@lang('Confirm')</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#rejectBtn, .rejectBtn').click(function(e) {
                e.preventDefault();
                $('.modal').modal('show');
            });
            $('#confirmBtn').click(function(e) {
                e.preventDefault();
                @if (request()->routeIs('moder.tasks.view'))
                    let url = "{{ route('moder.tasks.change-status', [$task, 4]) }}";
                @else
                    let url = "{{ url('moder/tasks') }}/" + $('#rejectBtn').data('id') + "/action/4";
                @endif
                let reason = $('[name="reason"]').val();
                if (reason != '')
                    url += ("?r=" + encodeURI(reason));
                window.location.href = url;
            });
        })
    </script>
@endpush
