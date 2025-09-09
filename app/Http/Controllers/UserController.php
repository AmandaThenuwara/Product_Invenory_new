<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.dashboard');
        } elseif (Auth::check() && Auth::user()->role === 'staff') {
            return view('dashboard');
        } else {
            return redirect('/')->back(); // Redirect to home or some other page if not authorized
        }
    }
}
