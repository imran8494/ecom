<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
class Section extends Model
{
    use HasFactory;

    public static function sections()
    {
        $get_section = Section::with('categories')->where('status',1)->get();
        // $get_section = json_decode(json_encode($get_section),true);
        // echo "<pre>";print_r($get_section);die;
        return $get_section;
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category','section_id')->where(['parent_id'=>'ROOT','status'=>1])->with('subcategories');
    }
}
