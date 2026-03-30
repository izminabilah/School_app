<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\Subject;
use App\Models\SubjectSchedule;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectSchedulePOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $class_students = ClassStudent::all();
            $subjectSchedules = SubjectSchedule::all();
            $username = session('username');
            $parent = StudentParent::where('username', $username)->first();
            $data = $parent->name;
            $status = $data ? 'wali murid' : null;
            $search_results_available = false;
            $note = null;
            return view('subjectSchedulePO', compact('subjects', 'teachers', 'class_students', 'subjectSchedules', 'search_results_available', 'data', 'status', 'note'));
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

        $search = $request->input('search-schedule-po');
        $class_student = ClassStudent::where('name', 'LIKE', "%$search%")->first();

        if ($class_student) {
            $subjectSchedules = SubjectSchedule::where('class_student_id', $class_student->id)->get();
            $note = $class_student->name;
        } else {
            $subjectSchedules = collect(); // return an empty collection if no matching class is found
            $note = null;
        }

        if(session()->exists('username')){
            $username = session('username');
            $parent = StudentParent::where('username', $username)->first();
            $data = $parent->name;
            $status = $data ? 'wali murid' : null;
            $parentId = $parent->id;
            $student = Student::where('parent_id', $parentId)->first();
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();
        }

        $subjects = Subject::all();
        $teachers = Teacher::all();
        $class_students = ClassStudent::all();
        $search_results_available = true;

        return view('subjectSchedulePO', compact('subjectSchedules', 'subjects', 'teachers', 'class_students', 'search_results_available', 'data', 'nama_class', 'status', 'note'));

    }
}
