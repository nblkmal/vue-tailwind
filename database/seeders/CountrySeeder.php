<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'id' => 1,
                'country_code' => 'MYS',
                'name' => 'Malaysia'
            ],
            [
                'id' => 2,
                'country_code' => 'IND',
                'name' => 'Indonesia'
            ],
            [
                'id' => 3,
                'country_code' => 'SGP',
                'name' => 'Singapore'
            ],
        ]);
    }
}
