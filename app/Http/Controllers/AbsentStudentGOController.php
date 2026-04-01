<?php

namespace App\Http\Controllers;

use App\Models\AbsentStudent;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AbsentStudentGOController extends Controller
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
            $teacher = Teacher::where('username', $username)->first();
            $data = $teacher->name;
            $status = $data ? 'guru' : null;
            $absents = AbsentStudent::all()->groupBy(['student_id', 'day']);
            $search = null;
            $search_results_available = false;
            $note = null;

            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $currentMonth = ('January');
            $currentMonthIndex = array_search($currentMonth, $months);

            $previousMonth = $months[$currentMonthIndex - 1] ?? null;
            $nextMonth = $months[$currentMonthIndex + 1] ?? null;

            // Ensure absents array is structured with the correct keys
            $absentsStructured = [];
            foreach ($absents as $student_id => $days) {
                foreach ($days as $day => $absent) {
                    $absentsStructured[$student_id][$day] = $absent->first();
                }
            }
            return view('AbsentStudentGO', compact('students', 'absentsStructured','search_results_available', 'data', 'status', 'months', 'currentMonth', 'previousMonth', 'nextMonth', 'search', 'note'));

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
        //
        $students = Student::all();
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        $years = ['2026', '2027', '2028', '2030', '2031', '2032', '2033'];

        // Find or create an AbsentStudent record by student_id
        $absent = AbsentStudent::where('student_id', $id)->first();
        if (!$absent) {
            $absent = new AbsentStudent();
            $absent->student_id = $id;
            $absent->month = 'January';
            $absent->year = '2026';
            $absent->day = 1;
            $absent->description = '';
            $absent->save();
        }

        return view('AbsentStudentEditGO', compact('students',
            'absent', 'months', 'years'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_ids' => 'required|array',
            'day' => 'nullable|array',
            'month' => 'required|string',
            'year' => 'required|string',
            'description' => 'nullable|array',
        ]);
        $student_ids = $request->input('student_ids');
        $month = $request->input('month');
        $year = $request->input('year');
        $descriptions = $request->input('description');
        foreach ($student_ids as $index => $student_id) {
            for ($day = 1; $day <= 31; $day++) {
                $descriptionIndex = ($index * 31) + ($day - 1);
                $description = $descriptions[$descriptionIndex] ?? null;
                if (!empty($description)) {
                    $absentStudent = AbsentStudent::where('student_id', $student_id)
                        ->where('day', $day)
                        ->where('month', $month)
                        ->where('year', $year)
                        ->first();
                    if ($absentStudent) {
                        $absentStudent->description = $description;
                        $absentStudent->save();
                    } else {
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
        }
        return redirect()-> route('absent-student-go');
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
            $teacher = Teacher::where('username', $username)->first();
            $data = $teacher->name;
            $status = $data ? 'guru' : null;

            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            $currentMonth = $request->input('month', 'January');
        }

        $search = $request->input('search-absent-go');
        session()->put('search-absent-go', $search);
        $class = session()->get('search-absent-go');

        $class_student = ClassStudent::where('name', 'LIKE', "%$class%")->first();
        $currentMonthIndex = array_search($currentMonth, $months);
        $previousMonth = $months[$currentMonthIndex - 1] ?? null;
        $nextMonth = $months[$currentMonthIndex + 1] ?? null;
        if ($class_student) {
            $students = Student::where('class_student_id', $class_student->id)->get();
            $student_ids = $students->pluck('id');
            $absentStudents = AbsentStudent::whereIn('student_id', $student_ids)->get();
            $note = $class_student->name;
        } else {
            $absentStudents = collect(); // return an empty collection if no matching class is found
            $note = null;
        }

        $absents = AbsentStudent::where('month', $currentMonth)->get()->groupBy(['student_id', 'day']);
        $absentsStructured = [];
        foreach ($absents as $student_id => $days) {
            foreach ($days as $day => $absent) {
                $absentsStructured[$student_id][$day] = $absent->first();
            }
        }

        $search_results_available = true;

        return view('AbsentStudentGO', compact('absentStudents', 'students', 'search_results_available', 'absentsStructured', 'data', 'status', 'months', 'currentMonth', 'previousMonth', 'nextMonth', 'search', 'note'));
    }

}
