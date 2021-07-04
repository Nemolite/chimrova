<?php
/**
 * Дочерняя тема для темы posterity
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
	wp_enqueue_style( 'magnific-style', get_stylesheet_directory_uri() .'/assets/css/magnific-popup.css' );
	
	
	wp_enqueue_script( 'magnific-script', get_stylesheet_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), $theme_version, true );
	wp_enqueue_script( 'chimrova-script', get_stylesheet_directory_uri() . '/assets/js/chimrova.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'chimrova_scripts_style' );

/**
 * Коррктировка футера
 */

if(!function_exists('posterity_theme_footer')){
	function posterity_theme_footer(){
		global $posterity_a13;

		//Header Footer Elementor Plugin support
		if ( function_exists( 'hfe_render_footer' ) ) {
			hfe_render_footer();
		}

		if( $posterity_a13->get_option( 'footer_switch', 'on' ) === 'off' ){
			//no theme footer
			return;
		}

		if ( function_exists( 'elementor_location_exits' ) && elementor_location_exits( 'footer', true ) ) {
			echo '<div class="container-elementor-footer">';
		}


		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {


			$html = '';

			ob_start();
			posterity_footer_widgets();
			//posterity_footer_items();
			chimrova_footer_items();

			$output = ob_get_contents();
			ob_end_clean();

			if(strlen($output)){
				$header_type = $posterity_a13->get_option( 'header_type' );
				$to_move     = $header_type === 'vertical' ? '' : 'to-move';
				$width       = ' ' . $posterity_a13->get_option( 'footer_content_width' );
				$style       = ' ' . $posterity_a13->get_option( 'footer_content_style' );
				$separator   = $posterity_a13->get_option( 'footer_separator' ) === 'on' ? ' footer-separator' : '';

				$footer_class = $to_move.$width.$style.$separator;
				$html = '<footer id="footer" class="'.esc_attr($footer_class).'"'.posterity_get_schema_args('footer').'>'.$output.'</footer>';
			}

			//escaped on creation
			print $html;
		}


		if ( function_exists( 'elementor_location_exits' ) && elementor_location_exits( 'footer', true ) ) {
			echo '</div>';//.container-elementor-footer
		}
	}
}

if(!function_exists('chimrova_footer_items')) {
	/**
	 * Prints out HTML for footer items
	 */
	function chimrova_footer_items() {
		global $posterity_a13; ?>
			<div class="foot-items">
				<div class="foot-content clearfix">
				<div class="chv-footer-left">
	                <?php
	                footer_socials();
	                //footer text
	                $ft = do_shortcode( $posterity_a13->get_option( 'footer_text' ) );
	                $privacy = $posterity_a13->get_option( 'footer_privacy_link' ) === 'on';

					
				
					if(!empty($ft)){
		                echo '<div class="foot-text">';
		              ?>
					  The theme <a href="https://kaa.wordpress.org/themes/posterity/" target="_blank">
  Posterity
</a> is 
<a href="https://ru.wordpress.org/" target="_blank">
  WordPress
</a>

Theme with using
<a href="https://elementor.com/" target="_blank">
  Elementor 
</a> 
					  <?php
		                echo '</div>';
	                }

	                ?>
				</div>
				<div class="chv-footer-right">
				<div class="foot-text">
				Создание сайта: 
<a href="http://vandraren.ru/" target="_blank">
  VANDRAREN - разработка web-проектов
</a> 
				</div>	
				</div>
				</div>
			</div>
		<?php
	}
}

?>
