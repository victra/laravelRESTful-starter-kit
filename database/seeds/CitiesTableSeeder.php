<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cities')->delete();

        if(App::environment('testing')) {
            \DB::table('cities')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'name' => 'Jakarta',
                    'province_id' => '22',
                    'created_at' => '2016-04-07 14:09:22',
                    'updated_at' => '2016-04-07 14:09:22',
                    'deleted_at' => NULL,
                ),
                2 => 
                array (
                    'id' => 2,
                    'name' => 'Bekasi',
                    'province_id' => '10',
                    'created_at' => '2016-04-07 14:09:22',
                    'updated_at' => '2016-04-07 14:09:22',
                    'deleted_at' => NULL,
                ),
            ));
            return;
        }
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mataram',
                'province_id' => 22,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bima',
                'province_id' => 22,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dompu',
                'province_id' => 22,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Lombok Tengah',
                'province_id' => 22,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Lombok Timur',
                'province_id' => 22,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Sumbawa',
                'province_id' => 22,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Lombok Barat',
                'province_id' => 22,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Sumbawa Barat',
                'province_id' => 22,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Ambon',
                'province_id' => 20,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Maluku Tengah',
                'province_id' => 20,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Maluku Tenggara',
                'province_id' => 20,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Buru',
                'province_id' => 20,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Kepulauan Aru',
                'province_id' => 20,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Seram Bagian Barat',
                'province_id' => 20,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Seram Bagian Timur',
                'province_id' => 20,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Maluku Tenggara Barat',
                'province_id' => 20,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Banjarmasin',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Hulu Sungai Tengah',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Hulu Sungai Selatan',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Kotabaru',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Tabalong',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Banjarbaru',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Hulu Sungai Utara',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Barito Kuala',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Banjar',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Tanah Laut',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Tapin',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Barito Utara',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Barito Timur',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Murung Raya',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Barito Selatan',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Balangan',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Tanah Bumbu',
                'province_id' => 14,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Bandung',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Cimahi',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Sumedang',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Tasikmalaya',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Banjar',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Ciamis',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Garut',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Purwakarta',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Bandung Barat',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Subang',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Bekasi',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Bengkulu',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Bengkulu Utara',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Rejang Lebong',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Bengkulu Selatan',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Kaur',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Kepahiang',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Lebong',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Mukomuko',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Seluma',
                'province_id' => 4,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Bogor',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Balikpapan',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Kutai Kartanegara',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Paser',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Berau',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Penajam Paser Utara',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Bontang',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Kutai Timur',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Batam',
                'province_id' => 18,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Lingga',
                'province_id' => 18,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Natuna',
                'province_id' => 18,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Karimun',
                'province_id' => 18,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Banda Aceh',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Langsa',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Lhokseumawe',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Aceh Besar',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Bireuen',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Aceh Tenggara',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Aceh Barat',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Pidie',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Aceh Tengah',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Aceh Selatan',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Sabang',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Aceh Barat Daya',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Aceh Jaya',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Aceh Singkil',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Aceh Tamiang',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Aceh Timur',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Aceh Utara',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Bener Meriah',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Gayo Lues',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Nagan Raya',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Pidie Jaya',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Simeulue',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Subulussalam',
                'province_id' => 5,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Cirebon',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Indramayu',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Kuningan',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Majalengka',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Jakarta',
                'province_id' => 7,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Administrasi Jakarta Barat',
                'province_id' => 7,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Administrasi Jakarta Selatan',
                'province_id' => 7,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Administrasi Jakarta Pusat',
                'province_id' => 7,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Administrasi Jakarta Utara',
                'province_id' => 7,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Administrasi Jakarta Timur',
                'province_id' => 7,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Administrasi Kepulauan Seribu',
                'province_id' => 7,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Cilegon',
                'province_id' => 3,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Pandeglang',
                'province_id' => 3,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Lebak',
                'province_id' => 3,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Serang',
                'province_id' => 3,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Cilacap',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Jambi',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Tanjung Jabung Barat',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Merangin',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Batanghari',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Bungo',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Kerinci',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Muaro Jambi',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Sarolangun',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Tanjung Jabung Timur',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Tebo',
                'province_id' => 9,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Jayapura',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Biak Numfor',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Merauke',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Kepulauan Yapen',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Jayawijaya',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Asmat',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Boven Digoel',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Keerom',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Pegunungan Bintang',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Sarmi',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Supiori',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Tolikara',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Waropen',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Yahukimo',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Mamberamo Raya',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Depok',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Denpasar',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Karangasem',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Bangli',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Gianyar',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Jembrana',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Klungkung',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Buleleng',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Tabanan',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Badung',
                'province_id' => 1,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Gorontalo',
                'province_id' => 8,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Boalemo',
                'province_id' => 8,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Bone Bolango',
                'province_id' => 8,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Gorontalo Utara',
                'province_id' => 8,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Pohuwato',
                'province_id' => 8,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Jember',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Banyuwangi',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Bondowoso',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Yogyakarta',
                'province_id' => 6,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Bantul',
                'province_id' => 6,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Sleman',
                'province_id' => 6,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Kulon Progo',
                'province_id' => 6,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Gunungkidul',
                'province_id' => 6,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Kendari',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Bau-Bau',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Kolaka',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Muna',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'Konawe',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'Bombana',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Buton Utara',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Kolaka Utara',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Konawe Selatan',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Wakatobi',
                'province_id' => 30,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Kediri',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Kupang',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Sumba Tengah',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Belu',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Alor',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Timor Tengah Utara',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Flores Timur',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Sikka',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Manggarai',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Timor Tengah Selatan',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Ende',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Ngada',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Sumba Timur',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Sumba Barat',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Manggarai Barat',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Manggarai Timur',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Nagekeo',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Rote Ndao',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Sumba Barat Daya',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Lembata',
                'province_id' => 23,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Karawang',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Manado',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'Bolaang Mongondow',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Kepulauan Sangihe',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Minahasa',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'Bitung',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Bolaang Mongondow Utara',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Kepulauan Talaud',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Minahasa Utara',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Minahasa Selatan',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'Minahasa Tenggara',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'Tomohon',
                'province_id' => 31,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'Madiun',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'Magetan',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'Ngawi',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'Pacitan',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'Ponorogo',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'Medan',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'Asahan',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'Tapanuli Tengah',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'Sibolga',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Dairi',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'Deli Serdang',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'Toba Samosir',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Binjai',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Nias',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'Padangsidempuan',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Simalungun',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'Labuhanbatu',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Karo',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Langkat',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Tapanuli Utara',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Tebing Tinggi',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Padang Lawas Utara',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Batubara',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Humbang Hasundutan',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Mandailing Natal',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Nias Selatan',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Padang Lawas',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'Pakpak Bharat',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'Samosir',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'Serdang Bedagai',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'name' => 'Tapanuli Selatan',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'Tanjungbalai',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'Pematangsiantar',
                'province_id' => 34,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'Magelang',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'Kebumen',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'Wonosobo',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'Purworejo',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'Temanggung',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'Mojokerto',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'Sidoarjo',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'Malang',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Blitar',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'Batu',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Nabire',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'name' => 'Dogiyai',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'Paniai',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'Puncak Jaya',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'Mappi',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'name' => 'Intan Jaya',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'Deiyai',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'name' => 'Probolinggo',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'name' => 'Lumajang',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'name' => 'Situbondo',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'name' => 'Padang',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
                'name' => 'Tanah Datar',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
                'name' => 'Bukittinggi',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
                'name' => 'Pasaman',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
                'name' => 'Pesisir Selatan',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
                'name' => 'Padang Pariaman',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
                'name' => 'Pariaman',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
                'name' => 'Payakumbuh',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'name' => 'Sawahlunto',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'name' => 'Solok',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'name' => 'Padangpanjang',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'name' => 'Dharmasraya',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'name' => 'Lima Puluh Kota',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'name' => 'Kepulauan Mentawai',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'name' => 'Pasaman Barat',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'name' => 'Solok Selatan',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'name' => 'Sijunjung',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'name' => 'Agam',
                'province_id' => 32,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'name' => 'Pasuruan',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
                'name' => 'Pangkal Pinang',
                'province_id' => 2,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'name' => 'Bangka',
                'province_id' => 2,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'name' => 'Bangka Barat',
                'province_id' => 2,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'name' => 'Bangka Tengah',
                'province_id' => 2,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'name' => 'Bangka Selatan',
                'province_id' => 2,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'name' => 'Pekanbaru',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'name' => 'Dumai',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
                'name' => 'Kampar',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
                'name' => 'Bengkalis',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
                'name' => 'Indragiri Hulu',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
                'name' => 'Indragiri Hilir',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
                'name' => 'Rokan Hilir',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'name' => 'Kuantan Singingi',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'name' => 'Pelalawan',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'name' => 'Rokan Hulu',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'name' => 'Siak',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'name' => 'Kepulauan Meranti',
                'province_id' => 26,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'name' => 'Palangka Raya',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'name' => 'Katingan',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'name' => 'Kapuas',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'name' => 'Gunung Mas',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'name' => 'Seruyan',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'name' => 'Kotawaringin Barat',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'name' => 'Kotawaringin Timur',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'name' => 'Lamandau',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'name' => 'Pulang Pisau',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'name' => 'Sukamara',
                'province_id' => 15,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'name' => 'Palembang',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'name' => 'Musi Rawas',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
                'name' => 'Ogan Komering Ulu',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
                'name' => 'Ogan Komering Ilir',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
                'name' => 'Lahat',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
                'name' => 'Muara Enim',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
                'name' => 'Pagar Alam',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
                'name' => 'Prabumulih',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
                'name' => 'Musi Banyuasin',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'name' => 'Banyuasin',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'name' => 'Empat Lawang',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'name' => 'Ogan Ilir',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'name' => 'Ogan Komering Ulu Timur',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'name' => 'Ogan Komering Ulu Selatan',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'name' => 'Lubuklinggau',
                'province_id' => 33,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'name' => 'Palu',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'name' => 'Banggai',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'name' => 'Poso',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
                'name' => 'Toli-Toli',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
                'name' => 'Banggai Kepulauan',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'name' => 'Buol',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'name' => 'Donggala',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'name' => 'Morowali',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
                'name' => 'Parigi Moutong',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
                'name' => 'Tojo Una-Una',
                'province_id' => 29,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
                'name' => 'Pontianak',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
                'name' => 'Ketapang',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
                'name' => 'Sanggau',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
                'name' => 'Singkawang',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
                'name' => 'Sintang',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
                'name' => 'Kapuas Hulu',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
                'name' => 'Bengkayang',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'name' => 'Landak',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'name' => 'Melawi',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'name' => 'Mempawah',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'name' => 'Sambas',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'name' => 'Sekadau',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'name' => 'Kubu Raya',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'name' => 'Kayong Utara',
                'province_id' => 13,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'name' => 'Samarinda',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'name' => 'Kutai Barat',
                'province_id' => 16,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'name' => 'Sukabumi',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'name' => 'Cianjur',
                'province_id' => 10,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'name' => 'Surakarta',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'name' => 'Boyolali',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'name' => 'Karanganyar',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'name' => 'Klaten',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'name' => 'Sragen',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
                'name' => 'Sukoharjo',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
                'name' => 'Wonogiri',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
                'name' => 'Sorong',
                'province_id' => 25,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
                'name' => 'Fakfak',
                'province_id' => 25,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
                'name' => 'Kaimana',
                'province_id' => 25,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            346 => 
            array (
                'id' => 347,
                'name' => 'Raja Ampat',
                'province_id' => 25,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            347 => 
            array (
                'id' => 348,
                'name' => 'Sorong Selatan',
                'province_id' => 25,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            348 => 
            array (
                'id' => 349,
                'name' => 'Teluk Bintuni',
                'province_id' => 25,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            349 => 
            array (
                'id' => 350,
                'name' => 'Teluk Wondama',
                'province_id' => 25,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            350 => 
            array (
                'id' => 351,
                'name' => 'Manokwari',
                'province_id' => 25,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            351 => 
            array (
                'id' => 352,
                'name' => 'Semarang',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            352 => 
            array (
                'id' => 353,
                'name' => 'Jepara',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            353 => 
            array (
                'id' => 354,
                'name' => 'Kudus',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            354 => 
            array (
                'id' => 355,
                'name' => 'Pekalongan',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            355 => 
            array (
                'id' => 356,
                'name' => 'Banyumas',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            356 => 
            array (
                'id' => 357,
                'name' => 'Batang',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            357 => 
            array (
                'id' => 358,
                'name' => 'Blora',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            358 => 
            array (
                'id' => 359,
                'name' => 'Bojonegoro',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            359 => 
            array (
                'id' => 360,
                'name' => 'Brebes',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            360 => 
            array (
                'id' => 361,
                'name' => 'Demak',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            361 => 
            array (
                'id' => 362,
                'name' => 'Kendal',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            362 => 
            array (
                'id' => 363,
                'name' => 'Pati',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            363 => 
            array (
                'id' => 364,
                'name' => 'Pemalang',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            364 => 
            array (
                'id' => 365,
                'name' => 'Grobogan',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            365 => 
            array (
                'id' => 366,
                'name' => 'Rembang',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            366 => 
            array (
                'id' => 367,
                'name' => 'Salatiga',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            367 => 
            array (
                'id' => 368,
                'name' => 'Tegal',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            368 => 
            array (
                'id' => 369,
                'name' => 'Purbalingga',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            369 => 
            array (
                'id' => 370,
                'name' => 'Banjarnegara',
                'province_id' => 11,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            370 => 
            array (
                'id' => 371,
                'name' => 'Surabaya',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            371 => 
            array (
                'id' => 372,
                'name' => 'Gresik',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            372 => 
            array (
                'id' => 373,
                'name' => 'Lamongan',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            373 => 
            array (
                'id' => 374,
                'name' => 'Bangkalan',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            374 => 
            array (
                'id' => 375,
                'name' => 'Jombang',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            375 => 
            array (
                'id' => 376,
                'name' => 'Nganjuk',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            376 => 
            array (
                'id' => 377,
                'name' => 'Pamekasan',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            377 => 
            array (
                'id' => 378,
                'name' => 'Sampang',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            378 => 
            array (
                'id' => 379,
                'name' => 'Sumenep',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            379 => 
            array (
                'id' => 380,
                'name' => 'Tuban',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            380 => 
            array (
                'id' => 381,
                'name' => 'Tulungagung',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            381 => 
            array (
                'id' => 382,
                'name' => 'Trenggalek',
                'province_id' => 12,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            382 => 
            array (
                'id' => 383,
                'name' => 'Tangerang',
                'province_id' => 3,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            383 => 
            array (
                'id' => 384,
                'name' => 'Mimika',
                'province_id' => 24,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            384 => 
            array (
                'id' => 385,
                'name' => 'Belitung',
                'province_id' => 2,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            385 => 
            array (
                'id' => 386,
                'name' => 'Belitung Timur',
                'province_id' => 2,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            386 => 
            array (
                'id' => 387,
                'name' => 'Bandar Lampung',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            387 => 
            array (
                'id' => 388,
                'name' => 'Lampung Selatan',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            388 => 
            array (
                'id' => 389,
                'name' => 'Lampung Utara',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            389 => 
            array (
                'id' => 390,
                'name' => 'Metro',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            390 => 
            array (
                'id' => 391,
                'name' => 'Lampung Barat',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            391 => 
            array (
                'id' => 392,
                'name' => 'Lampung Tengah',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            392 => 
            array (
                'id' => 393,
                'name' => 'Lampung Timur',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            393 => 
            array (
                'id' => 394,
                'name' => 'Way Kanan',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            394 => 
            array (
                'id' => 395,
                'name' => 'Tulang Bawang',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            395 => 
            array (
                'id' => 396,
                'name' => 'Tanggamus',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            396 => 
            array (
                'id' => 397,
                'name' => 'Pesawaran',
                'province_id' => 19,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            397 => 
            array (
                'id' => 398,
                'name' => 'Tanjung Pinang',
                'province_id' => 18,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            398 => 
            array (
                'id' => 399,
                'name' => 'Bintan',
                'province_id' => 18,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            399 => 
            array (
                'id' => 400,
                'name' => 'Tarakan',
                'province_id' => 17,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            400 => 
            array (
                'id' => 401,
                'name' => 'Bulungan',
                'province_id' => 17,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            401 => 
            array (
                'id' => 402,
                'name' => 'Malinau',
                'province_id' => 17,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            402 => 
            array (
                'id' => 403,
                'name' => 'Nunukan',
                'province_id' => 17,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            403 => 
            array (
                'id' => 404,
                'name' => 'Tana Tidung',
                'province_id' => 17,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            404 => 
            array (
                'id' => 405,
                'name' => 'Ternate',
                'province_id' => 21,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            405 => 
            array (
                'id' => 406,
                'name' => 'Halmahera Barat',
                'province_id' => 21,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            406 => 
            array (
                'id' => 407,
                'name' => 'Halmahera Selatan',
                'province_id' => 21,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            407 => 
            array (
                'id' => 408,
                'name' => 'Halmahera Tengah',
                'province_id' => 21,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            408 => 
            array (
                'id' => 409,
                'name' => 'Halmahera Timur',
                'province_id' => 21,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            409 => 
            array (
                'id' => 410,
                'name' => 'Halmahera Utara',
                'province_id' => 21,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            410 => 
            array (
                'id' => 411,
                'name' => 'Kepulauan Sula',
                'province_id' => 21,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            411 => 
            array (
                'id' => 412,
                'name' => 'Tidore Kepulauan',
                'province_id' => 21,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            412 => 
            array (
                'id' => 413,
                'name' => 'Makassar',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            413 => 
            array (
                'id' => 414,
                'name' => 'Bantaeng',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            414 => 
            array (
                'id' => 415,
                'name' => 'Barru',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            415 => 
            array (
                'id' => 416,
                'name' => 'Bulukumba',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            416 => 
            array (
                'id' => 417,
                'name' => 'Enrekang',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            417 => 
            array (
                'id' => 418,
                'name' => 'Jeneponto',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            418 => 
            array (
                'id' => 419,
                'name' => 'Tana Toraja',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            419 => 
            array (
                'id' => 420,
                'name' => 'Toraja Utara',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            420 => 
            array (
                'id' => 421,
                'name' => 'Mamuju',
                'province_id' => 27,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            421 => 
            array (
                'id' => 422,
                'name' => 'Maros',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            422 => 
            array (
                'id' => 423,
                'name' => 'Majene',
                'province_id' => 27,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            423 => 
            array (
                'id' => 424,
                'name' => 'Palopo',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            424 => 
            array (
                'id' => 425,
                'name' => 'Pinrang',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            425 => 
            array (
                'id' => 426,
                'name' => 'Polewali Mandar',
                'province_id' => 27,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            426 => 
            array (
                'id' => 427,
                'name' => 'Sidenreng Rappang',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            427 => 
            array (
                'id' => 428,
                'name' => 'Wajo',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            428 => 
            array (
                'id' => 429,
                'name' => 'Sinjai',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            429 => 
            array (
                'id' => 430,
                'name' => 'Gowa',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            430 => 
            array (
                'id' => 431,
                'name' => 'Takalar',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            431 => 
            array (
                'id' => 432,
                'name' => 'Bone',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            432 => 
            array (
                'id' => 433,
                'name' => 'Soppeng',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            433 => 
            array (
                'id' => 434,
                'name' => 'Kepulauan Selayar',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            434 => 
            array (
                'id' => 435,
                'name' => 'Pangkajene Dan Kepulauan',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            435 => 
            array (
                'id' => 436,
                'name' => 'Parepare',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            436 => 
            array (
                'id' => 437,
                'name' => 'Luwu Utara',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            437 => 
            array (
                'id' => 438,
                'name' => 'Luwu Timur',
                'province_id' => 28,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            438 => 
            array (
                'id' => 439,
                'name' => 'Mamasa',
                'province_id' => 27,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
            439 => 
            array (
                'id' => 440,
                'name' => 'Mamuju Utara',
                'province_id' => 27,
                'created_at' => '2016-04-07 14:09:22',
                'updated_at' => '2016-04-07 14:09:22',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
