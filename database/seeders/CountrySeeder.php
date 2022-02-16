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
                'country_code' => 'SK',
                'name' => 'Seri Kembangan'
            ],
            [
                'id' => 2,
                'country_code' => 'RWG',
                'name' => 'Rawang'
            ],
        ]);
    }
}
