<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareCategory extends Model
{
    public function shares(){
        return $this->hasMany('App\Models\Share','category_id','id')->count();
    }
    use HasFactory;
}
