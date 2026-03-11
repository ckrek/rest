<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }


    public function showLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {

        if(Auth::attempt($request->only('email','password')))
    {

        if(auth()->user()->role === 'admin'){
            return redirect()->route('admin.dashboard');
        }
        return redirect('/');
    }
        return back()->with('error','Неверный логин или пароль');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}