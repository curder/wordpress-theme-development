<?php
/**
 * @package sunsettheme
 * ===============================
 * ADMIN PAGE
 * ===============================
 */
function sunset_add_admin_page() {
	// Generate Sunset Admin Page.
	add_menu_page( 'Sunset Theme Options', 'sunset', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/images/sunset-icon.png', 110 );

	// Generate Sunset Admin Sub Pages.
	add_submenu_page( 'alecaddd_sunset', 'Sunset Sidebar Options', '侧边栏', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page' );
	add_submenu_page( 'alecaddd_sunset', 'Sunset Theme Options', '主题设置', 'manage_options', 'alecaddd_sunset_theme', 'sunset_theme_support_page' );
	add_submenu_page( 'alecaddd_sunset', 'Sunset Contact Form', '联系表单', 'manage_options', 'alecaddd_sunset_theme_contact', 'sunset_contact_form_page' );
	add_submenu_page( 'alecaddd_sunset', 'Sunset CSS Options', '主题样式', 'manage_options', 'alecaddd_sunset_css', 'sunset_theme_settings_page' );

	// Activate custom settings
	add_action( 'admin_init', 'sunset_custom_settings' );
}

add_action( 'admin_menu', 'sunset_add_admin_page' );

function sunset_custom_settings() {
	// Sidebar Options
	register_setting( 'sunset-settings-group', 'profile_picture' );
	register_setting( 'sunset-settings-group', 'first_name' );
	register_setting( 'sunset-settings-group', 'last_name' );
	register_setting( 'sunset-settings-group', 'user_description' );
	register_setting( 'sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler' );
	register_setting( 'sunset-settings-group', 'facebook_handler' );
	register_setting( 'sunset-settings-group', 'google_plus_handler' );

	add_settings_section( 'sunset-sidebar-options', '侧边栏选项配置', 'sunset_sidebar_options', 'alecaddd_sunset' );

	add_settings_field( 'sidebar-profile-picture', '个人图片', 'sunset_sidebar_profile_picture', 'alecaddd_sunset', 'sunset-sidebar-options' );
	add_settings_field( 'sidebar-name', '全名', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-options' );
	add_settings_field( 'sidebar-description', '描述', 'sunset_sidebar_description', 'alecaddd_sunset', 'sunset-sidebar-options' );
	add_settings_field( 'sidebar-twitter', 'Twitter用户', 'sunset_sidebar_twitter', 'alecaddd_sunset', 'sunset-sidebar-options' );
	add_settings_field( 'sidebar-facebook', 'Facebook用户', 'sunset_sidebar_facebook', 'alecaddd_sunset', 'sunset-sidebar-options' );
	add_settings_field( 'sidebar-google-plus', 'Google+用户', 'sunset_sidebar_google_plus', 'alecaddd_sunset', 'sunset-sidebar-options' );

	// Theme Support Options
	register_setting( 'sunset-theme-support', 'post_formats' );
	register_setting( 'sunset-theme-support', 'custom_header' );
	register_setting( 'sunset-theme-support', 'custom_background' );
	add_settings_section( 'sunset-theme-options', '主题选项', 'sunset_theme_options', 'alecaddd_sunset_theme' );
	add_settings_field( 'post-formats', '文章类型', 'sunset_post_formats', 'alecaddd_sunset_theme', 'sunset-theme-options' );
	add_settings_field( 'custom-header', '惯例头部', 'sunset_custom_header', 'alecaddd_sunset_theme', 'sunset-theme-options' );
	add_settings_field( 'custom-background', '管理背景色', 'sunset_custom_background', 'alecaddd_sunset_theme', 'sunset-theme-options' );

	// Concat Form Options
	register_setting( 'sunset-contact-options', 'activate_contact' );
	add_settings_section( 'sunset-contact-section', '联系我们', 'sunset_contact_section', 'alecaddd_sunset_theme_contact' );
	add_settings_field( 'activate-form', '启用表单', 'sunset_activate_contact', 'alecaddd_sunset_theme_contact', 'sunset-contact-section' );

	// Custom Css Options
	register_setting( 'sunset-custom-css-options', 'sunset_css', 'sunset_sanitize_custom_css' );
	add_settings_section( 'sunset-custom-css-section', '主题样式', 'sunset_custom_css_section_callback', 'alecaddd_sunset_css' );
	add_settings_field( 'custom-css', '输入主题样式', 'sunset_custom_css_callback', 'alecaddd_sunset_css', 'sunset-custom-css-section' );
}

// Custom Css Callback Functions
function sunset_custom_css_section_callback() {
	return '输入您的自定义CSS样式';
}


function sunset_custom_css_callback() {
	$css = get_option( 'sunset_css' );
	$css = ( empty( $css ) ? '/* Sunset主题样式 */' : $css );
	echo '<div id="customCss">' . $css . '</div><textarea id="sunset_css" name="sunset_css" style="display:none;visibility:hidden;">' . $css . '</textarea>';
}

/**
 * 处理CSS输入
 *
 * @param $input
 *
 * @return string
 */
function sunset_sanitize_custom_css( $input ) {
	$output = esc_textarea( $input );
	return $output;
}


// Contact Form Callback Functions
function sunset_contact_section() {
	echo '激活和停用联系我们表单选项';
}

function sunset_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" ' . $checked . ' /> </label>';
}

// Post Formats Callback Functions
function sunset_theme_options() {
	echo '激活和停用特定的主题支持的选项';
}

function sunset_post_formats() {
	$options = get_option( 'post_formats' );

	$formats = array(
		'0'       => '标准',
		'aside'   => '日志',
		'gallery' => '相册',
		'link'    => '链接',
		'image'   => '图像',
		'quote'   => '引用',
		'status'  => '状态',
		'video'   => '视频',
		'audio'   => '音频',
		'chat'    => '聊天'
	);
	$output  = '';
	foreach ( $formats as $key => $format ) {
		$checked = ( is_array( $options ) && array_key_exists( $key, $options ) ) ? 'checked' : '';
		$output .= sprintf( '<label><input type="checkbox" id="%s" name="%s[%s]" value="1" %s>%s</label><br/>', $format, 'post_formats', $key, $checked, $format );
	}
	echo $output;
}

function sunset_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" ' . $checked . ' /> 启用惯例头部</label>';
}

function sunset_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" ' . $checked . ' /> 启用惯例背景色</label>';
}

