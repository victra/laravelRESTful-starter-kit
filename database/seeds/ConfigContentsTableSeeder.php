<?php

use Illuminate\Database\Seeder;

class ConfigContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('config_contents')->delete();
        
        \DB::table('config_contents')->insert(array (
            array ( //vendor images
                'id' => 1,
                'config_id' => 1,
                'name' => 'User',
                'value' => true,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));
    }
}