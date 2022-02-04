<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    function getCategory(){
        return $this->hasOne('App\Models\ShareCategory','id','category_id');
    }
    use HasFactory;
}
