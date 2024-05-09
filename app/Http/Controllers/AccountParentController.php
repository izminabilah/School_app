<?php

namespace App\Http\Controllers;
use App\Models\StudentParent;
use Illuminate\Http\Request;

class AccountParentController extends Controller
{
    //
    public function index()
    {
        //
        $accountParent = StudentParent::all();
        return view('AccountParent')->with('accountParents', $accountParent);
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
//        var_dump('haloo');
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $accountParent = new StudentParent();
        $accountParent->name = $request->input('name');
        $accountParent->username = $request->input('username');;
        $accountParent->password = $request->input('password');;
        $accountParent->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Parent data has been saved successfully!');
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

    }

    public function search(Request $request){

    }
}
