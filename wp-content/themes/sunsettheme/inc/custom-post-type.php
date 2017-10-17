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

	add_action( 'add_meta_boxes', 'sunset_add_meta_box' );
	add_action( 'save_post', 'sunset_save_contact_email_data' );
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
		case 'message':
			echo get_the_excerpt();
			break;
		case 'email':
			$email = get_post_meta( $post_id, 'sunset_contact_email_field', true );
			echo sprintf( '<a href="mailto:%s">%s</a>', $email, $email );
			break;
	}
}

/** CONTACT META BOXES */
function sunset_add_meta_box() {
	add_meta_box( 'contact_email', '用户邮箱', 'sunset_contact_email_callback', 'sunset-contact', 'side' );
}

function sunset_contact_email_callback( $post ) {
	wp_nonce_field( 'sunset_save_email_data', 'sunset_concat_email_meta_box_nonce' );
	$value = get_post_meta( $post->ID, 'sunset_contact_email_field', true );
	echo sprintf( '<label for="sunset_contact_email_field">用户邮箱地址 </label><input type="text"  id="sunset_contact_email_field" name="sunset_contact_email_field" size="25" value="%s">', esc_attr( $value ) );
}

/**
 * 保存联系我们表单邮箱数据
 *
 * @param $post_id
 *
 * @return bool
 */
function sunset_save_contact_email_data( $post_id ) {
	if ( ! isset( $_POST['sunset_concat_email_meta_box_nonce'] ) ) {
		return false;
	}

	if ( ! wp_verify_nonce( $_POST['sunset_concat_email_meta_box_nonce'], 'sunset_save_email_data' ) ) {
		return false;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return false;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return false;
	}
	if ( ! isset( $_POST['sunset_contact_email_field'] ) ) {
		return false;
	}
	$my_data = sanitize_text_field( $_POST['sunset_contact_email_field'] );

	update_post_meta( $post_id, 'sunset_contact_email_field', $my_data );
}
