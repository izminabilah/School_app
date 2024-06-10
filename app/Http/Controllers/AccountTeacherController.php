<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class AccountTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accountTeachers = Teacher::all();
        return view('AccountTeacher')->with('accountTeachers', $accountTeachers);
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

        $accountTeacher = new Teacher();
        $accountTeacher->name = $request->input('name');
        $accountTeacher->username = $request->input('username');
        $accountTeacher->password = $request->input('password');
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
        $accountTeachers = Teacher::findOrFail($id);
        return view('editFormAccTeac')-> with(['accountTeachers' => $accountTeachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $accountTeachers = Teacher::findOrFail($id);
        $accountTeachers->name = $request->input('name');
        $accountTeachers->username = $request->input('username');
        $accountTeachers->password = $request->input('password');
        $accountTeachers->save();
        return redirect()->route('account-teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accountTeacher = Teacher::whereId($id) -> delete();
        return redirect()->back()->with('success', 'Teacher data has been deleted successfully!');
    }
    public function search(Request $request){
//        $teachers = DB::table('teachers')->where('name', 'LIKE', "$search%")->get();
//        return view('AccountTeacher')-> with(['teachers' => $teachers], ['accountTeachers' => $accountTeachers]);
        $search = $request->input('search-tea');
        $accountTeachers = Teacher::where('name', 'LIKE', "$search%")->get();
        return view('AccountTeacher', compact( 'accountTeachers'));
    }
}
