<?php

namespace App\Http\Controllers;

use App\Models\tu;
use Illuminate\Http\Request;

class TuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('index');
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
    public function show(tu $tu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tu $tu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tu $tu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tu $tu)
    {
        //
    }
}
