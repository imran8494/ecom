<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $customers = [
            ['id'=>1,'name'=>'imran hossain','email'=>'imran@test.com','password'=>'$2y$10$TOzowTtWBiQQaVCcq2Tu0edOr5wFJXf.L9wuMV/apiq1ssh5WLx3.','mobile'=>'01771045019'],
            ['id'=>2,'name'=>'imran hossain','email'=>'imraaan@test.com','password'=>'$2y$10$TOzowTtWBiQQaVCcq2Tu0edOr5wFJXf.L9wuMV/apiq1ssh5WLx3.','mobile'=>'01771045019'],
        ];

        Customer::insert($customers);

    }
}
