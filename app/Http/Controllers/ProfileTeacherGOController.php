<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class ProfileTeacherGOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $profileTeachers = Teacher::all();
            return view('profileGuruGO')->with('profileTeachers', $profileTeachers);
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
            'name' => 'required',
            'email' => 'required',
            'subject_id'=>'required',
            'username'=>'required',
            'password'=>'required',
            'gender' => 'required',
            'address' => 'required',
        ]);
//        dd($request->all());
//        var_dump($tezt);
        $profileTeacher = new Teacher();
        $profileTeacher->name = $request->input('name');
        $profileTeacher->email = $request->input('email');
        $profileTeacher->gender = $request->input('gender');
        $profileTeacher->address = $request->input('address');
        $profileTeacher->subject_id = $request->input('subject_id');
        $profileTeacher->username = $request->input('username');
        $profileTeacher->password = $request->input('password');
//        var_dump($profileTeacher);
        $profileTeacher->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Profile Teacher data has been saved successfully!');
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
        $profileTeachers = Teacher::findOrFail($id);
        return view('editFormProTeacGO')-> with(['profileTeachers' => $profileTeachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $profileTeachers = Teacher::findOrFail($id);
        $profileTeachers->name = $request->input('name');
        $profileTeachers->email = $request->input('email');
        $profileTeachers->gender = $request->input('gender');
        $profileTeachers->address = $request->input('address');
        $profileTeachers->subject_id = $request->input('subject_id');
        $profileTeachers->username = $request->input('username');
        $profileTeachers->password = $request->input('password');
        $profileTeachers->save();
        return redirect()->route('profile-teacher-go');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $profileTeacher = Teacher::whereId($id) -> delete();
        return redirect()->back()->with('success', 'Teacher data has been deleted successfully!');
    }

    public function search(Request $request){
        $search = $request->input('search-tea-go');
        $profileTeachers = Teacher::where('name', 'LIKE', "$search%")->get();
//        var_dump($profileTeachers);
        return view('profileGuruGO', compact( 'profileTeachers'));
    }
}
