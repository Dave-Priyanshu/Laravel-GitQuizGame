<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('users.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->quiz_score = 0; // Reset score for new session
            $user->save();

            // Initialize the quiz state for the new user session
            $request->session()->put('userScore', $user->quiz_score);
            $request->session()->put('currentQuestionIndex', 0);

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    // Show register form
    public function showRegistrationForm()
    {
        return view('users.register');
    }

    // Handle registration request
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        // Initialize the quiz state for the new user session
        $request->session()->put('userScore', 0);
        $request->session()->put('currentQuestionIndex', 0);

        return redirect('/');
    }

    // Handle logout request
    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            // Update the user's score in the database
            $user->quiz_score = $request->session()->get('userScore', 0);
            $user->save();
        }

        // Clear session data
        $request->session()->forget('userScore');
        $request->session()->forget('currentQuestionIndex');

        Auth::logout();
        return redirect('/');
    }

    // Update user's quiz score
    public function updateScore(Request $request)
{
    $request->validate([
        'score' => 'required|integer|min:0',
    ]);

    $user = Auth::user();
    if ($user) {
        $user->quiz_score = $request->input('score');
        $user->save();
        return response()->json(['message' => 'Score updated successfully']);
    }

    return response()->json(['message' => 'User not authenticated'], 401);
}


    // Get the user's quiz score
    public function getScore()
    {
        $user = Auth::user();
        return response()->json(['score' => $user->quiz_score]);
    }
}
