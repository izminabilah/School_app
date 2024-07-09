<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectGrade;
use Illuminate\Http\Request;

class SubjectGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = Subject::all();
        $students = Student::all();
        $subjectGrades = SubjectGrade::all();
        return view('SubjectGrade', compact('students','subjects','subjectGrades'));
//        return view('SubjectGrade', compact( 'class_students','subjects'));
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
        $request->validate([
            'student_ids' => 'required|array',
            'subject_id' => 'required',
            'quiz1' => 'nullable|array',
            'quiz2' => 'nullable|array',
            'midterm_test' => 'nullable|array',
            'quiz3' => 'nullable|array',
            'quiz4' => 'nullable|array',
            'final_test' => 'nullable|array',
            'homework' => 'nullable|array',
        ]);

        $subject_id = $request->input('subject_id');
        $student_ids = $request->input('student_ids');
        $quiz1 = $request->input('quiz1');
        $quiz2 = $request->input('quiz2');
        $midterm_test = $request->input('midterm_test');
        $quiz3 = $request->input('quiz3');
        $quiz4 = $request->input('quiz4');
        $final_test = $request->input('final_test');
        $homework = $request->input('homework');

        foreach ($student_ids as $index => $student_id) {
            $subjectGrade = new SubjectGrade();
            $subjectGrade->subject_id = $subject_id;
            $subjectGrade->student_id = $student_id;
            $subjectGrade->quiz1 = $quiz1[$index];
            $subjectGrade->quiz2 = $quiz2[$index];
            $subjectGrade->midterm_test = $midterm_test[$index];
            $subjectGrade->quiz3 = $quiz3[$index];
            $subjectGrade->quiz4 = $quiz4[$index];
            $subjectGrade->final_test = $final_test[$index];
            $subjectGrade->homework = $homework[$index];
            $subjectGrade->save();
        }
        return redirect()->route('subject-grade');
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
//    public function search(Request $request){
//        $search = $request->input('search-subject');
//        $students = SubjectGrade::where('subject_id', 'LIKE', "$search%")->get();
//        $subjects = Subject::all();
//        return view('SubjectGrade', compact( 'students','subjects'));
//    }
    public function search(Request $request)
    {
        $search = $request->input('search-subject');
        $subject_table = Subject::where('name', 'LIKE', "%$search%")->first();
        $subjects = Subject::all();

        if ($subject_table) {
            $subjectGrades = SubjectGrade::where('subject_id', $subject_table->id)->get();
            $students = Student::whereIn('id', $subjectGrades->pluck('student_id'))->get();
            return view('SubjectGrade', compact('subjectGrades', 'subject_table', 'students','subjects'));
        } else {
            return redirect()->route('subject-grade');
        }
    }
}
