<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_info extends Model
{
    use HasFactory;
    protected $table = "user_data";
    protected $fillable = [
        'fname',
        'lname',
        'birthday',
        'user_type',
        'gender',
        'phone_number',
        'email',
        'password',
        'username',
    ];
}
