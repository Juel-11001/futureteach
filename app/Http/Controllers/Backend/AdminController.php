<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }
    public function login()
    {
        return view('backend.auth.login');
    }
}
