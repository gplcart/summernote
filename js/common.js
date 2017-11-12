/* global Gplcart, jQuery */
(function (Gplcart, $) {

    "use strict";

    /**
     * Adds Summernote WYSIWYG editor to input elements
     * @returns {undefined}
     */
    Gplcart.onload.moduleSummernoteLoad = function () {

        var input, inline, settings = Gplcart.settings.summernote.config;

        if ($.fn.summernote) {
            $.each(Gplcart.settings.summernote.selector, function (i, v) {
                input = $(v);
                if (input.length !== 0) {
                    inline = input.data('summernote-editor-settings');
                    if (inline && typeof inline === 'object') {
                        settings = $.extend(settings, inline);
                    }
                    input.summernote(settings);
                }
            });
        }
    };

})(Gplcart, jQuery);