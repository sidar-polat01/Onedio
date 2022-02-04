<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function newsCount(){
        return $this->hasMany('App\Models\News','category_id','id')->count();
    }
    use HasFactory;
}
