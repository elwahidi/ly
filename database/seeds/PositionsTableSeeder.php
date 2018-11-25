<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 4; $i++){
            $info = \App\Info::create([
                'first_name'    => "first_position$i",
                'last_name'     => "last_position$i",
                'city_id'       => 1
            ]);
            $info->emails()->create([
                'email'     => "position$i@ly.ly",
                'default'   => 1
            ]);
            $info->tels()->create([
                'tel'       => "065932654$i",
                'default'   => 1
            ]);
            $info->position()->create([
                'position'      => "position-$i",
                'member_id'     => 1,
                'company_id'    => 1
            ]);
        }

    }
}
