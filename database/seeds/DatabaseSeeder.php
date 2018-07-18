<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (defined('STDERR')) fwrite(STDERR, print_r("\n--- Seeding ---\n", TRUE));

        if (App::environment('production')) {
            if (defined('STDERR')) fwrite(STDERR, print_r("--- ERROR: Seeding in Production is prohibited ---\n", TRUE));
            return;
        }

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(ConfigContentsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        if (defined('STDERR')) fwrite(STDERR, print_r("Set FOREIGN_KEY_CHECKS=1 --- DONE\n", TRUE));

        // \Artisan::call('command:regenerate-user-feeds');

        \Cache::flush();

        if (defined('STDERR')) fwrite(STDERR, print_r("--- End Seeding ---\n\n", TRUE));
    }
}
