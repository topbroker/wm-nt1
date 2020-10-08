<?php


namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use TopBroker\TopBrokerApi;

class Komanda extends Composer
{
	private $topbroker;

	public function __construct()
	{
		$this->topbroker = new TopBrokerApi('3f67c759bf4fc791b', 'a5e79e85-9624-49c5-a9cc-261e270ff307');
	}

	/**
	 * List of views served by this composer.
	 *
	 * @var array
	 */
	protected static $views = [
		'template-tbusers',
	];

	/**
	 * Data to be passed to view before rendering.
	 *
	 * @return array
	 */
	public function with()
	{
		return [
			'tbusers' => $this->tbusers(),
		];
	}

	public function tbusers()
	{
		$query_string = build_query([
			'page' => '1',
			'per_page' => '20',
			'custom_fields' => [
				'c_f_u_rodyti_tinklapyje' => 'Taip',
			],
			'additional_fields[]' => ['c_f_u_antra_nuotrauka','c_f_u_pareigos'],
		]);

		$query_string = str_replace('%5B0%5D', '', $query_string);
		$query_string = str_replace('%5B1%5D', '', $query_string);
		$query_string = str_replace('%5B2%5D', '', $query_string);

		$params = [
			CURLOPT_URL => "https://app.topbroker.lt/api/v5/users",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => [
				"Authorization: Basic " . base64_encode('3f67c759bf4fc791b' . ':' . 'a5e79e85-9624-49c5-a9cc-261e270ff307')
			],
		];

		$params[CURLOPT_POSTFIELDS] = $query_string;

		$curl = curl_init();
		curl_setopt_array($curl, $params);
		$response = curl_exec($curl);
		curl_close($curl);

		return json_decode($response);
	}
}