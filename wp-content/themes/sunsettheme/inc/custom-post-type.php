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

	add_filter( 'manage_sunset-contact_posts_columns', 'sunset_set_contact_columns' );
	add_action( 'manage_sunset-contact_posts_custom_column', 'sunset_contact_custom_column', 10, 2 );
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

function sunset_set_contact_columns( $columns ) {
	$newColumns = array(
		'title'   => '用户名',
		'message' => '留言',
		'email'   => '邮箱',
		'date'    => '时间',
	);

	return $newColumns;
}

function sunset_contact_custom_column( $column, $post_id ) {
	switch ( $column ) {
		case 'title':
			break;
		case 'message':
			echo get_the_excerpt();
			break;
		case 'email':
			break;
		case 'date':
			break;
	}
}
