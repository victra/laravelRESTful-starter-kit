<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('provinces')->delete();
        
		\DB::table('provinces')->insert(array (
			0 => 
			array (
				'id' => '1',
				'name' => 'Bali',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => '2',
				'name' => 'Bangka Belitung',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => '3',
				'name' => 'Banten',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => '4',
				'name' => 'Bengkulu',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => '5',
				'name' => 'Daerah Istimewa Aceh',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => '6',
				'name' => 'Daerah Istimewa Yogyakarta',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => '7',
				'name' => 'DKI Jakarta',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => '8',
				'name' => 'Gorontalo',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			8 => 
			array (
				'id' => '9',
				'name' => 'Jambi',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			9 => 
			array (
				'id' => '10',
				'name' => 'Jawa Barat',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			10 => 
			array (
				'id' => '11',
				'name' => 'Jawa Tengah',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			11 => 
			array (
				'id' => '12',
				'name' => 'Jawa Timur',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			12 => 
			array (
				'id' => '13',
				'name' => 'Kalimantan Barat',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			13 => 
			array (
				'id' => '14',
				'name' => 'Kalimantan Selatan',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			14 => 
			array (
				'id' => '15',
				'name' => 'Kalimantan Tengah',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			15 => 
			array (
				'id' => '16',
				'name' => 'Kalimantan Timur',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			16 => 
			array (
				'id' => '17',
				'name' => 'Kalimantan Utara',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			17 => 
			array (
				'id' => '18',
				'name' => 'Kepulauan Riau',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			18 => 
			array (
				'id' => '19',
				'name' => 'Lampung',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			19 => 
			array (
				'id' => '20',
				'name' => 'Maluku',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			20 => 
			array (
				'id' => '21',
				'name' => 'Maluku Utara',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			21 => 
			array (
				'id' => '22',
				'name' => 'Nusa Tenggara Barat',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			22 => 
			array (
				'id' => '23',
				'name' => 'Nusa Tenggara Timur',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			23 => 
			array (
				'id' => '24',
				'name' => 'Papua',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			24 => 
			array (
				'id' => '25',
				'name' => 'Papua Barat',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			25 => 
			array (
				'id' => '26',
				'name' => 'Riau',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			26 => 
			array (
				'id' => '27',
				'name' => 'Sulawesi Barat',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			27 => 
			array (
				'id' => '28',
				'name' => 'Sulawesi Selatan',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			28 => 
			array (
				'id' => '29',
				'name' => 'Sulawesi Tengah',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			29 => 
			array (
				'id' => '30',
				'name' => 'Sulawesi Tenggara',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			30 => 
			array (
				'id' => '31',
				'name' => 'Sulawesi Utara',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			31 => 
			array (
				'id' => '32',
				'name' => 'Sumatera Barat',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			32 => 
			array (
				'id' => '33',
				'name' => 'Sumatera Selatan',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
			33 => 
			array (
				'id' => '34',
				'name' => 'Sumatera Utara',
				'created_at' => '2016-04-07 13:47:33',
				'updated_at' => '2016-04-07 13:47:33',
				'deleted_at' => NULL,
			),
		));
	}

}
