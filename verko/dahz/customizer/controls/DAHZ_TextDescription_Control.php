<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Customize for description, extend the WP customizer
 *
 * @since 1.2.0
 */
class DAHZ_TextDescription_Control extends WP_Customize_Control
{     
      public $type = 'description';
      /**
       * Render the content on the theme customizer page
       */

      public function content_template() { ?>
                <label>
                  <p class="customize-info"><span>NOTE:</span>{{ data.label }}</p>
                </label>
     <?php }

}