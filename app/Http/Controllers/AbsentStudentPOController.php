<?php

namespace App\Http\Controllers;

use App\Models\AbsentStudent;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;

class AbsentStudentPOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $students = Student::all();
            $username = session('username');
            $parent = StudentParent::where('username', $username)->first();
            $data = $parent->name;
            $status = $data ? 'wali murid' : null;
//            $absents = AbsentStudent::all()->groupBy(['student_id', 'day']);
//            $search_results_available = false;
            $parentId = $parent->id;
            $student = Student::where('parent_id', $parentId)->first();
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();

            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $currentMonth = ('January');
            $currentMonthIndex = array_search($currentMonth, $months);
//            $search = null;
            $previousMonth = $months[$currentMonthIndex - 1] ?? null;
            $nextMonth = $months[$currentMonthIndex + 1] ?? null;

            $class_student = ClassStudent::where('name','LIKE', $nama_class)->first();
            if ($class_student) {
                $students = Student::where('class_student_id', $class_student->id)
                    -> orderBy('name', 'asc')->get();
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
            return view('AbsentStudentPO', compact('students','absentStudents', 'absentsStructured', 'data', 'status','months', 'currentMonth', 'previousMonth', 'nextMonth', 'nama_class'));

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
            $parent = StudentParent::where('username', $username)->first();
            $data = $parent->name;
            $status = $data ? 'wali murid' : null;

            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $currentMonth = $request->input('month', 'January');

            $parentId = $parent->id;
            $student = Student::where('parent_id', $parentId)->first();
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();
        }

//        $search = $request->input('search-absent-po');
//        session()->put('search-absent-po', $search);
//        $class = session()->get('search-absent-po');
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

        return view('AbsentStudentPO', compact('absentStudents', 'students', 'absentsStructured', 'data', 'status', 'months', 'currentMonth', 'previousMonth', 'nextMonth', 'nama_class'));

    }
}
