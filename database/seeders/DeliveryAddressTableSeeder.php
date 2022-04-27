<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $delivery_address = [
            ['id'=>1, 'user_id'=>2,'name'=>'Md. Imran Hossain', 'address'=>'17/A, Shantibag','city'=>'Dhaka','state'=>'Shahjahanpur','country'=>'Bangladesh','pincode'=>'1217','mobile'=>'01771045019','status'=>1],
            ['id'=>2, 'user_id'=>2,'name'=>'Imran Hossain', 'address'=>'19/A, Shantibag','city'=>'Dhaka','state'=>'Shahjahanpur','country'=>'Bangladesh','pincode'=>'1217','mobile'=>'01771045019','status'=>1],
        ];

        DeliveryAddress::insert($delivery_address);
    }
}
