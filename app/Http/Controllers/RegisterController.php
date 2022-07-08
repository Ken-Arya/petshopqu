<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

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
            'nama_pelanggan' => 'required|max:65',
            'username' => 'required|unique:tabel_pelanggan|max:25',
            'password' => 'required|max:255',
            'alamat_pelanggan' => 'required|max:255',
            'no_hp' => 'required|max:12'
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
