<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use App\Models\Subject;
use App\Models\SubjectSchedule;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectScheduleController extends Controller
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
            $search_results_available = false;
            $nama_class = null;
            return view('subjectSchedule', compact('subjects', 'teachers', 'class_students', 'subjectSchedules', 'search_results_available', 'nama_class'));
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
        $request->validate([
            'day' => 'required',
            'hour' => 'required',
            'subject' => 'required|exists:subjects,id',
            'teacher' => 'required|exists:teachers,id',
            'class_student' => 'required|exists:class_students,id',
        ]);

        $subjectSchedule = new SubjectSchedule();
        $subjectSchedule->day = $request->input('day');
        $subjectSchedule->hour = $request->input('hour');
        $subjectSchedule->subject_id = $request->input('subject');
        $subjectSchedule->teacher_id = $request->input('teacher');
        $subjectSchedule->class_student_id = $request->input('class_student');

        $subjectSchedule->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Profile Teacher data has been saved successfully!');
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
        $subjectSchedules = SubjectSchedule::findOrFail($id);
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $class_students = ClassStudent::all();
        return view('subjectScheduleEdit', compact('subjectSchedules',
            'subjects', 'teachers', 'class_students'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'day' => 'required',
            'hour' => 'required',
            'subject' => 'required|exists:subjects,id',
            'teacher' => 'required|exists:teachers,id',
            'class_student' => 'required|exists:class_students,id',
        ]);

        $subjectSchedule = SubjectSchedule::findOrFail($id);
        $subjectSchedule->day = $request->input('day');
        $subjectSchedule->hour = $request->input('hour');
        $subjectSchedule->subject_id = $request->input('subject');
        $subjectSchedule->teacher_id = $request->input('teacher');
        $subjectSchedule->class_student_id = $request->input('class_student');
        $subjectSchedule->save();
        return redirect()->route('Schedule');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $subjectSchedule = SubjectSchedule::whereId($id) -> delete();
        return redirect()->back()->with('success', 'Schedule data has been deleted successfully!');
    }

    public function search(Request $request){

//        $search = $request->input('search-schedule');
//        $class_student = ClassStudent::where('name', 'LIKE', "%$search%")->first();
        $search = $request->input('search-schedule');
        session()->put('search-schedule', $search);
        $class_student = ClassStudent::where('name', 'LIKE', "%$search%")->first();

        if ($class_student) {
            $subjectSchedules = SubjectSchedule::where('class_student_id', $class_student->id)->get();
            $nama_class = $class_student->name;
        } else {
            $subjectSchedules = collect(); // return an empty collection if no matching class is found
            $nama_class = null;
        }

        $subjects = Subject::all();
        $teachers = Teacher::all();
        $class_students = ClassStudent::all();
        $search_results_available = true;

        return view('subjectSchedule', compact('subjectSchedules', 'subjects', 'teachers', 'class_students', 'search_results_available', 'nama_class'));

    }
}
