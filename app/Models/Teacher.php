<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // app/Models/Teacher.php
    protected $fillable = ['user_id', 'firstname', 'lastname', 'dob', 'class', 'year', 'bio'];
}
