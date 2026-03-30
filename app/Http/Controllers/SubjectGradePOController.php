<?php

namespace App\Http\Controllers;

use App\Models\AbsentStudent;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\Subject;
use App\Models\SubjectGrade;
use Illuminate\Http\Request;

class SubjectGradePOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $username = session('username');
            $parent = StudentParent::where('username', $username)->first();
            $data = $parent->name;
            $status = $data ? 'wali murid' : null;
            $parentId = $parent->id;
            $student = Student::where('parent_id', $parentId)->first();

            if ($student) {
                $studentId = $student->id;
                $subjects = Subject::where('id', '!=', 2)->get();
                $subjectGrades = SubjectGrade::where('student_id', $studentId)
                                                ->where('subject_id', '!=', 2)
                                                ->get();
                $namasiswa = $student->name;
                $class = $student->class_student_id;
                $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();

                $sakit = AbsentStudent::where('student_id', $studentId)->where('description', 'S')->count();
                $izin = AbsentStudent::where('student_id', $studentId)->where('description', 'I')->count();
                $alpa = AbsentStudent::where('student_id', $studentId)->where('description', 'A')->count();
                $hadir = AbsentStudent::where('student_id', $studentId)->where('description', 'M')->count();

                $totalDays = $sakit + $alpa + $izin + $hadir;
                if ($totalDays == 0) {
                    $totalDays = 1;
                }
                $totalabsen = round(($hadir/($totalDays)*100), 3);

                return view('SubjectGradePO', compact('subjects', 'subjectGrades','totalabsen', 'data', 'status', 'namasiswa', 'nama_class'));
            }else {
                return redirect()->route('sign-in');
            }
        }else {
            return redirect()->route('sign-in');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function search(Request $request)
    {
        $search = $request->input('search-subject-po');
        $subject_table = Subject::where('name', 'LIKE', "%$search%")->first();
        $subjects = Subject::all();
        $search_results_available = true;

        if ($subject_table) {
            $subjectGrades = SubjectGrade::where('subject_id', $subject_table->id)->get();
            $students = Student::whereIn('id', $subjectGrades->pluck('student_id'))->get();
            return view('SubjectGradePO', compact('subjectGrades', 'subject_table', 'students','subjects', 'search_results_available'));
        } else {
            return redirect()->route('subject-grade-po');
        }
    }
}
