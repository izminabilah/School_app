<?php

namespace App\Http\Controllers;

use App\Models\ActivityStudent;
use App\Models\ClassStudent;
use Illuminate\Http\Request;

class ActivityStudentGOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $class_students = ClassStudent::all();
            $activityStudents = ActivityStudent::all();
            $search_results_available = false;
            return view('ActivityStudentGO', compact('class_students','activityStudents','search_results_available'));
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

        return redirect()->route('aktivitas-go');
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
        $class_students = ClassStudent::all();
        $activityStudents = ActivityStudent::findOrFail($id);
        return view('ActivityStudentEditGO', compact('class_students', 'activityStudents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'class_student' => 'required',
            'activity_photo' => 'image|mimes:jpeg,png,jpg,gif',
            'datetime' => 'required',
            'description' => 'nullable',
        ]);

        $activityStudent = ActivityStudent::findOrFail($id);

        if ($request->hasFile('activity_photo')) {
            $imagePath = $request->file('activity_photo')->store('photos', 'public');
            $activityStudent->activity_photo = $imagePath;
        }

        $activityStudent->class_student_id = $request->input('class_student');
        $activityStudent->datetime = $request->input('datetime');
        $activityStudent->description = $request->input('description');
        $activityStudent->save();

        return redirect()->route('aktivitas-go');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $activityStudent = ActivityStudent::whereId($id) -> delete();
        return redirect()->back()->with('success', 'Schedule data has been deleted successfully!');
    }

    public function search(Request $request){
        $search = $request->input('search-activity-go');
        $class_students = ClassStudent::where('name', 'LIKE', "%$search%")->first();
        if ($class_students) {
            $activityStudents = ActivityStudent::where('class_student_id', $class_students->id)->get();
        } else {
            $activityStudents = collect(); // return an empty collection if no matching class is found
        }
        $search_results_available = true;
        $class_students = ClassStudent::all();

        return view('ActivityStudentGO', compact('activityStudents', 'class_students', 'search_results_available'));
    }
}
