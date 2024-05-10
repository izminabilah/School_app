<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class ProfileTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('profileGuru');
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'subject_id'=>'required',
        ]);

        $accountTeacher = new Teacher();
        $accountTeacher->name = $request->input('name');
        $accountTeacher->username = $request->input('username');;
        $accountTeacher->password = $request->input('password');;
        $accountTeacher->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Teacher data has been saved successfully!');
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
