<?php

namespace App\Http\Controllers;

use App\Models\AbsentStudent;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectGrade;
use Illuminate\Http\Request;

class AbsentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//        $subjects = Subject::all();
//        $students = Student::all();
//        $absents = AbsentStudent::all()->groupBy(['student_id', 'day']);
//
//        return view('AbsentStudent', compact('students', 'absents'));
        $students = Student::all();
        $absents = AbsentStudent::all()->groupBy(['student_id', 'day']);

        // Ensure absents array is structured with the correct keys
        $absentsStructured = [];
        foreach ($absents as $student_id => $days) {
            foreach ($days as $day => $absent) {
                $absentsStructured[$student_id][$day] = $absent->first();
            }
        }

        return view('AbsentStudent', compact('students', 'absentsStructured'));

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
            'student_ids' => 'required|array',
            'day' => 'nullable|array',
            'month' => 'nullable|array',
            'year' => 'nullable|array',
            'description' => 'nullable|array',
        ]);

        $student_ids = $request->input('student_ids');
        $month = $request->input('month')[0];
        $year = $request->input('year')[0];
        $descriptions = $request->input('description');

        foreach ($student_ids as $index => $student_id) {
            for ($day = 1; $day <= 31; $day++) {
                $descriptionIndex = ($index * 31) + ($day - 1);
                if (isset($descriptions[$descriptionIndex]) && !empty($descriptions[$descriptionIndex])) {
                    $description = $descriptions[$descriptionIndex];

                    $absentStudent = new AbsentStudent();
                    $absentStudent->student_id = $student_id;
                    $absentStudent->day = $day;
                    $absentStudent->month = $month;
                    $absentStudent->year = $year;
                    $absentStudent->description = $description;
                    $absentStudent->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Absensi berhasil disimpan');

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
            $students = Student::all();
            $months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            $years = ['2024', '2025', '2026'];
            $absent = AbsentStudent::findOrFail($id);
            return view('AbsentStudentEdit', compact('students', 'absent', 'months', 'years'));
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
}
