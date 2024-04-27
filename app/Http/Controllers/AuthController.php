<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view("login.login");
    }

    public function auth(AuthRequest $request)
    {
        $credentials = $request->validated();
        $remember = $request->has("remember");
        if (Auth::attempt(["email" => $credentials["email"], "password" => $credentials["password"]], $remember)) {
            return redirect()->intended("dashboard");
        } else {
            return redirect()->route("login")->with("errors", "Email Or Password Is Incorrect");
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route("login");
    }
}
