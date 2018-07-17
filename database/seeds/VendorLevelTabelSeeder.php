<?php

use Illuminate\Database\Seeder;

class VendorLevelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('vendor_levels')->delete();
        
        \DB::table('vendor_levels')->insert(array (
            array (
                'id' => 1,
                'hash_id' => 'poi123',
                'label' => 'Bronze',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 2,
                'hash_id' => 'lkj123',
                'label' => 'Silver',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 3,
                'hash_id' => 'mnb123',
                'name' => 'Gold',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));
    }
}