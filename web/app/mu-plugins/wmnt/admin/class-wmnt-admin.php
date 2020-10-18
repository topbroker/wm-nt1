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

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
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

	private $topbroker;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( string $plugin_name, string $version ) {

        if (!session_id()) {
            session_start();

            if (isset($_SESSION['topbroker_flash'])) {
                $_SESSION['topbroker_flash'] = $_SESSION['topbroker_flash'] + 1;
            }

            if (!isset($_SESSION['topbroker_flash']) || $_SESSION['topbroker_flash'] > 1) {
                unset($_SESSION['topbroker_flash']);
                unset($_SESSION['topbroker_form_data']);
                unset($_SESSION['topbroker_error']);
                unset($_SESSION['topbroker_success']);
            }
        }

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$top_broker_api_user = get_option('options_top_broker_api_credentials_user');
		$top_broker_api_password = get_option('options_top_broker_api_credentials_password');

		$this->topbroker = new TopBrokerApi($top_broker_api_user, $top_broker_api_password);
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

		add_rewrite_rule(
			'komanda/([A-Za-z0-9-]+)/?$',
			'index.php?tbuser=$matches[1]',
			'top'
		);
	}

	public function query_vars($query_vars)
	{
		$query_vars[] = 'retype';
		$query_vars[] = 'reobj';
		$query_vars[] = 'reobj_data';
		$query_vars[] = 'reobjs';
		$query_vars[] = 'estate_types';
		$query_vars[] = 'cities';
		$query_vars[] = 'tbuser';

		return $query_vars;
	}

	public function wpseo_title($title)
	{
		$retype = get_query_var('retype');
		$reobj = get_query_var( 'reobj' );
		$tbuser = get_query_var( 'tbuser' );

		if (!empty($tbuser)) {
			return 'Komanda - ' .get_bloginfo('name');
		}

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
		$tbuser = get_query_var( 'tbuser' );

		set_query_var('estate_types', [
			'flat' => 'Butai',
			'house' => 'Namai',
			'site' => 'Sklypai',
			'commercial' => 'Komercija',
		]);

		if (!empty($tbuser)) {

			set_query_var('tbuser', $this->set_tbuser_data($tbuser));

			return get_template_directory() . '/resources/views/tbuser.blade.php';

		}

		if (!empty($retype) && !empty($reobj)) {

			set_query_var('reobj_data', $this->set_reobj_data($reobj));

			return get_template_directory() . '/resources/views/re-obj.blade.php';

		}

		if (!empty($retype) && empty($reobj)) {

			set_query_var('reobjs', $this->set_retype_data($retype));
			set_query_var('cities', $this->set_cities());

			return get_template_directory() . '/resources/views/re-objs.blade.php';

		}

		return $template;
	}

	public function body_class($classes)
	{
		$retype = get_query_var( 'retype' );
		$reobj = get_query_var( 'reobj' );
		$tbuser = get_query_var( 'tbuser' );

		if (!empty($tbuser)) {
			$classes[] = 'tbuser';
		}

		if (!empty($retype) && !empty($reobj)) {
			$classes[] = 'reobj';
		}

		if (!empty($retype) && empty($reobj)) {
			$classes[] = 'reobjs';
		}

		return $classes;
	}

	public function post_contact_form()
    {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $inquiry = filter_var($_POST['inquiry'], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $privacy_policy = filter_var($_POST['privacy_policy'], FILTER_SANITIZE_NUMBER_INT);
        $main_contact_person = get_field('main_contact_person', 'options');

        $_SESSION['topbroker_flash'] = 0;

        if (empty($name) || empty($phone) || empty($privacy_policy)) {
            $_SESSION['topbroker_form_data'] = [
                'inquiry' => $inquiry,
                'phone' => $phone,
                'email' => $email,
                'name' => $name,
            ];

            $_SESSION['topbroker_error'] = ['message' => 'Užpildykite visus provalomus laukus.'];

            $location = $_SERVER['HTTP_REFERER'];
            wp_safe_redirect($location);
            exit();
        }

        // Create contact person if not exist
        try {

            $contact = $this->topbroker->contacts->getItem(null, [
                'email' => $email,
            ]);
            $contact_first = Arr::first($contact);
            $contact_id = $contact_first->id;

            if (empty($contact)) {
                $created_contact = $this->topbroker->contacts->createItem([
                    'contact_type' => 'physical_person',
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'user_id' => $main_contact_person,
                ]);

                $contact_id = $created_contact->id;
            }

            // Create inquiry, assign to contact
            try {

                $created_inquiry = $this->topbroker->inquiries->createItem([
                    'title' => 'Kontaktai: ' . $name . ' ' . $email,
                    'user_id' => $main_contact_person,
//                    'custom_fields' => [
//                        'c_f_c_komentaras' => $inquiry,
//                    ],
                ]);

                if ($created_inquiry) {
                    $this->topbroker->inquiries->assignContact($created_inquiry->id, [
                        'contact_id' => $contact_id
                    ]);
                }

            } catch (Exception $exception) {
                // TODO: set error flash data
                var_dump($exception->getMessage()); die;
            }

        } catch (Exception $exception) {

            $_SESSION['topbroker_error'] = ['message' => 'Patikrinkite ar gerai užpildėte laukus!'];

            $location = $_SERVER['HTTP_REFERER'];
            wp_safe_redirect($location);
            exit();

        }

        $_SESSION['topbroker_success'] = ['message' => 'Forma išsiųsta, dėkojame!'];

        $location = $_SERVER['HTTP_REFERER'];
        wp_safe_redirect($location);
        exit();
    }

	private function set_cities()
	{
		return $this->topbroker->locations->getCities();
	}

	private function set_reobj_data($reobj)
	{
		$reobject_id = Arr::last(explode('-', $reobj));

		if (empty($reobj) || !is_numeric($reobject_id)) {
			return false;
		}

		$photos = Collection::make($this->topbroker->get("estates/{$reobject_id}/photos", []));
		$estate = $this->topbroker->estates->getItem($reobject_id);
		$features_collection = Collection::make($estate->{$estate->estate_type});
		$estate_type_attributes = $this->topbroker->estates->getAttributes($estate->estate_type);

		$features = $features_collection->filter(function($value, $key) {
			return Str::startsWith($key, 'has_') && $value == true;
		})->map(function($value, $key) use ($estate_type_attributes) {
			return $estate_type_attributes->features->{$key};
		});

		return [
			'data' => $estate,
			'features' => $features,
			'user' => $this->topbroker->users->getItem($estate->user_id),
			'photos' => [
				'main' => $photos->first(),
				'thumbnails' => $photos->skip(1)->take(3),
				'others' => $photos->skip(4),
			],
		];
	}

	private function set_tbuser_data($tbuser)
	{
        $statuses = $this->topbroker->get('estates/record_statuses', []);
		$user_id = intval(Arr::last(explode('-', $tbuser)));
		$user_data = Collection::make($this->topbroker->users->getItem($user_id)->custom_fields);
		$feedbacks = [];

		// Broker feedback
        $user_data->keys()->filter(function($str) {
            return Str::startsWith($str, 'c_f_u_atsiliepimas_nr');
        })->each(function($key) use (&$feedbacks, $user_data) {
            $feedbacks[] = $user_data->get($key);
        });

        // Broker RE objects
        $user_estates = $this->topbroker->estates->getList([
            'user_id' => $user_id,
        ]);

		return [
			'tbuser' => $this->topbroker->users->getItem($user_id),
            'feedbacks' => array_filter($feedbacks),
            'user_estates' => $user_estates,
            'statuses' => $statuses,
		];
	}

	private function set_retype_data($retype)
	{
		$page = (int) filter_var($_GET['page'] ?? 1, FILTER_SANITIZE_NUMBER_INT);
		$per_page = 6;

		$params = [
			'estate_type' => [$this->get_estate_type_param($retype)],
			'sort_by' => 'updated_at',
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

		$filter_params = array_filter(Arr::except($_GET, ['page']));

		$paginate_params = [
			'per_page' => $per_page,
			'page' => $page,
		];

		$estates_count = $this->topbroker->estates->getCount(array_merge($params, $filter_params));
		$estates = $this->topbroker->estates->getList(array_merge($params, $filter_params, $paginate_params));
		$statuses = $this->topbroker->get('estates/record_statuses', []);

		$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$pages_count = (int) ceil($estates_count->records / $per_page);
		$next_page = $page + 1;
		$prev_page = $page - 1;

		$query_string_next_page = http_build_query(['page' => $next_page]);
		$query_string_prev_page = http_build_query(['page' => $prev_page]);
		$next_link = append_query_string($current_url, $query_string_next_page, APPEND_QUERY_STRING_REPLACE_DUPLICATE);
		$prev_link = append_query_string($current_url, $query_string_prev_page, APPEND_QUERY_STRING_REPLACE_DUPLICATE);

		if ($pages_count < $next_page) {
			$next_link = false;
		}

		if ($page <= 1) {
			$prev_link = false;
		}

		$pages = [];

		for($p = 1; $p <= $pages_count; $p++) {
			$pages[] = [
				'page' => $p,
				'url' => append_query_string($current_url, http_build_query(['page' => $p]), APPEND_QUERY_STRING_REPLACE_DUPLICATE),
				'current' => $page == $p,
			];
		}

		$pagination = [
			'pages_count' => $pages_count,
			'current_page' => $page,
			'pages' => $pages,
			'next_link' => $next_link,
			'prev_link' => $prev_link,
		];

		return [
			'estates' => $estates,
			'statuses' => $statuses,
			'pagination' => $pagination,
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
