<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            "title" => "Login"
        ]);
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // $request->session()->regenerate();
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        // dd($request->all());
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == "admin") {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/produk');
            }
            // $request = $request->session()->get('key');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
