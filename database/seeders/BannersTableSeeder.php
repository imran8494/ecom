<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bannersData = [
            ['id'=>1,'company_name'=>'MIH Company','details'=>'All types of product are available here','image'=>'girl1.jpg','link'=>'girl1','title'=>'Girl 1','alt'=>'Banner 1','status'=>1],
            ['id'=>2,'company_name'=>'MIH Company','details'=>'All types of product are available here','image'=>'girl2.jpg','link'=>'girl2','title'=>'Girl 2','alt'=>'Banner 2','status'=>1],
            ['id'=>3,'company_name'=>'MIH Company','details'=>'All types of product are available here','image'=>'girl3.jpg','link'=>'girl3','title'=>'Girl 3','alt'=>'Banner 3','status'=>1],
        ];
        Banner::insert($bannersData);
    }
}
