<?php

use database\seeds\UsersTableSeeder;
use database\seeds\CountriesTableSeeder;

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
        $this->call(UsersTableSeeder::class);
        //$this->call(CountriesTableSeeder::class);
        $this->call(CountriesSeeder::class);
    }
}
