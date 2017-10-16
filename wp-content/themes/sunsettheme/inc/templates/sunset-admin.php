<h1>Sunset侧边栏设置</h1>
<?php settings_errors(); ?>

<?php
$picture     = esc_attr( get_option( 'profile_picture' ) );
$firstName   = esc_attr( get_option( 'first_name' ) );
$lastName    = esc_attr( get_option( 'last_name' ) );
$fullName    = $firstName . $lastName;
$description = esc_attr( get_option( 'user_description' ) );


?>

<div class="sunset-sidebar-preview">
    <div class="sunset-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture"
                 style="background-image: url('<?= $picture ?>')"></div>
        </div>
        <h1 class="sunset-username"><?= $fullName ?></h1>
        <h2 class="sunset-description"><?= $description ?></h2>
        <div class="icons-wrapper"></div>
    </div>
</div>

<form action="options.php" method="post" class="sunset-general-form">
	<?php settings_fields( 'sunset-settings-group' ); ?>
	<?php do_settings_sections( 'alecaddd_sunset' ); ?>
	<?php submit_button('保存更改','primary','btnSubmit'); ?>
</form>
