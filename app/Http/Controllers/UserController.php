<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if (!session()->has('login')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    return view('dashboard');
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

    public function loginAuth(Request $request)
{
    $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required'
    ]);

    $user = $request->only(['email', 'password']);

    if (Auth::attempt($user)) {
        return redirect()->route('dashboard')->with('success', 'Anda berhasil login!');
    } else {
        return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali dengan data yang benar!');
    }
}

public function logout()
{
    Auth::logout();
    return redirect()->route('login')->with('logout', 'Anda berhasil logout!');
}

public function login()
{
    return view('user.login');
}
}
