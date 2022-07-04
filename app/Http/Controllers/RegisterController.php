<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            "title" => "Registrasi"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat_pelanggan' => 'required',
            'no_hp' => 'required'
        ]);

        $user = User::create([
            'nama_pelanggan' => trim($request->input('nama_pelanggan')),
            'username' => strtolower($request->input('username')),
            'password' => bcrypt($request->input('password')),
            'role' => "member",
            'alamat_pelanggan' => strtolower($request->input('alamat_pelanggan')),
            'no_hp' => ($request->input('no_hp')),
            'remember_token' => ''
        ]);
        return redirect('/login');
    }
}
