<?php

namespace App\Http\Controllers;

use App\Models\Calendersms;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CalendersmsGOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(session()->exists('username')){
            $events = Calendersms::all();
            $username = session('username');
            $teacher = Teacher::where('username', $username)->first();
            $data = $teacher->name;
            $status = $data ? 'guru' : null;
            return view('CalenderSemesterGO', compact('events', 'data', 'status'));
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
