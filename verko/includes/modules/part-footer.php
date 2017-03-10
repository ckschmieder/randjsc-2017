<?php
if ( ! class_exists( 'DF_part_footer' ) ) :
/**
* Part Footer Actions
*
*
* @package      Verko
* @subpackage   classes
* @since        1.0
* @author       Dahz
* @copyright    Copyright (c) 2015, Dahz
* @license      http://www.gnu.org/licenses/gpl.html
*/

class DF_part_footer{

		static $instance;

		function __construct(){
			self::$instance =& $this;

			add_action( '__after_wrapper', array($this, 'df_show_google_analytics_tmp' ) );
			add_action( '__footer',  array($this, 'df_footer_main_display' ) );
		}

		function df_show_google_analytics_tmp(){

			$google_analytics = df_options( 'df_analytics_text', dahz_get_default( 'df_analytics_text' ) );
			 if( $google_analytics ): ?>
			<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
			<script>
			    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			    e.src='//www.google-analytics.com/analytics.js';
			    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			    ga('create','<?php echo stripslashes( $google_analytics ); ?>','auto');ga('send','pageview');
			</script>
			<?php
			endif;

		}

		function df_footer_main_display (){

			if ( is_404() || is_page_template( 'template-blank.php' ) ) return; // if not in 404 page or blnk tmp will shown

			$footer 		  = get_post_meta( df_get_the_id(), 'df_metabox_footer', true );
			$conditional_page = ( is_archive() || is_home() || is_search() );

		   	ob_start();
			if ( $footer || $footer == '' || $conditional_page ):
				dahz_get_footer( 'widgetbar' );  // Loads the includes/templates/footer/widgetbar.php template.
				dahz_get_footer( 'info-footer' );  // Loads the includes/templates/footer/info-footer.php template.
			endif;

			$html = ob_get_contents();
		    if ( $html ) ob_end_clean();
		    echo $html;
		}

} // end of class
endif;
new DF_part_footer;
