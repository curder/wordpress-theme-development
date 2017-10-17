<?php
/**
 * @package sunsettheme
 * ===============================
 * THEME CUSTOM POST TYPES
 * ===============================
 */
$contact = get_option( 'activate_contact' );
if ( @$contact == 1 ) {
	add_action( 'init', 'sunset_contact_custom_post_type' ); // 启用设置主题
}

/* CONTACT CUSTOM POST TYPE */
function sunset_contact_custom_post_type() {
	$labels = array(
		'name'           => 'Messages',
		'singular'       => 'Message',
		'menu_name'      => 'Messages',
		'name_admin_bar' => 'Message'
	);
	$args   = array(
		'labels'          => $labels,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'capability_type' => 'post',
		'hierarchical'    => false,
		'menu_position'   => 26,
		'menu_icon'       => 'dashicons-email-alt',
		'supports'        => array( 'title', 'editor', 'author' ),
	);
	register_post_type( 'sunset-contact', $args );
}
