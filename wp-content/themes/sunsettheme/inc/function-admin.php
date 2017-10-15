<?php
/**
 * @package sunsettheme
 * ===============================
 * Admin Page
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
    add_settings_section('sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options', 'alecaddd_sunset');
    add_settings_field('sidebar-name', 'First Name', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-options');
}


function sunset_sidebar_options()
{
    echo 'customize your sidebar information.';
}

function sunset_sidebar_name()
{
    $firstName = esc_attr(get_option('first_name'));
    echo sprintf('<input type="text" name="first_name" value="%s" placeholder="First Name" />', $firstName);
}

function sunset_theme_create_page()
{
    require_once get_template_directory() . '/inc/templates/sunset-admin.php';
}

function sunset_theme_settings_page()
{
    echo '<h1>Sunset Custom CSS</h1>';

}
