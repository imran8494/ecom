<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ProductsTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(SectionsTableSeeder::class);
        // $this->call(AdminsTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create();
        // $this->call(BannersTableSeeder::class);
        // $this->call(CustomersTableSeeder::class);
        // $this->call(CouponsTableSeeder::class);
        // $this->call(DeliveryAddressTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
    }
}
