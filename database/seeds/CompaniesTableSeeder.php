<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // info box
        $info_box = \App\Info_box::create([
            'brand'     => null,
            'name'      => 'company S.A.R.L',
            'licence'   => '123456798',
            'turnover'  => '10000',
            'taxes'     => 32,
            'fax'       => '0522663399',
            'speaker'   => 'yasser',
            'address'   => 'BD Zerktouni 18',
            'build'     => '156',
            'floor'     => '5',
            'apt_nbr'   => '23',
            'zip'       => '20000',
            'city_id'   => 1
        ]);
        // email
        $info_box->emails()->create([
            'email'     => 'company@ly.ly',
            'default'   => 1
        ]);
        //tel
        $info_box->tels()->create([
            'tel'       => '0522664455',
            'default'   => 1
        ]);
        // premium
        $premium = \App\Premium::create([
            'sold'          => 300,
            'range'         => 30,
            'limit'         => null,
            'category_id'   => 1,
            'status_id'     => 1
        ]);
        // company
        $company = $premium->company()->create([
            'slug'      => str_slug('company S.A.R.L'),
            'info_box_id'   => $info_box->id
        ]);
        // pdg
        $company->tokens()->create([
            'token'         => md5(sha1(rand())),
            'range'         => 30,
            'category_id'   => 2
        ]);
        $company->accounting()->create([
            'tva' => 0
        ]);
    }
}
