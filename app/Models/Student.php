<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="students";

    protected $primaryKey = "id";

    protected $fillable =[
        'name',
        'username',
        'password',
        'address',
        'Gender',
        'parent_id',
        'class_student_id',
    ];

}
