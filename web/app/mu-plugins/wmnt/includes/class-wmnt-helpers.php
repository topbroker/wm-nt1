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
}