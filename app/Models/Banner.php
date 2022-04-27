<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public static function get_banners(){
        $get_banners = Banner::where('status',1)->get();
        return $get_banners;
    }
}
