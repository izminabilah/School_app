<?php

namespace App\Http\Controllers;

use App\Models\Calendersms;
use Illuminate\Http\Request;

class CalendersmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'event' => 'required',
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
            'type_event' => 'required',
        ]);

        $calenderSms = new Calendersms();
        $calenderSms->event = $request->input('event');
        $calenderSms->from = $request->input('from');
        $calenderSms->to = $request->input('to');
        $calenderSms->description = $request->input('description');
        $calenderSms->type_event = $request->input('type_event');
        $calenderSms->save();

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
