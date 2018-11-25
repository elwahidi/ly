<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(TokensTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(DealsSeeder::class);
        $this->call(BuysTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(UnloadsTableSeeder::class);
    }
}
