<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ProfileTeacherSOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//        return view('profileGuru');
        if(session()->exists('username')){
            $profileTeachers = Teacher::all();
            $username = session('username');
            $student = Student::where('username', $username)->first();
            $data = $student->name;
            $class = $student->class_student_id;
            $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();
            return view('profileGuruSO', compact('profileTeachers', 'data', 'nama_class'));
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
//        var_dump($request);

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
        $search = $request->input('search-tea');
        $profileTeachers = Teacher::where('name', 'LIKE', "$search%")->get();
        $username = session('username');
        $student = Student::where('username', $username)->first();
        $data = $student ? $student->name : '';
        $class = $student ? $student->class_student_id : null;
        $nama_class = ClassStudent::where('id', $class)->pluck('name')->first();
        return view('profileGuruSO', compact('profileTeachers', 'data', 'nama_class'));
    }
}
