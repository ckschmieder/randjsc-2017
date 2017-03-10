<?php
 
if ( ! defined( 'ABSPATH' ) ) { 
  exit;
} 
/*-----------------------------------------------------------------------------------

TABLE OF CONTENTS - CORE/ADMIN-CUSTOMIZER-BACKUP.PHP

- Import Page
- Export Page

-----------------------------------------------------------------------------------*/
ob_start();

// Import Page
// =============================================================================

    function dahz_customizer_import_option_page() {
    ?>
      <div class="col two-col import">
      <div class="stuffbox">
        <h4 class="title"><span class="dashicons dashicons-upload"></span><?php _e('Restore/Import', 'dahztheme'); ?></h4>
        <div class="padded">
        <?php
        if ( isset( $_FILES['import'] ) && check_admin_referer( 'dahz-customizer-import' ) ) {
          if ( $_FILES['import']['error'] > 0 ) {
            wp_die( 'An error occured.' );
          } else {
            WP_Filesystem();
            global $wp_filesystem;
            $file_name = $_FILES['import']['name'];
            $file_array = explode( '.', $file_name );
            $file_ext   = strtolower( end( $file_array ) );
            $file_size = $_FILES['import']['size'];
            if ( ( $file_ext == 'json' ) && ( $file_size < 500000 ) ) {
              $encode_options = $wp_filesystem->get_contents( $_FILES['import']['tmp_name'] );
              $options        = json_decode( $encode_options, true );
              foreach ( $options as $key => $value ) {
                 $value              = maybe_unserialize( $value );
                 $need_options[$key] = $value;
              }
              update_option( 'df_options', $need_options );

              $import_notice = sprintf( '<div class="updated"><p>%s</p></div>', __('All options were restored successfully!', 'dahztheme') );
              echo $import_notice;
            } else {
              $import_notice = sprintf( '<div class="error"><p>%s</p></div>', __('Invalid file or file size too big.', 'dahztheme') );
              echo $import_notice;
            }
          }
        }
        ?>
        <form method="post" enctype="multipart/form-data">
          <?php wp_nonce_field( 'dahz-customizer-import' ); ?>
          <p><?php _e( 'If you have settings in a backup file on your computer, the customizer can import those into this site. To get started, upload your backup file to import from below.', 'dahztheme' ); ?></p>
          <p>Choose a file from your computer: <input type="file" id="customizer-upload" name="import"></p>
          <p class="submit">
            <input type="submit" name="submit" id="customizer-submit" class="button button-primary" value="<?php _e( 'Upload File and Run Import', 'dahztheme'); ?>" disabled>
          </p>
        </form>
        </div>
        </div>
      </div>
    <?php
    }


    // Export Page
    // =============================================================================

    function dahz_customizer_export_option_page() {
      if ( ! isset( $_POST['export'] ) ) {
      ?>
        <div class="col two-col export">
        <div class="stuffbox">
          <h4 class="title"><span class="dashicons dashicons-download"></span><?php _e('Backup/Export', 'dahztheme'); ?></h4>
          <div class="padded">
          <form method="post">
            <?php wp_nonce_field( 'dahz-customizer-export' ); ?>
            <p><?php _e( 'When you click the button below, the Customizer will create a text file for you to save to your computer.', 'dahztheme' ); ?></p>
            <p><?php echo sprintf( __( 'This text file can be used to restore your settings here on "%s", or to easily setup another website with the same settings".', 'dahztheme' ), get_bloginfo( 'name' ) ); ?></p>
            <p class="submit"><input type="submit" name="export" class="button button-primary" value="<?php _e('Download Export File', 'dahztheme'); ?>"></p>
          </form>
          </div>
          </div>
        </div>
      <?php
      } elseif ( check_admin_referer( 'dahz-customizer-export' ) ) {

        $blogname  = strtolower( str_replace( ' ', '', get_option( 'blogname' ) ) );
        $date      = date( 'm-d-Y' );
        $json_name = $blogname . '-dahz-customizer-' . $date;
        $options   = get_option('df_options');

        unset( $options['nav_menu_locations'] );

        foreach ( $options as $key => $value ) {
          $value              = maybe_unserialize( $value );
          $need_options[$key] = $value;
        }

        $json_file = json_encode( $need_options );

        ob_clean();
        
        echo $json_file;  

        header( 'Content-Type: text/json; charset=' . get_option( 'blog_charset' ) );
        header( 'Content-Disposition: attachment; filename="' . $json_name . '.json"' );

        exit();

      }
    }