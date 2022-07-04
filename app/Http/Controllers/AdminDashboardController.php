<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // dd(auth::check());
        return view('admin.index', [
            "title" => "Admin Dashboard"
        ]);
    }
}
