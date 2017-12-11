<?php

namespace database\seeds;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends \DatabaseSeeder
{
    // create 100 User table records
    // that WILL be created in the database

    public function run() {
        factory('App\User', 100)->create();
    }
}