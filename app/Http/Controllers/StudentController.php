<?php

namespace App\Http\Controllers;
use App\Models\AbsentStudent;
use App\Models\Student;
use App\Models\SubjectGrade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//        if(session()->exists('username')){
//            $username = session('username');
//            $student = Student::where('username', $username)->first();
//            $data = $student->id;
//            $absent = AbsentStudent::where('student_id', $data)->first();
//            return view('home_so', compact('absent'));
//        }else {
//            return redirect()->route('sign-in');
//        }
        if(session()->exists('username')){
            $username = session('username');
            $student = Student::where('username', $username)->first();
            $studentId = $student->id;

            $sakit = AbsentStudent::where('student_id', $studentId)->where('description', 'S')->count();
            $izin = AbsentStudent::where('student_id', $studentId)->where('description', 'I')->count();
            $alpa = AbsentStudent::where('student_id', $studentId)->where('description', 'A')->count();
            $hadir = AbsentStudent::where('student_id', $studentId)->where('description', 'M')->count();

            $absentData = [
                'sakit' => $sakit,
                'izin' => $izin,
                'alpa' => $alpa,
                'hadir' => $hadir,
            ];

            $subjectIds = [
                'ekonomi' => 13,
                'mtk_wajib'=> 12,
                'ppkn' => 14,
                'b_indonesia' => 1,
                'b_inggris' => 11,
                'sejarah_indonesia' => 15,
            ];

            $finalGrades = [];

            foreach ($subjectIds as $subject => $subjectId) {
                $studentGrades = SubjectGrade::where('student_id', $studentId)
                    ->where('subject_id', $subjectId)
                    ->first();

                if ($studentGrades) {
                    $averageHomework = ($studentGrades->homework1 + $studentGrades->homework2) / 2;
                    $averageQuizzes = ($studentGrades->quiz1 + $studentGrades->quiz2 + $studentGrades->quiz3 + $studentGrades->quiz4 + $studentGrades->quiz5 + $studentGrades->quiz6 + $studentGrades->quiz7 + $studentGrades->quiz8) / 8;
                    $finalGrade = (0.2 * $averageHomework) + (0.3 * $averageQuizzes) + (0.2 * $studentGrades->midterm_test) + (0.3 * $studentGrades->final_test);

                    $finalGrades[$subject] = $finalGrade;
                } else {
                    $finalGrades[$subject] = null; // No grades found for this subject
                }
            }


            return view('home_so', compact('absentData','finalGrades'));
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
}
