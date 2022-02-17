<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'id' => 1,
                'state_id' => 1,
                'name' => 'Seri Kembangan'
            ],
            [
                'id' => 2,
                'state_id' => 1,
                'name' => 'Bangi'
            ],
            [
                'id' => 3,
                'state_id' => 1,
                'name' => 'Puchong'
            ],
            [
                'id' => 4,
                'state_id' => 2,
                'name' => 'Taiping'
            ],
            [
                'id' => 5,
                'state_id' => 2,
                'name' => 'Kampar'
            ],
            [
                'id' => 6,
                'state_id' => 3,
                'name' => 'Nilai'
            ],
        ]);
    }
}
