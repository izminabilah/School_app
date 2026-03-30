<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectGrade;
use Illuminate\Http\Request;

class SubjectGradeGOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $subjects = Subject::all();
            $students = Student::all();
            $subjectGrades = SubjectGrade::all();
            $search_results_available = false;
            return view('SubjectGradeGO', compact('students','subjects','subjectGrades', 'search_results_available'));

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
            'student_ids' => 'required|array',
            'subject_id' => 'required',
            'quiz1' => 'nullable|array',
            'quiz2' => 'nullable|array',
            'quiz3' => 'nullable|array',
            'quiz4' => 'nullable|array',
            'homework1' => 'nullable|array',
            'midterm_test' => 'nullable|array',
            'quiz5' => 'nullable|array',
            'quiz6' => 'nullable|array',
            'quiz7' => 'nullable|array',
            'quiz8' => 'nullable|array',
            'homework2' => 'nullable|array',
            'final_test' => 'nullable|array',
        ]);

        $subject_id = $request->input('subject_id');
        $student_ids = $request->input('student_ids');
        $quiz1 = $request->input('quiz1');
        $quiz2 = $request->input('quiz2');
        $quiz3 = $request->input('quiz3');
        $quiz4 = $request->input('quiz4');
        $homework1 = $request->input('homework1');
        $midterm_test = $request->input('midterm_test');
        $quiz5 = $request->input('quiz5');
        $quiz6 = $request->input('quiz6');
        $quiz7 = $request->input('quiz7');
        $quiz8 = $request->input('quiz8');
        $homework2 = $request->input('homework2');
        $final_test = $request->input('final_test');


        foreach ($student_ids as $index => $student_id) {
            $subjectGrade = new SubjectGrade();
            $subjectGrade->subject_id = $subject_id;
            $subjectGrade->student_id = $student_id;
            $subjectGrade->quiz1 = $quiz1[$index];
            $subjectGrade->quiz2 = $quiz2[$index];
            $subjectGrade->quiz3 = $quiz3[$index];
            $subjectGrade->quiz4 = $quiz4[$index];
            $subjectGrade->homework1 = $homework1[$index];
            $subjectGrade->midterm_test = $midterm_test[$index];
            $subjectGrade->quiz5 = $quiz5[$index];
            $subjectGrade->quiz6 = $quiz6[$index];
            $subjectGrade->quiz7 = $quiz7[$index];
            $subjectGrade->quiz8 = $quiz8[$index];
            $subjectGrade->homework2 = $homework2[$index];
            $subjectGrade->final_test = $final_test[$index];
            $subjectGrade->save();
        }
        return redirect()->route('subject-grade-go');
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
        $subjects = Subject::all();
        $students = Student::all();

        $subjectGrade = SubjectGrade::findOrFail($id);
        $subject_id = $subjectGrade->subject_id;

        $subjectGrades = SubjectGrade::where('subject_id', $subject_id)->get();

        return view('EditSubjectGradeGO', compact('subjects', 'students', 'subjectGrades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'student_ids' => 'required|array',
            'subject_id' => 'required',
            'quiz1' => 'nullable|array',
            'quiz2' => 'nullable|array',
            'quiz3' => 'nullable|array',
            'quiz4' => 'nullable|array',
            'homework1' => 'nullable|array',
            'midterm_test' => 'nullable|array',
            'quiz5' => 'nullable|array',
            'quiz6' => 'nullable|array',
            'quiz7' => 'nullable|array',
            'quiz8' => 'nullable|array',
            'homework2' => 'nullable|array',
            'final_test' => 'nullable|array',
        ]);

        $subject_id = $request->input('subject_id');
        $student_ids = $request->input('student_ids');
        $quiz1 = $request->input('quiz1');
        $quiz2 = $request->input('quiz2');
        $quiz3 = $request->input('quiz3');
        $quiz4 = $request->input('quiz4');
        $homework1 = $request->input('homework1');
        $midterm_test = $request->input('midterm_test');
        $quiz5 = $request->input('quiz5');
        $quiz6 = $request->input('quiz6');
        $quiz7 = $request->input('quiz7');
        $quiz8 = $request->input('quiz8');
        $homework2 = $request->input('homework2');
        $final_test = $request->input('final_test');


        foreach ($student_ids as $index => $student_id) {
            $subjectGrade = SubjectGrade::where('subject_id', $subject_id)
                ->where('student_id', $student_id)
                ->first();

            if ($subjectGrade) {
                $subjectGrade->quiz1 = $quiz1[$index];
                $subjectGrade->quiz2 = $quiz2[$index];
                $subjectGrade->quiz3 = $quiz3[$index];
                $subjectGrade->quiz4 = $quiz4[$index];
                $subjectGrade->homework1 = $homework1[$index];
                $subjectGrade->midterm_test = $midterm_test[$index];
                $subjectGrade->quiz5 = $quiz5[$index];
                $subjectGrade->quiz6 = $quiz6[$index];
                $subjectGrade->quiz7 = $quiz7[$index];
                $subjectGrade->quiz8 = $quiz8[$index];
                $subjectGrade->homework2 = $homework2[$index];
                $subjectGrade->final_test = $final_test[$index];
                $subjectGrade->save();
            } else {
                $newSubjectGrade = new SubjectGrade();
                $newSubjectGrade->subject_id = $subject_id;
                $newSubjectGrade->student_id = $student_id;
                $newSubjectGrade->quiz1 = $quiz1[$index];
                $newSubjectGrade->quiz2 = $quiz2[$index];
                $newSubjectGrade->quiz3 = $quiz3[$index];
                $newSubjectGrade->quiz4 = $quiz4[$index];
                $newSubjectGrade->homework1 = $homework1[$index];
                $newSubjectGrade->midterm_test = $midterm_test[$index];
                $newSubjectGrade->quiz5 = $quiz5[$index];
                $newSubjectGrade->quiz6 = $quiz6[$index];
                $newSubjectGrade->quiz7 = $quiz7[$index];
                $newSubjectGrade->quiz8 = $quiz8[$index];
                $newSubjectGrade->homework2 = $homework2[$index];
                $newSubjectGrade->final_test = $final_test[$index];

                $newSubjectGrade->save();
            }
        }

        return redirect()->route('subject-grade-go');
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
        $search = $request->input('search-subject-go');
        $subject_table = Subject::where('name', 'LIKE', "%$search%")->first();
        $subjects = Subject::all();
        $search_results_available = true;

        if ($subject_table) {
            $subjectGrades = SubjectGrade::where('subject_id', $subject_table->id)->get();
            $students = Student::whereIn('id', $subjectGrades->pluck('student_id'))->get();
            return view('SubjectGradeGO', compact('subjectGrades', 'subject_table', 'students','subjects', 'search_results_available'));
        } else {
            return redirect()->route('subject-grade-go');
        }
    }
}
