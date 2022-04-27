<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionsData = [
            ['id'=>1,'name'=>'Men','status'=>1],
            ['id'=>2,'name'=>'Women','status'=>1],
            ['id'=>3,'name'=>'Kids','status'=>1],
        ];

        DB::table('sections')->insert($sectionsData);
    }
}
