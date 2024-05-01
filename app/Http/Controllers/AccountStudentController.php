<?php

namespace App\Http\Controllers;

use App\Models\Student;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountStudentController extends Controller
{
    //
    public function index()
    {
        //
        $accountStudents = Student::all();
        return view('AccountStudent')->with('accountStudents', $accountStudents);
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
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $accountStudent = new Student();
        $accountStudent->name = $request->input('name');
        $accountStudent->username = $request->input('username');;
        $accountStudent->password = $request->input('password');;
        $accountStudent->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Student data has been saved successfully!');
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
        $accountStudents = Student::findOrFail($id);
        return view('editFormAccStu')-> with(['accountStudents' => $accountStudents]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $accountStudents = Student::findOrFail($id);
        $accountStudents->name = $request->input('name');
        $accountStudents->username = $request->input('username');
        $accountStudents->password = $request->input('password');
        $accountStudents->save();
        return redirect()->route('account-student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accountStudent = Student::whereId($id) -> delete();
        return redirect()->back()->with('success', 'Student data has been deleted successfully!');
    }

    public function search(Request $request){
//        $students = DB::table('students')->where('name', 'LIKE', "$search%")->get();
//        return view('AccountStudent')-> with(['students' => $students], ['accountStudents' => $accountStudents]);
        $search = $request->input('search-stu');
        $accountStudents = Student::where('name', 'LIKE', "$search%")->get();
        return view('AccountStudent', compact( 'accountStudents'));
    }
}
