<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // app/Models/Student.php
protected $fillable = ['user_id', 'firstname', 'lastname', 'dob', 'class', 'bio'];

}
