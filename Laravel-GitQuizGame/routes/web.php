<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home')->middleware('auth');


//show login form
Route::get('/login', [AuthManager::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthManager::class, 'login'])->middleware('guest');



//Register page route
Route::get('/register', [AuthManager::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthManager::class, 'register']);

//Logout route
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/questions',[QuestionController::class,'getQuestions'])->name('questions');

Route::get('/help', function () {
    return view('help');
})->name('help');


//route for the quix score
Route::middleware('auth')->group(function() {
    Route::post('/update-score',[AuthManager::class,'updateScore']);
    Route::get('/get-score',[AuthManager::class,'getScore']);
});