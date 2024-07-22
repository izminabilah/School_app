<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityStudent extends Model
{
    use HasFactory;

    protected $table="activity_students";

    protected $primaryKey = "id";

    protected $fillable =[
        'class_student_id',
        'activity_photo',
        'datetime',
        'description',
    ];
}
