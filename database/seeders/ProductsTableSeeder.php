<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            ['id'=>1,'category_id'=>2,'section_id'=>1,'product_name'=>'Red Casual T-shirts','product_code'=>'RCT001','product_color'=>'red','product_price'=>2000,'product_discount'=>10,'product_weight'=>200,'product_video'=>'','product_image'=>'','description'=>'Red casual T-shirts','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','occasion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1],
            ['id'=>2,'category_id'=>3,'section_id'=>1,'product_name'=>'Blue Formal T-shirts','product_code'=>'BFT001','product_color'=>'blue','product_price'=>2000,'product_discount'=>10,'product_weight'=>200,'product_video'=>'','product_image'=>'','description'=>'Blue formal T-shirts','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','occasion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'No','status'=>1],
        ];

        Product::insert($records);
    }
}
