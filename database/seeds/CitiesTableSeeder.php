<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['casablanca', 'rabat'];
        foreach ($cities as $city) {
            \App\City::create([
                'city'  => $city
            ]);
        }
    }
}
