<?php

use App\Models\User;
use App\Models\Role;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            array (
                'id' => 1,
                'role_id' => 1,
                'vendor_id' => null,
                'email' => 'super_admin@mail.com',
                'password' => bcrypt('password'),
                'name' => 'Arnold',
                'birth_date' => '1999-09-09',
                'gender' => User::MALE,
                'phone' => '08234235345234',
                'phone_2' => '',
                'provider' => null,
                'provider_id' => null,
                'is_active' => true,
                'hash_id' => 'Arnold123',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2017-01-01 00:00:00',
            ),
        ));
    }
}