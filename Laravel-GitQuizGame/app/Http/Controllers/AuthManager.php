<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    //Show login form
    public function showLoginForm(){
        return view('users.login');
    }

    //handle login request
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            // dd($request);
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email'=>'The provided credentials do not match our records.'
        ]);
    }


    //show register form
    public function showRegistrationForm(){
        return view('users.register');
    }

    //handle registration request
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5',
        ]);

        $user = User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    // Handle logout request
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
