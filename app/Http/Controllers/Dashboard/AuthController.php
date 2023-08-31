<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request)
    {
        return (Auth::guard('dashboard')->attempt($request->only('email', 'password')))? 
            redirect()->route('dashboard'): redirect()->back();
    }
}
