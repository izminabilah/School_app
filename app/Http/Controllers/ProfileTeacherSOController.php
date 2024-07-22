<?php

namespace App\Http\Controllers;

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
            return view('profileGuruSO')->with('profileTeachers', $profileTeachers);
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
//        var_dump($profileTeachers);
        return view('profileGuruSO', compact( 'profileTeachers'));
    }
}
