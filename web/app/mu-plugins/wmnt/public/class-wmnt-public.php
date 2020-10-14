<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://prodev.lt
 * @since      1.0.0
 *
 * @package    Wmnt
 * @subpackage Wmnt/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wmnt
 * @subpackage Wmnt/public
 * @author     Romualdas D. <hello@prodev.lt>
 */
class Wmnt_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wmnt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wmnt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wmnt-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wmnt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wmnt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wmnt-public.js', array( 'jquery' ), $this->version, false );

	}

	public function query_vars($query_vars)
    {
        $query_vars[] = 'related_posts';
        $query_vars[] = 'strings';

        return $query_vars;
    }

    public function wp()
    {
        $strings = [];

        foreach (get_field('strings', 'options') as $grp) {
            $strings[sanitize_title($grp['key'])] = $grp['value'];
        }

        set_query_var('strings', $strings);

        if (is_singular('post')) {
            $args = [
                'numberposts' => 3,
                'post__not_in' => [get_queried_object_id()],
            ];

            set_query_var('related_posts', get_posts($args));
        }
    }
}
