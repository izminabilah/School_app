<?php

namespace App\Http\Controllers;

use App\Models\AccountStudent;
use Illuminate\Http\Request;

class AccountStudentController extends Controller
{
    //
    public function index()
    {
        //

        return view('AccountStudent');
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

        $accountStudent = new AccountStudent();
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
    public function destroy()
    {

    }
}
