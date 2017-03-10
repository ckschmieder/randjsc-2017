<?php
$site_title 			    = get_bloginfo( 'name' );
$site_description 			= get_bloginfo( 'description' );
$df_logo 				    = df_options( 'logo', dahz_get_default( 'logo' ) );
$df_logo_alt 			    = df_options( 'logo_alt', dahz_get_default( 'logo_alt' ) );
$df_logo_light 			    = df_options( 'logo_light', dahz_get_default( 'logo_light' ) );
$df_logo_dark 				= df_options( 'logo_dark', dahz_get_default( 'logo_dark' ) );
$df_dark_light_transparency = df_options( 'default_dark_light_transparency', dahz_get_default( 'default_dark_light_transparency' ) );
$navbar_transparency 		= df_options( 'enable_navbar_transparency', dahz_get_default( 'enable_navbar_transparency' ) );
$meta_header_transparency   = get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true );
$navbar_transparency_scheme = $navbar_transparency_class = '';

/*
  customizer dan get post meta this logic only work in some php file
  1. branding.php
  2. customizer-header-output.php
  3. localize.php -> main.js
  because this file is related one to another but the output not always same e.g
  branding just need to distinguish original logo  and transparency logo
 */
    if( $navbar_transparency == 1 ) {
       $navbar_transparency_class = 'nav-transparent';
    }
	if ( (isset( $df_dark_light_transparency )) ) {
		$navbar_transparency_scheme = $df_dark_light_transparency;
	}
	if ( ( $meta_header_transparency ) && ( $meta_header_transparency != 'default' ) ) {
		$navbar_transparency_class = 'nav-transparent';
		$navbar_transparency_scheme = get_post_meta( df_get_the_id(), 'df_metabox_header_transparency', true );
	}

	if ( ( $meta_header_transparency ) && ( $meta_header_transparency == 'no-transparency' ) ) {
		$navbar_transparency_class = '';
	    $navbar_transparency_scheme = '';
	}

$logo = $df_logo;
if( $navbar_transparency_class == 'nav-transparent' ){
	if( $navbar_transparency_scheme == 'dark' ):
		$logo = $df_logo_dark;
	elseif( $navbar_transparency_scheme == 'light' ):
		$logo = $df_logo_light;
	endif;
}
?>

	<div <?php dahz_attr( 'branding' ); ?> class="site-branding">
		<h1 class="site-title hide">
			<a href="#" title="" class="df-sitename"><?php echo $site_title; ?></a>
		</h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="df-sitename" rel="home">
			<?php echo ( $logo == '' ) ? $site_title : '<img class="normal-logo" src="' . esc_url( $logo ) . '" alt="' . esc_attr( $site_description ) . '">'; ?>
			<?php if ( $df_logo_alt != '' ) : ?>
			<?php echo '<img class="sticky-logo" src="' . esc_url( $df_logo_alt ) . '" alt="' . esc_attr( $site_description ) . '">'; ?>
			<?php endif; ?>
			</a>
	</div><!-- end of site branding -->

<script>
/* <![CDATA[ */
jQuery(function($) {

	logoChange();

	$(window).resize(function(e) {
		logoChange();
	});/*end resize function*/

	function logoChange(){
		var windowWidth = $(window).width(),
			normalLogo = $('.normal-logo');
		if ((windowWidth > 1050 || windowWidth < 800) || !dfGlobals.isMobile) {
			$(window).scroll(function() {
			    if ($(this).scrollTop() > 1){
			       <?php if( $df_logo_alt != '') { ?>
		            normalLogo.attr('src', '<?php echo esc_url($df_logo_alt) ?>' );
			       <?php } ?>
			    } else {
			    	<?php if( $df_logo_alt != '') { ?>
		             normalLogo.attr('src', '<?php echo esc_url($logo) ?>' );
			        <?php } ?>
			    }
			});
		}/*IF window Width*/
		else {
		    normalLogo.attr('src', '<?php echo esc_url($logo) ?>' );
		}/*else window width*/
	}
}); /*end jquery function*/
/* ]]> */
</script>