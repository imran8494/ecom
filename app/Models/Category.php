<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function subcategories()
    {
        return $this->hasMany('App\Models\Category','parent_id')->where('status',1);
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id')->select('id','name')->where('status',1);
    }
    public function parentcategories()
    {
        return $this->belongsTo('App\Models\Category','parent_id')->select('id','category_name')->where('status',1);
    }

    public static function category_details($url){
        $category_details = Category::select('id','parent_id','category_name','url','description')->with(['subcategories'=> function($query){
            $query->select('id','parent_id','category_name','url','description')->where('status',1);
        }])->where('url',$url)->first();
        // dd($category_details);die;
        $catIds = array();
        $catIds[] = $category_details['id'];
        foreach ($category_details['subcategories'] as $key => $sub_cat) {
            $catIds[] = $sub_cat['id'];
        }
        // dd($catIds);
        return array('catIds'=>$catIds,'category_details'=>$category_details);
    }
}
