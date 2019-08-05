<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable=[
     'exam_id','user_id','question_id','response'
    ];
}
