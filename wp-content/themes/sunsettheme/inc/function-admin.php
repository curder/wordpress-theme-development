<?php
/**
 * @package sunsettheme
 * ===============================
 * ADMIN PAGE
 * ===============================
 */
function sunset_add_admin_page()
{
    // Generate Sunset Admin Page.
    add_menu_page('Sunset Theme Options', 'Sunset主题设置', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/images/sunset-icon.png', 110);

    // Generate Sunset Admin Sub Pages.
    add_submenu_page('alecaddd_sunset', 'Sunset Theme Options', '常规', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page');
    add_submenu_page('alecaddd_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_sunset_css', 'sunset_theme_settings_page');

    // Activate custom settings
    add_action('admin_init', 'sunset_custom_settings');
}

add_action('admin_menu', 'sunset_add_admin_page');

function sunset_custom_settings()
{
    register_setting('sunset-settings-group', 'first_name');
    register_setting('sunset-settings-group', 'last_name');
    register_setting('sunset-settings-group', 'user_description');
    register_setting('sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
    register_setting('sunset-settings-group', 'facebook_handler');
    register_setting('sunset-settings-group', 'google_plus_handler');

    add_settings_section('sunset-sidebar-options', '侧边栏选项配置', 'sunset_sidebar_options', 'alecaddd_sunset');

    add_settings_field('sidebar-name', '全名', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-options');
    add_settings_field('sidebar-description', '描述', 'sunset_sidebar_description', 'alecaddd_sunset', 'sunset-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter用户', 'sunset_sidebar_twitter', 'alecaddd_sunset', 'sunset-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook用户', 'sunset_sidebar_facebook', 'alecaddd_sunset', 'sunset-sidebar-options');
    add_settings_field('sidebar-google-plus', 'Google+用户', 'sunset_sidebar_google_plus', 'alecaddd_sunset', 'sunset-sidebar-options');
}


function sunset_sidebar_options()
{
    echo '侧边栏的自定义配置';
}

function sunset_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo sprintf('<input type="text" name="first_name" value="%s" placeholder="姓" />', $firstName), sprintf('<input type="text" name="last_name" value="%s" placeholder="名" />', $lastName);
}

function sunset_sidebar_description()
{
    $description = esc_attr(get_option('user_description'));
    echo sprintf('<input type="text" name="user_description" value="%s" placeholder="简单描述" /><p class="description">书写一些个人的简要描述</p>', $description);
}

function sunset_sidebar_twitter()
{
    $twitter_handler = esc_attr(get_option('twitter_handler'));
    echo sprintf('<input type="text" name="twitter_handler" value="%s" placeholder="Twitter用户" /><p class="description">输入的用户名不包含@字符.</p> ', $twitter_handler);
}

function sunset_sidebar_facebook()
{
    $facebook_handler = esc_attr(get_option('facebook_handler'));
    echo sprintf('<input type="text" name="facebook_handler" value="%s" placeholder="Facebook用户" />', $facebook_handler);
}

function sunset_sidebar_google_plus()
{
    $google_plus_handler = esc_attr(get_option('google_plus_handler'));
    echo sprintf('<input type="text" name="google_plus_handler" value="%s" placeholder="Google+用户" />', $google_plus_handler);
}

// Sanitization settings
function sunset_sanitize_twitter_handler($input)
{
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output); // 处理前缀 @ 符号
    return $output;
}


function sunset_theme_create_page()
{
    require_once get_template_directory() . '/inc/templates/sunset-admin.php';
}

function sunset_theme_settings_page()
{
    echo '<h1>Sunset Custom CSS</h1>';

}
