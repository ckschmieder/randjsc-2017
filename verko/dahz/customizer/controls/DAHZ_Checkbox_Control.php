<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

/**
 * Customize for checkbox, extend the WP customizer
 *
 * @since 1.2.0
 */
class DAHZ_Checkbox_Control extends WP_Customize_Control {

	public $type = 'checkbox';
	public $mode = 'checkbox';

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   1.3.0
	 * @return  void
	 */
	public function render_content() {
		?>

		<?php $modeClass = ( 'toggle' == $this->mode ) ? 'ui toggle checkbox' : 'ui' ; ?>

		<div class="<?php echo $modeClass; ?>">
   		 	<input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="public" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( esc_attr( $this->value() ) );?> >
    		<label for="<?php echo esc_attr( $this->id ); ?>"><?php echo esc_html( $this->label ); ?></label>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
  	</div>


		<?php
	}

}
