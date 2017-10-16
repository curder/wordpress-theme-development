<?php
/**
 * @package sunsettheme
 * ===============================
 * THEME SUPPORT OPTIONS
 * ===============================
 */
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
$output = array();
foreach ( $formats as $key => $format ) {
	$output[] = ( is_array( $options ) && array_key_exists( $key, $options ) ) ? $key : '';
}

if ( ! empty( $options ) ) {
	add_theme_support( 'post-formats', $output );
}
