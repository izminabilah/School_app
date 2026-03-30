<?php

namespace App\Http\Controllers;

use App\Models\ActivityStudent;
use App\Models\ClassStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class ActivityStudentSOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $class_students = ClassStudent::all();
            $activityStudents = ActivityStudent::all();
            $username = session('username');
            $student = Student::where('username', $username)->first();
            $data = $student->name;
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();
            $search_results_available = false;
            $note = null;
            return view('ActivityStudentSO', compact('class_students','activityStudents','search_results_available','data','nama_class', 'note'));
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
    public function search(Request $request){
        if(session()->exists('username')){
            $username = session('username');
            $student = Student::where('username', $username)->first();
            $data = $student->name;
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();
        }

        $search = $request->input('search-activity-so');
        $class_students = ClassStudent::where('name', 'LIKE', "%$search%")->first();

        if ($class_students) {
            $activityStudents = ActivityStudent::where('class_student_id', $class_students->id)->get();
            $note = $class_students->name;
        } else {
            $activityStudents = collect(); // return an empty collection if no matching class is found
            $note = null;
        }
        $search_results_available = true;
        $class_students = ClassStudent::all();

        return view('ActivityStudentSO', compact('activityStudents', 'class_students', 'search_results_available', 'data', 'nama_class', 'note'));
    }
}
