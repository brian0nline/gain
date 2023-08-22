<script src="<?php echo e(asset('asset/static/editor/nicEdit.js')); ?>"></script>

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
<?php /**PATH /home/freebpbk/public_html/core/resources/views/layouts/components/nice-editor.blade.php ENDPATH**/ ?>