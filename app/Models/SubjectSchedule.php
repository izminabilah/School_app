<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectSchedule extends Model
{
    use HasFactory;

    protected $table="subject_schedules";

    protected $primaryKey = "id";

    protected $fillable =[
        'day',
        'hour',
        'teacher_id',
        'subject_id',
        'class_student_id',
    ];
    public function subject()
    {
        return $this->belongsTo(related: Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(related: Teacher::class);
    }

    public function ClassStudent()
    {
        return $this->belongsTo(related: ClassStudent::class);
    }
}
