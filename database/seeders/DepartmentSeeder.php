<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'name' => 'Sfera'
            ],
            [
                'id' => 2,
                'name' => 'Atmosphere'
            ],
            [
                'id' => 3,
                'name' => '3 Element'
            ],
            [
                'id' => 4,
                'name' => 'IOI'
            ],
        ]);
    }
}
