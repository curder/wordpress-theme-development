<h1>Sunset主题样式</h1>
<?php settings_errors(); ?>

<form action="options.php" method="post" class="sunset-general-form" id="save_custom_css_form">
	<?php settings_fields( 'sunset-custom-css-options' ); ?>
	<?php do_settings_sections( 'alecaddd_sunset_css' ); ?>
	<?php submit_button('保存更改','primary','btnSubmit'); ?>
</form>
