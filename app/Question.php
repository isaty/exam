<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_id', 'question','option1','option2','option3','option4','answer'
    ];
}