// Sidebar Options Functions
function sunset_sidebar_options() {
	echo '侧边栏的自定义配置';
}

function sunset_sidebar_profile_picture() {
	$profilePicture = esc_attr( get_option( 'profile_picture' ) );
	if ( empty( $profilePicture ) ) {
		echo '<input type="button" class="button button-secondary" value="上传个人图片" id="upload_button"><input type="hidden" name="profile_picture" value="" id="profile_picture" />';
	} else {
		echo sprintf( '<input type="button" class="button button-secondary" value="修改个人图片" id="upload_button"><input type="hidden" name="profile_picture" value="%s" id="profile_picture" /><input type="button" class="button button-secondary" value="删除" id="remove_profile_picture" />', $profilePicture );
	}
}

function sunset_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName  = esc_attr( get_option( 'last_name' ) );
	echo sprintf( '<input type="text" name="first_name" value="%s" placeholder="姓" />', $firstName ), sprintf( '<input type="text" name="last_name" value="%s" placeholder="名" />', $lastName );
}

function sunset_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo sprintf( '<input type="text" name="user_description" value="%s" placeholder="简单描述" /><p class="description">书写一些个人的简要描述</p>', $description );
}

function sunset_sidebar_twitter() {
	$twitter_handler = esc_attr( get_option( 'twitter_handler' ) );
	echo sprintf( '<input type="text" name="twitter_handler" value="%s" placeholder="Twitter用户" /><p class="description">输入的用户名不包含@字符.</p> ', $twitter_handler );
}

function sunset_sidebar_facebook() {
	$facebook_handler = esc_attr( get_option( 'facebook_handler' ) );
	echo sprintf( '<input type="text" name="facebook_handler" value="%s" placeholder="Facebook用户" />', $facebook_handler );
}

function sunset_sidebar_google_plus() {
	$google_plus_handler = esc_attr( get_option( 'google_plus_handler' ) );
	echo sprintf( '<input type="text" name="google_plus_handler" value="%s" placeholder="Google+用户" />', $google_plus_handler );
}

// Sanitization settings
function sunset_sanitize_twitter_handler( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace( '@', '', $output ); // 处理前缀 @ 符号

	return $output;
}

// Template Submenu Functions
function sunset_theme_create_page() {
	require_once get_template_directory() . '/inc/templates/sunset-admin.php';
}

function sunset_theme_settings_page() {
	require_once get_template_directory() . '/inc/templates/sunset-custom-css.php';
}

function sunset_contact_form_page() {
	require_once get_template_directory() . '/inc/templates/sunset-contact-from.php';

}

function sunset_theme_support_page() {
	require_once get_template_directory() . '/inc/templates/sunset-theme-support.php';
}
