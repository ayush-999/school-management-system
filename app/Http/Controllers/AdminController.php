<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function Dashboard()
    {
        $user = Auth::user();
        return view('admin.index', compact('user'));
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}
