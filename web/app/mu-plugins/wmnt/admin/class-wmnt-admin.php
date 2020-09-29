<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://prodev.lt
 * @since      1.0.0
 *
 * @package    Wmnt
 * @subpackage Wmnt/admin
 */

use TopBroker\TopBrokerApi;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wmnt
 * @subpackage Wmnt/admin
 * @author     Romualdas D. <hello@prodev.lt>
 */
class Wmnt_Admin {

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
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( string $plugin_name, string $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function init()
	{
		add_rewrite_rule(
			'nt/([A-Za-z0-9-]+)/?$',
			'index.php?retype=$matches[1]',
			'top'
		);

		add_rewrite_rule(
			'nt/([A-Za-z0-9-]+)/([A-Za-z0-9-]+)/?$',
			'index.php?retype=$matches[1]&reobj=$matches[2]',
			'top'
		);
	}

	public function query_vars($query_vars)
	{
		$query_vars[] = 'retype';
		$query_vars[] = 'reobj';
		$query_vars[] = 'ntobjs';

		return $query_vars;
	}

	public function wpseo_title($title)
	{
		$retype = get_query_var('retype');
		$reobj = get_query_var( 'reobj' );

		if (!empty($retype) && !empty($reobj)) {
			return ucwords($reobj) . ' - ' .get_bloginfo('name');
		}

		if (!empty($retype)) {
			return ucwords($retype) . ' - ' .get_bloginfo('name');
		}

		return $title;
	}

	public function template_include($template)
	{
		$retype = get_query_var( 'retype' );
		$reobj = get_query_var( 'reobj' );

		if (!empty($retype) && !empty($reobj)) {

			set_query_var('reobj', 'changeme');

			return get_template_directory() . '/resources/views/nt-obj.blade.php';

		}

		if (!empty($retype)) {

			set_query_var('ntobjs', $this->set_retype_data($retype));

			return get_template_directory() . '/resources/views/nt-objs.blade.php';

		}

		return $template;
	}

	private function set_retype_data($retype)
	{
		$topbroker = new TopBrokerApi('3f67c759bf4fc791b', 'a5e79e85-9624-49c5-a9cc-261e270ff307');
		$page = (int) filter_var($_GET['page'] ?? 1, FILTER_SANITIZE_NUMBER_INT);
		$per_page = 6;

		$params = [
			'estate_type' => [$this->get_estate_type_param($retype)],
			'sort_by' => 'date',
			'sort_to' => 'desc',
		];

		if ($retype == 'nuoma') {
			$params['for_rent'] = true;
			$params['estate_type'] = null;
		}

		if ($retype == 'butai') {
			$params['for_sale'] = true;
		}

		if ($retype == 'nauja-statyba') {
			$params['estate_type'] = null;
			$params['custom_fields'] = [
				'c_f_e_nauja_statyba_skiltis_tinklapyje' => 'Taip',
			];
		}

		$paginate_params = [
			'per_page' => $per_page,
			'page' => $page,
		];

		$estates_count = $topbroker->estates->getCount($params);
		$estates = $topbroker->estates->getList(array_merge($params, $paginate_params));
		$statuses = $topbroker->get('estates/record_statuses', []);

		return [
			'estates' => $estates,
			'statuses' => $statuses,
			'pages_count' => (int) ceil($estates_count->records / $per_page),
			'current_page' => $page,
		];
	}

	private function get_estate_type_param($retype)
	{
		switch ($retype)
		{
			case 'butai':
				return 'flat';
			case 'namai':
				return 'house';
			case 'sklypai':
				return 'site';
			case 'komercija':
				return 'commercial';
		}
	}

}
