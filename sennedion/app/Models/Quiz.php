<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=['title','image','description','finished_at','slug','status'];
    protected $dates=['finished_at'];

    public function my_result(){
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id)->orderBy('id','DESC');
    }

    public function getFinishedAtAttribute($date){
        return $date ? Carbon::parse($date) : null;
    }
    public function questions(){
        return $this->hasMany('App\Models\Question');
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
}
