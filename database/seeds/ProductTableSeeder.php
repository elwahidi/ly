<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = \App\Company::first();
        for($i = 1; $i < 6; $i++){
            $product = $company->products()->create([
                'slug'          => "product-0-$i",
                'name'          => "product-0$i",
                'ref'           => "PROD-00$i",
                'tva'           => 20
            ]);
            $product->imgs()->create([
                'img'   => "product-0$i.jpg"
            ]);
        }

    }
}
