<script src="{{ asset('asset/static/editor/nicEdit.js') }}"></script>
{{-- LOAD NIC EDIT --}}
<script>
    (function($) {
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
            $('.nicEdit-main').focus();
        });
    })(jQuery);
</script>
