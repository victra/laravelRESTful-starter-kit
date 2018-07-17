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
                'title' => 'Vendor Images',
                'unit' => 'image',
            ),
            array (
                'id' => 2,
                'title' => 'Ezyedu Fee',
                'unit' => 'precent',
            ),
            array (
                'id' => 3,
                'title' => 'Ideas Images',
                'unit' => 'image',
            ),
            array (
                'id' => 4,
                'title' => 'Event Images',
                'unit' => 'image',
            ),
            array (
                'id' => 5,
                'title' => 'Create Ideas',
                'unit' => 'days',
            ),
            array (
                'id' => 6,
                'title' => 'Create Event',
                'unit' => 'days',
            ),
            array (
                'id' => 7,
                'title' => 'Create Banner',
                'unit' => 'days',
            ),
            array (
                'id' => 8,
                'title' => 'Point reward',
                'unit' => 'point',
            ),
        ));
    }
}