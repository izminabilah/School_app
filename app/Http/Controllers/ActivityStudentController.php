<?php

namespace App\Http\Controllers;

use App\Models\ActivityStudent;
use App\Models\ClassStudent;
use Illuminate\Http\Request;

class ActivityStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $class_students = ClassStudent::all();
        return view('ActivityStudent', compact('class_students'));
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
//        var_dump('berhasil masuk store');
        $request->validate([
            'class_student' => 'required',
            'activity_photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'datetime'=> 'required',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('activity_photo')) {
            $imagePath = $request->file('activity_photo')->store('photos', 'public');

            $activityStudent = new ActivityStudent();
            $activityStudent->class_student_id = $request->input('class_student');
            $activityStudent->datetime = $request->input('datetime');
            $activityStudent->activity_photo = $imagePath;
            $activityStudent->description = $request->input('description');
            $activityStudent->save();

        }
        return redirect()->route('aktivitas');
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
