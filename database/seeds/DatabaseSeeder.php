<?php

use Illuminate\Database\Seeder;
use Database\Seedes\RolesWithUsersAndPermissionsSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        $this->call(RolesWithUsersAndPermissionsSeeder::class);
        $this->call(OrgainzationDataSeeder::class);
    }
}
