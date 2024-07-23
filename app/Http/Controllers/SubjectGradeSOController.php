<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectGrade;
use Illuminate\Http\Request;

class SubjectGradeSOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $subjects = Subject::all();
            $students = Student::all();
            $subjectGrades = SubjectGrade::all();
            $search_results_available = false;
            return view('SubjectGradeSO', compact('students','subjects','subjectGrades', 'search_results_available'));

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
        $search = $request->input('search-subject-so');
        $subject_table = Subject::where('name', 'LIKE', "%$search%")->first();
        $subjects = Subject::all();
        $search_results_available = true;

        if ($subject_table) {
            $subjectGrades = SubjectGrade::where('subject_id', $subject_table->id)->get();
            $students = Student::whereIn('id', $subjectGrades->pluck('student_id'))->get();
            return view('SubjectGradeSO', compact('subjectGrades', 'subject_table', 'students','subjects', 'search_results_available'));
        } else {
            return redirect()->route('subject-grade-so');
        }
    }
}
