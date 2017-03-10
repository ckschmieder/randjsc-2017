<?php

/**
* Admin Base 
*
* @version 2.0.0
* @author Dahz
*/
class Dahz_screen_admin_base
{	

	/**
	 * get minimize script
	 * @var array
	 * @since 1.5.0
	 * 
	 */
    public $suffix;
	/**
	 * Array of data for the current theme.
	 * @access  protected
	 * @var     array
	 * @since   1.5.0
	 */
	protected $theme_data = array();

	/**
	 * Instance of the WP_Theme class.
	 * @access  protected
	 * @var     StdClass
	 * @since   1.5.0
	 */
	protected $theme_obj = null;
	

	function __construct() {

		$this->set_theme_data();	
	
	}


	/**
	 * Set the theme data into a local property.
	 * @access  protected
	 * @since   6.0.0
	 * @return  void
	 */
	protected function set_theme_data () {
		$this->theme_data   = get_theme_framework_version_data();
		$this->theme_obj    = wp_get_theme();
	} // End set_theme_data()


	/**
	 * Enqueue CSS styles.
	 * @access  public
	 * @since   1.5.0
	 * @return  void
	 */
	public function admin_css () {
		$this->suffix   = dahz_get_min_suffix();
		$stylesheet_url = DF_CORE_CSS_DIR . 'activation'. $this->suffix .'.css';
		wp_enqueue_style( 'dahz-activation', $stylesheet_url, array(), '1.5.0', 'all' );
	} // End admin_css()


	/**
	 * Generate and retrieve HTML for the admin logo branding.
	 * @access public
	 * @since  1.5.0
	 * @return string Generate HTML for the admin logo branding.
	 */
	public static function get_admin_branding () {
		$html = '<span class="logo alignright">' . "\n";
		$html .= '<img src="' . esc_url( apply_filters( 'dahz_branding_logo', DF_CORE_IMG_DIR . 'logo.png' ) ) . '" />' . "\n";
		$html .= '</span><!--/.logo-->' . "\n";
		return $html;
	} // End get_admin_branding()

}