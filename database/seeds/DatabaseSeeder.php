<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(SuppllersTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoryNewsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
    }
}
