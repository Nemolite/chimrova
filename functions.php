<?php
/**
 * Дочерняя тема для темы singlepage
 * 
 */

defined( 'ABSPATH' ) || exit;

/**
 * Helper
 */
function show($param){
	echo "<pre>";
	print_r($param);
	echo "</per>";
}

function chimrova_scripts_style() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'chimrova-style', get_stylesheet_directory_uri() .'/assets/css/chimrova.css' );
	wp_enqueue_script( 'chimrova-script', get_stylesheet_directory_uri() . '/assets/js/chimrova.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'chimrova_scripts_style' );



?>
