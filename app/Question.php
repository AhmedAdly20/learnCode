<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','score','right_answer','answers','type','quiz_id'];

    public function quiz(){
        return $this->belongsTo('App\Quiz');
    }
}
