<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use Illuminate\Http\Request;

class ListClassController extends Controller
{
    //
    public function index()
    {
        //
        if(session()->exists('username')){
            $classs = ClassStudent::all();
            return view('ListClass', ['classs' => $classs]);
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
        ]);
        $classs = new ClassStudent();
        $classs->name = $request->input('name');
        $classs->save();

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
        $classs = ClassStudent::findOrFail($id);
        return view('ListClassEdit')-> with(['classs' =>  $classs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $classs = ClassStudent::find($id);
        $classs->name = $request->input('name');
        $classs->save();
        return redirect()->route('listClass');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $classs = ClassStudent::whereId($id) -> delete();
        return redirect()->back()->with('success', 'Subject data has been deleted successfully!');
    }
}
