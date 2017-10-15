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
}

add_action('admin_menu', 'sunset_add_admin_page');

function sunset_theme_create_page()
{
    require_once get_template_directory() . '/inc/templates/sunset-admin.php';
}

function sunset_theme_settings_page()
{
    echo '<h1>Sunset Custom CSS</h1>';

}
