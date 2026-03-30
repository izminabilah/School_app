<?php

namespace App\Http\Controllers;
use App\Models\AbsentStudent;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\SubjectGrade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(session()->exists('username')){
            $username = session('username');
            $student = Student::where('username', $username)->first();
            $data = $student->name;
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();
            $nama_wali = StudentParent::where('id', $class)->pluck('name')->first();
            $alamat = $student->address;
            $genderText = $student->Gender;
            $nisn = $student->nisn;
            $agama = $student->religion;
            $gender = $genderText === 'Male' ? 'Laki-laki' : ($genderText === 'Female' ? 'Perempuan' : 'N/A');

            $studentId = $student->id;

            $sakit = AbsentStudent::where('student_id', $studentId)->where('description', 'S')->count();
            $izin = AbsentStudent::where('student_id', $studentId)->where('description', 'I')->count();
            $alpa = AbsentStudent::where('student_id', $studentId)->where('description', 'A')->count();
            $hadir = AbsentStudent::where('student_id', $studentId)->where('description', 'M')->count();

            $totalDays = $sakit + $alpa + $izin + $hadir;
            if ($totalDays == 0) {
                $totalDays = 1;
            }

            $totalabsen = round(($hadir/($totalDays)*100), 3);

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
                    $totalGrade = (0.2 * $averageHomework) + (0.3 * $averageQuizzes) + (0.2 * $studentGrades->midterm_test) + (0.2 * $studentGrades->final_test) +(0.1 * $totalabsen);

                    $finalGrade = number_format($totalGrade, 2);
                    $finalGrades[$subject] = $finalGrade;
                } else {
                    $finalGrades[$subject] = null; // No grades found for this subject
                }
            }

            return view('home_so', compact('absentData','finalGrades', 'data', 'nama_class', 'alamat', 'nama_wali', 'gender', 'agama', 'nisn'));
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
        if(session()->exists('username')){
            $username = session('username');
            $accountStudents = Student::where('username', $username)->first();
        }
        return view('PasswordEditSO')-> with(['accountStudents' => $accountStudents]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if(session()->exists('username')){
            $username = session('username');
            $accountStudents = Student::where('username', $username)->first();
        }

        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');

        if($old_password == $accountStudents->password){
            if($new_password == $confirm_password){
                $accountStudents->password = $new_password;
                $accountStudents->save();
                // Berikan pesan sukses
                return redirect()->route('home_so')->with('success', 'Password berhasil diubah');
            }else{
                // Berikan pesan error
                return redirect()->back()->with('error', 'Konfirmasi password tidak cocok');
            }
        }else{
            // Berikan pesan error
            return redirect()->back()->with('error', 'Password lama tidak cocok');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
