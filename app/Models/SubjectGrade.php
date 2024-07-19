<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectGrade extends Model
{
    use HasFactory;
    protected $table="subject_grades";

    protected $primaryKey = "id";

    protected $fillable =[
        'student_id',
        'quiz1',
        'quiz2',
        'quiz3',
        'quiz4',
        'homework1',
        'midterm_test',
        'quiz5',
        'quiz6',
        'quiz7',
        'quiz8',
        'homework2',
        'final_test',
        'subject_id',
    ];
}
