<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\DepartmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            DepartmentSeeder::class,
        ]);
    }
}
