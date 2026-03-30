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
//        if(session()->exists('username')){
//            $student = Student::where('username', $username)->first();
//            $studentId = $student->id;
//
//            $subjects = Subject::all();
//            $students = Student::all();
//            $subjectGrades = SubjectGrade::where('student_id', $studentId);
//            $search_results_available = false;
//            return view('SubjectGradeSO', compact('students','subjects','subjectGrades', 'search_results_available'));
//
//        }else {
//            return redirect()->route('sign-in');
//        }
        if(session()->exists('username')){
            $username = session('username');
            $student = Student::where('username', $username)->first();
            if ($student) {
                $studentId = $student->id;

                $subjects = Subject::all();
                $subjectGrades = SubjectGrade::where('student_id', $studentId)->get();
                $search_results_available = false;
                return view('SubjectGradeSO', compact('subjects', 'subjectGrades', 'search_results_available'));
            } else {
                return redirect()->route('sign-in');
            }
        } else {
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
    }
}
