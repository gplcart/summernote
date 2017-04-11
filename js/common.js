/* global GplCart, jQuery */
(function (GplCart, $) {

    "use strict";

    /**
     * Adds Summernote WYSIWYG editor to input elements
     * @returns {undefined}
     */
    GplCart.onload.moduleSummernoteLoad = function () {

        var input, inline, settings = GplCart.settings.summernote.config;

        if ($.fn.summernote) {
            $.each(GplCart.settings.summernote.selector, function (i, v) {
                input = $(v);
                if (input.length !== 0) {
                    inline = input.data('wysiwyg-settings');
                    if (inline && typeof inline === 'object') {
                        settings = $.extend(settings, inline);
                    }
                    input.summernote(settings);
                }
            });
        }
    };

})(GplCart, jQuery);