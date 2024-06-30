<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsentStudent extends Model
{
    use HasFactory;
    protected $table="absent_students";

    protected $primaryKey = "id";

    protected $fillable =[
        'date',
        'description',
        'student_id',
    ];
}
