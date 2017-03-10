<?php
if (!defined('ABSPATH')) {
    exit;
}

// =============================================================================
// INCLUDES/ADMIN/CUSTOMIZER/THEME-CUSTOMIZER-OUTPUT.PHP
// -----------------------------------------------------------------------------
// Sets up custom output from the Customizer.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Generated CSS Output
//   02. User CSS Output
// =============================================================================

 add_action( 'wp_head', 'df_customizer_options_output_css', 9998, 0 );
// 01. Generated CSS
// =============================================================================
function df_customizer_options_output_css(){
    $output_path = THEME_DIR . '/includes/customizer/output-settings';
    
    require_once $output_path . '/variable-output.php';
    ob_start();
    echo "\n".'<style type="text/css">';
        require_once $output_path . '/customizer-general-output.php';
        require_once $output_path . '/customizer-header-output.php';
        require_once $output_path . '/customizer-content-output.php';
        require_once $output_path . '/customizer-button-output.php';
        require_once $output_path . '/customizer-footer-output.php';
        require_once $output_path . '/customizer-misc-output.php';
    echo '</style>'. "\n";
    $css = ob_get_contents(); ob_end_clean();

    //
    // 1. Remove comments.
    // 2. Remove whitespace.
    // 3. Remove starting whitespace.
    //

    $output = preg_replace( '#/\*.*?\*/#s', '', $css );            // 1
    $output = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output ); // 2
    $output = preg_replace( '/\s\s+(.*)/', '$1', $output );        // 3

    echo $output;
}

add_action( 'wp_head', 'df_customizer_custom_css_output', 9999, 0 );
// 02. Custom CSS
// =============================================================================
function df_customizer_custom_css_output() {
    $custom_css = df_options( 'custom_styles', dahz_get_default( 'custom_styles' ) );
    if ( $custom_css != '' ) : ?>
        <!-- Custom CSS -->
        <style type="text/css"><?php echo wp_strip_all_tags( $custom_css ); ?></style>
        <?php
    endif;
}
