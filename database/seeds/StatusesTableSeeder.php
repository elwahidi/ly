<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['inactive', 'active', 'archived'];
        foreach ($statuses as $status) {
            \App\Status::create([
                'status'    => $status
            ]);
        }
    }
}
