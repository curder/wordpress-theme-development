jQuery(document).ready(function ($) {
    var mediaUploader;
    $("#upload_button").on('click', function (e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return true;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: '上传个人头像',
            button: {
                text: '选择个人头像'
            },
            multiple: false
        });
        mediaUploader.on('select', function () {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile_picture').val(attachment.url);
            // 刷新页面预览
            $("#profile-picture-preview").css({'background-image': 'url(' + attachment.url + ')'});
        });
        mediaUploader.open();
    });
});
