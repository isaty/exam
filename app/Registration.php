<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    protected $fillable = [
        'stdno', 'name', 'email', 'contactNo', 'hosteller', 'gender', 'branch',
    ];

    public static function getStudentData($rollNumber)
    {
        return Student::where('username', $rollNumber)->get();
    }
}