<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeKeeper extends Model
{
    protected $fillable=[
        'exam_id','user_id','time_left'
    ];
}
