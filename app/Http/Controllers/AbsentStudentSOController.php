<?php

namespace App\Http\Controllers;

use App\Models\AbsentStudent;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;

class AbsentStudentSOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        if(session()->exists('username')){
            $username = session('username');
            $student = Student::where('username', $username)->first();
            $data = $student->name;
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();

            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $currentMonth = $request->input('month', 'January');

        $class_student = ClassStudent::where('name','LIKE', $nama_class)->first();

        if ($class_student) {
            $students = Student::where('class_student_id', $class_student->id)->get();
            $student_ids = $students->pluck('id');
            $absentStudents = AbsentStudent::whereIn('student_id', $student_ids)->get();

            $currentMonthIndex = array_search($currentMonth, $months);
            $previousMonth = $months[$currentMonthIndex - 1] ?? null;
            $nextMonth = $months[$currentMonthIndex + 1] ?? null;
        } else {
            $absentStudents = collect(); // return an empty collection if no matching class is found
        }
        /////
        $absents = AbsentStudent::where('month', $currentMonth)->get()->groupBy(['student_id', 'day']);

        // Ensure absents array is structured with the correct keys
        $absentsStructured = [];
        foreach ($absents as $student_id => $days) {
            foreach ($days as $day => $absent) {
                $absentsStructured[$student_id][$day] = $absent->first();
            }
        }
        ////
//        $search_results_available = true;

        return view('AbsentStudentSO', compact('absentStudents', 'students','absentsStructured', 'data', 'nama_class', 'months', 'currentMonth', 'previousMonth', 'nextMonth'));
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
        if(session()->exists('username')){
            $username = session('username');
            $student = Student::where('username', $username)->first();
            $data = $student->name;
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();

            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $currentMonth = $request->input('month', 'January');
        }
//        $search = $request->input('search-absent-so');
//        session()->put('search-absent-so', $search);
//        $classes = session()->get('search-absent-so');

//        $class_student = ClassStudent::where('name', 'LIKE', "%$class%")->first();
        $class_student = ClassStudent::where('name','LIKE', $nama_class)->first();

        if ($class_student) {
            $students = Student::where('class_student_id', $class_student->id)->get();
            $student_ids = $students->pluck('id');
            $absentStudents = AbsentStudent::whereIn('student_id', $student_ids)->get();

            $currentMonthIndex = array_search($currentMonth, $months);
            $previousMonth = $months[$currentMonthIndex - 1] ?? null;
            $nextMonth = $months[$currentMonthIndex + 1] ?? null;
        } else {
            $absentStudents = collect(); // return an empty collection if no matching class is found
        }
        /////
        $absents = AbsentStudent::where('month', $currentMonth)->get()->groupBy(['student_id', 'day']);

        // Ensure absents array is structured with the correct keys
        $absentsStructured = [];
        foreach ($absents as $student_id => $days) {
            foreach ($days as $day => $absent) {
                $absentsStructured[$student_id][$day] = $absent->first();
            }
        }
        ////
//        $search_results_available = true;

        return view('AbsentStudentSO', compact('absentStudents', 'students','absentsStructured', 'data', 'nama_class', 'months', 'currentMonth', 'previousMonth', 'nextMonth'));
    }
}
