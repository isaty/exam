<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_id', 'admin_id','termination_time','duration','scheduled_time','status'
    ];
}
