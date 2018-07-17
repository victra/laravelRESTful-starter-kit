<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('configs')->delete();
        
        \DB::table('configs')->insert(array (
            array (
                'id' => 1,
                'title' => 'Image',
                'unit' => 'image',
            ),
        ));
    }
}