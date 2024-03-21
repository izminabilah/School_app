<?php

namespace App\Http\Controllers;
use App\Models\tu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.login-tu');
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
        //validasi username requeire, password required
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // get data tu berdasarkan username dan password
        $username = $request->input('username');
        $password = $request->input('password');

        if($tu = tu::where('username', $username)
            ->where('password', $password)
            ->first()){
            return redirect()->route('home');
        }else {
            //kalau ga ada di redirect lagi ke halaman login dengan error user not found
            return redirect()->route('sign-in')->with('error', 'Invalid username or password, Masukkan kembali username dan password');
        }
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

