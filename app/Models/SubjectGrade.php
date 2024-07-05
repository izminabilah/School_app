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
        'midterm_test',
        'quiz3',
        'quiz4',
        'final_test',
        'homework',
        'subject_id',
    ];
}
