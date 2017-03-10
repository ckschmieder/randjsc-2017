<?php
$show_header_search = df_options( 'show_header_search', dahz_get_default( 'show_header_search' ) );
$rtl = ( is_rtl() ) ? 'rtl' : 'ltr';
?>

<?php if( $show_header_search == 1 && !is_customize_preview() ): ?>
  <div class="universe-search">
    <div class="universe-search-close ent-text"></div>
      <div class="search-container-close"></div>
    <div class="df_container-fluid fluid-max col-full">
      <div class="universe-search-form">
          <input type="text" id="searchfrm" name="search" class="universe-search-input" placeholder="<?php esc_attr_e('Type and press enter to search', 'dahztheme'); ?>" value="" autocomplete="off" spellcheck="false" dir="<?php echo $rtl; ?>">
      </div><!-- end universe search form -->
      <div class="universe-search-results">
          <div class="search-results-scroller">
              <div class="nano-content">
              </div>
          </div>
      </div>
    </div><!-- end df-container-fluid -->
  </div><!-- end universe search -->
<?php endif; ?>
