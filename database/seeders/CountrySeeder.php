<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Http::get('https://flagcdn.com/en/codes.json')->json();
        $countries = [];

        $index = 1;
        foreach($data as $key => $name)
        {
            $item = [
                'id' => $index,
                'country_code' => $key,
                'name' => $name,
            ];

            array_push($countries, $item);
            $index++;
        }

        DB::table('countries')->insert($countries);
    }
}
