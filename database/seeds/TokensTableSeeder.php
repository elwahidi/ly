<?php

use Illuminate\Database\Seeder;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Category::all();
        $company_premium = \App\Company::first()->premium;
        foreach ($categories as $category) {
            if($category->id > 2){
                $category->tokens()->create([
                    'token'     => md5(sha1(rand())),
                    'range'     => 30,
                    'company_id'=> 1
                ]);
                $company_premium->update([
                    'sold'  => $company_premium->sold - 30,
                ]);
            }
        }
    }
}
