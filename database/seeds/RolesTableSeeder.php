<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            array (
                'id' => 1,
                'hash_id' => 'qwe123',
                'name' => 'Super Admin',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 2,
                'hash_id' => 'asd123',
                'name' => 'Vendor Admin',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 3,
                'hash_id' => 'zxc123',
                'name' => 'Student',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));
    }
}