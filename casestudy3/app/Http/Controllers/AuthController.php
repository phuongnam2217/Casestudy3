<?php

namespace App\Http\Controllers;

use App\Models\StatusConstant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('admin.account.login');
    }
    public function login(Request $request)
    {
        $user = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $credentials = $request->only('username','password');
        if (!Auth::attempt($user)) {
            Session::flash('login-error','Account Or Password Not Exactly!');
            return redirect()->route('login');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
