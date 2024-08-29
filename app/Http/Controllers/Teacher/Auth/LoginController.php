<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('teacher.auth.login');
    }

    public function login_auth(Request $request)
    {
        $credentials = [
            'email_address' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::guard('teacher')->attempt($credentials)) {
            return redirect()->route('teacher.dashboard');
        }
    
        return 'Failure';
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
    }
}
