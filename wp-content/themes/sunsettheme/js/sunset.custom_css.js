jQuery(document).ready(function ($) {
    var updateCSS = function () {
        $("#sunset_css").val(editor.getSession().getValue());
    };
    $("#save_custom_css_form").submit(updateCSS);

});

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");
