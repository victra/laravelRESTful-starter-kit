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
                'name' => 'Bronze',
                'value' => 3,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 2,
                'config_id' => 1,
                'name' => 'Silver',
                'value' => 6,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 3,
                'config_id' => 1,
                'name' => 'Gold',
                'value' => 10,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array ( //ezyedu fee
                'id' => 4,
                'config_id' => 2,
                'name' => 'Ezyedu Fee',
                'value' => 5,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array ( //ideas images
                'id' => 5,
                'config_id' => 3,
                'name' => 'Bronze',
                'value' => 3,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 6,
                'config_id' => 3,
                'name' => 'Silver',
                'value' => 3,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 7,
                'config_id' => 3,
                'name' => 'Gold',
                'value' => 3,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array ( //event images
                'id' => 8,
                'config_id' => 4,
                'name' => 'Bronze',
                'value' => 3,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 9,
                'config_id' => 4,
                'name' => 'Silver',
                'value' => 3,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 10,
                'config_id' => 4,
                'name' => 'Gold',
                'value' => 3,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array ( //create ideas
                'id' => 11,
                'config_id' => 5,
                'name' => 'Bronze',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 12,
                'config_id' => 5,
                'name' => 'Silver',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 13,
                'config_id' => 5,
                'name' => 'Gold',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array ( //create event
                'id' => 14,
                'config_id' => 6,
                'name' => 'Bronze',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 15,
                'config_id' => 6,
                'name' => 'Silver',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 16,
                'config_id' => 6,
                'name' => 'Gold',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array ( //create banner
                'id' => 17,
                'config_id' => 7,
                'name' => 'Bronze',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 18,
                'config_id' => 7,
                'name' => 'Silver',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 19,
                'config_id' => 7,
                'name' => 'Gold',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 20,
                'config_id' => 8,
                'name' => 'User connection',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 21,
                'config_id' => 8,
                'name' => 'Vendor review',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 22,
                'config_id' => 8,
                'name' => 'Success transaction',
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 23,
                'config_id' => 8,
                'name' => 'Vendor reference',//vendor attachment oleh superadmin
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 24,
                'config_id' => 8,
                'name' => 'Referral inviter',//yg ngundang
                'value' => 2,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
            array (
                'id' => 25,
                'config_id' => 8,
                'name' => 'Referral invited',//yg diundang
                'value' => 1,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));
    }
}