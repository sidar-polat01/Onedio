<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    function getCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }
    public function articles(){
        return $this->hasMany('App\Models\Article');
    }

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'onUpdate'=>true,
                'source'=>'title'
            ]
        ];
    }
    use HasFactory;
}
