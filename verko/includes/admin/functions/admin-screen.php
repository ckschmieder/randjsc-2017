<?php
if(!function_exists('df_theme_screen_config')) :
  /**
   * such a feature
   * @return array
   */
  function df_theme_screen_config(){
    $args = array(
      'theme_description' => 'Congratulations, you\'ve installed the best business theme for wordpress, Now let Us help you to create great website for your business.',
      'theme_badge' => get_template_directory_uri() . '/includes/assets/images/verko.png',
      'theme_content' => 'df_screen_home', // callback
       );

    return $args;
  }
endif;

add_filter('dahz_screen_config', 'df_theme_screen_config');

function df_screen_home(){
  ob_start();?>
    <div>
        <h3>New to Wordpress?</h3>
        <p>We recommend your to read Wordpress <a href="http://codex.wordpress.org/WordPress_Lessons">guide</a> and Verko <a href="http://support.daffyhazan.com/online-docs/category/verko/">documentation</a></p>
      </div>

        <div class="row group"><!--Start row group one  -->
          <div class="col two-col">
            <h3>Want our demo content?</h3>
            <ol>
              <li><a href="<?php echo get_admin_url().'admin.php?page=dahz-addons'; ?>">Install required Plugins</a></li>
              <li><a href="<?php echo get_admin_url().'import.php?import=wordpress'; ?>">Import Demo Content</a></li>
              <li><a href="<?php echo get_admin_url().'admin.php?page=dahz-backup'; ?>">Import Customizer Setting</a></li>
            </ol>
          </div>

          <div class="col two-col">
            <h3>See Our Demo</h3>
            <ul>
              <li><a href="http://dahz.daffyhazan.com/verko/home-v4/">Business</a></li>
              <li><a href="http://dahz.daffyhazan.com/verkoagency/">Agency</a></li>
              <li><a href="http://dahz.daffyhazan.com/verkoapp/">App (one page)</a></li>
              <li><a href="http://dahz.daffyhazan.com/verko/home-v3/">App (multi page)</a></li>
              <li><a href="http://dahz.daffyhazan.com/verko/home-v5/">With full screen slider</a></li>
              <li><a href="http://dahz.daffyhazan.com/verko/blank-demo-v2/">Landing Pages (Newsletter)</a></li>
              <li><a href="http://dahz.daffyhazan.com/verko/blank-demo-v1/">Landing Pages (Download Page)</a></li>
              <li><a href="http://dahz.daffyhazan.com/verko/under-construction-v2/">Coming soon Page</a></li>
            </ul>
          </div>
        </div><!--end row group one  -->
    <hr />

    <div><!--Start row group two  -->
      <h3>Resources</h3>
      <p>Here you can read documentations of the theme and plugins to help you to get around the theme.</p>
    </div>
    <div class="row group">
      <div class="col two-col">
        <ul>
          <li><a href="http://support.daffyhazan.com/online-docs/category/verko/">Online Docs</a></li>
          <li><a href="http://support.daffyhazan.com/section/verko/">Knowledgebase </a></li>
          <li><a href="http://daffyhazan.com/verko-changelog/">Changelog </a></li>
          <li><a href="http://support.daffyhazan.com/forums/verko/">Support Forum</a></li>
        </ul>
      </div>
      <div class="col two-col">
        <ul>
          <li><a href="http://masterslider.com/doc/">Master Slider</a></li>
          <li><a href="contactform7.com/docs/">Contact Form 7</a></li>
          <li><a href="https://wpbakery.atlassian.net/wiki/display/VC/Visual+Composer+Pagebuilder+for+WordPress">Visual Composer</a></li>
        </ul>
      </div>
    </div><!--end row group two  -->
    <hr />

    <div><!--Start row group three  -->
      <h3>About Us</h3>
    </div>
    <div class="row group">
      <div class="col two-col">
        <p>
          We grow when people tell their friends about us, We’re flattered every time someone spreads the good word.
        </p>
        <p>
          <a href="http://themeforest.net/downloads">
            <img src="<?php echo get_template_directory_uri() . '/includes/assets/images/rate_button.png'; ?>" alt="RateUs" />
          </a>
          <div class="clear"></div>
          <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://themeforest.net/item/verko-responsive-business-one-page-wp-theme/11813617" data-text="Verko responsive business one page wp theme |" data-size="large">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

        </p>
      </div>
      <div class="col two-col">
        <ul>
          <li><a href="http://daffyhazan.com">Dahz Official Website</a></li>
          <li><a href="http://themeforest.net/user/Dahz">Dahz in themeforest</a></li>
          <li><a href="http://themeforest.net/user/Dahz/portfolio">Dahz Portfolio</a></li>
        </ul>
      </div>
    </div><!--end row group three  -->
    <hr />

    <div><!--Start row group four  -->
      <h3>More item by dahz</h3>
    </div>
    <div class="more-item">
      <a href="http://themeforest.net/item/food-cook-multipurpose-food-recipe-wp-theme/4915630" target="_blank"><img src="http://support.daffyhazan.com/preview/thumb/food-cook-thumb.png" alt="Food and Cook"></a>
      <a href="http://themeforest.net/item/labomba-responsive-multipurpose-wordpress-theme/6106367" target="_blank"><img src="http://support.daffyhazan.com/preview/thumb/labomba-thumb.png" alt="Labomba"></a>
      <a href="http://themeforest.net/item/az-multi-retail-concept-wordpress-theme/9279746" target="_blank"><img src="http://support.daffyhazan.com/preview/thumb/az-thumb.png" alt="AZ"></a>
      <a href="http://themeforest.net/item/loma-the-ultimate-wp-blog-theme/9930474" target="_blank"><img src="http://support.daffyhazan.com/preview/thumb/loma-thumb.png" alt="Loma"></a>
      <a href="http://themeforest.net/item/liesel-cafe-dining-and-bakery-wordpress-theme/10176485" target="_blank"><img src="http://support.daffyhazan.com/preview/thumb/liesel-thumb.png" alt="Liesel"></a>
      <a href="http://themeforest.net/item/dejure-responsive-wp-theme-for-law-firm-business/11228701" target="_blank"><img src="http://support.daffyhazan.com/preview/thumb/dejure-thumb.png" alt="Dejure"></a>
      <a href="http://themeforest.net/item/fashion-blog-theme-applique/13915999" target="_blank"><img src="http://support.daffyhazan.com/preview/thumb/applique-thumb.png" alt="Applique"></a>
    </div>
  <?php
  $output = ob_get_contents(); ob_end_clean();
  echo $output;
}
