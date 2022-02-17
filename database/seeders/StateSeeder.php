<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'id' => 1,
                'country_id' => 1,
                'name' => 'Selangor'
            ],
            [
                'id' => 2,
                'country_id' => 1,
                'name' => 'Perak'
            ],
            [
                'id' => 3,
                'country_id' => 1,
                'name' => 'Negeri Sembilan'
            ],
            [
                'id' => 4,
                'country_id' => 1,
                'name' => 'Pahang'
            ],
            [
                'id' => 5,
                'country_id' => 3,
                'name' => 'Changi'
            ],
            [
                'id' => 6,
                'country_id' => 3,
                'name' => 'Ang Mo Kio'
            ],
        ]);
    }
}
