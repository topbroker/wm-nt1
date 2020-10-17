<?php

namespace wmnt;

class Helpers
{
	public static function estate_type($estate_type)
	{
		switch ($estate_type)
		{
			case 'house':
				return 'namas';

			case 'flat':
				return 'butas';

			case 'commercial':
				return 'komercijai';

			case 'site':
				return 'sklypai';
		}
	}

	public static function estate_data_short($estate)
	{
		$data = [];

		if (in_array($estate->estate_type, ['house', 'flat', 'commercial'])) {
			$data['Plotas'] = $estate->area . ' m<small>2</small>';
			$data['Metai'] = $estate->year;
		}

		if ($estate->estate_type == 'house') {
			$data['Kambariai'] = $estate->room_count;
			$data['Aukštai'] = $estate->floor_count;
		}

		if ($estate->estate_type == 'flat') {
			$data['Kambariai'] = $estate->room_count;
			$data['Aukštas'] = $estate->floor . '/' . $estate->floor_count;
		}

		if ($estate->estate_type == 'site') {
			$data['Plotas'] = $estate->area . ' a';
		}

		if ($estate->estate_type == 'commercial') {
			$data['Patalpų sk.'] = $estate->room_count;
		}

		return $data;
	}

	public static function get_string($key)
    {
        $strings = get_query_var('strings');

        return $strings[sanitize_title($key)] ?? $key;
    }

    public static function getPermalinkByTemplate($template) {
        global $wpdb;

        $template = 'template-' . $template . '.blade.php';

        $page_id = $wpdb->get_var("SELECT `post_id` FROM $wpdb->postmeta WHERE `meta_key` = '_wp_page_template' AND `meta_value` = '{$template}'");

        if ( empty($page_id) ) {
            return false;
        }

        return get_permalink($page_id);
    }

    public static function get_cities()
    {
        return [
            'Vilnius',
            'Kaunas',
            'Klaipėda',
            'Šiauliai',
            'Panevėžys',
            'Palanga',
            'Neringa',
            'Akmenės r. sav.',
            'Alytaus m. sav.',
            'Alytaus r. sav.',
            'Anykščių r. sav.',
            'Birštono sav.',
            'Biržų r. sav.',
            'Druskininkų sav.',
            'Elektrėnų sav.',
            'Ignalinos r. sav.',
            'Jonavos r. sav.',
            'Joniškio r. sav.',
            'Jurbarko r. sav.',
            'Kaišiadorių r. sav.',
            'Kalvarijos sav.',
            'Kauno r. sav.',
            'Kazlų Rūdos sav.',
            'Kėdainių r. sav.',
            'Kelmės r. sav.',
            'Klaipėdos r. sav.',
            'Kretingos r. sav.',
            'Kupiškio r. sav.',
            'Lazdijų r. sav.',
            'Marijampolės sav.',
            'Mažeikių r. sav.',
            'Molėtų r. sav.',
            'Pagėgių sav.',
            'Pakruojo r. sav.',
            'Panevėžio r. sav.',
            'Pasvalio r. sav.',
            'Plungės r. sav.',
            'Prienų r. sav.',
            'Radviliškio r. sav.',
            'Raseinių r. sav.',
            'Rietavo sav.',
            'Rokiškio r. sav.',
            'Šakių r. sav.',
            'Šalčininkų r. sav.',
            'Šiaulių r. sav.',
            'Šilalės r. sav.',
            'Šilutės r. sav.',
            'Širvintų r. sav.',
            'Skuodo r. sav.',
            'Švenčionių r. sav.',
            'Tauragės r. sav.',
            'Telšių r. sav.',
            'Trakų r. sav.',
            'Ukmergės r. sav.',
            'Utenos r. sav.',
            'Varėnos r. sav.',
            'Vilkaviškio r. sav.',
            'Vilniaus r. sav.',
            'Visagino sav.',
            'Zarasų r. sav.'
        ];
    }
}