<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time_tracker extends Model
{
    use HasFactory;
    protected $table = "time_tracker";
    protected $fillable = [
        'id',
        'student_id',
        'date',
        'time_in',
        'time_out',
    ];
}
