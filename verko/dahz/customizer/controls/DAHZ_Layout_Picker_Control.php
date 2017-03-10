<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Class to create a custom layout control, extend the WP customizer
 *
 * array(
 *  $value => array( 'url' => $image_url, 'label' => $text_label ),
 *  $value => array( 'url' => $image_url, 'label' => $text_label ),
 * )
 * @since 1.2.0
 */
class DAHZ_Layout_Picker_Control extends WP_Customize_Control
{

      public $type = 'images_radio';

      public function enqueue() {
        wp_enqueue_script( 'dahz-api-controls' );
      }

      public function to_json(){
        parent::to_json();

        // We need to make sure we have the correct image URL.
        foreach ( $this->choices as $value => $args ){
           if(isset( $this->choices[ $value ]['url'] )){
             $this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );
           }
         }

          $this->json['choices'] = $this->choices;
          $this->json['link']    = $this->get_link();
          $this->json['value']   = $this->value();
          $this->json['id']      = $this->id;
      }

      /**
       * Underscore JS template to handle the control's output.
       *
       * @since 2.0.0
       * @return void
       */
      public function content_template() { ?>

          <# if( ! data.choices ) {
              return;
          } #>

           <span class="customize-control-title">
             <# if( data.label ) {
                {{ data.label }}
             } #>

              <# if( data.description ) { #>
                	<span class="description customize-control-description">{{{ data.description }}}</span>
              <# } #>
           </span>

           <ul>
             <# _.each( data.choices, function(args,choice) { #>
             <li>
               <label class="customize-images-picker">
                <input type="radio" class="image-radio" value="{{ choice }}" name="_customize-{{ data.type }}-{{ data.id }}" {{{ data.link }}} <# if ( choice === data.value ) { #> checked="checked" <# } #> />
                <img src="{{args.url}}" alt="{{args.label}}">
               </label>
             </li>
             <# } ) #>
           </ul>
      <?php }



}
