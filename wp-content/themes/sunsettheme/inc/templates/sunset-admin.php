<h1>主题选项</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post">
    <?php settings_fields('sunset-settings-group'); ?>
    <?php do_settings_sections('alecaddd_sunset'); ?>
    <?php submit_button(); ?>
</form>