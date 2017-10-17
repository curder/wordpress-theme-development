<h1>Sunset联系表单</h1>
<?php settings_errors(); ?>

<form action="options.php" method="post" class="sunset-general-form">
	<?php settings_fields( 'sunset-contact-options' ); ?>
	<?php do_settings_sections( 'alecaddd_sunset_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>
