<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');
Route::get('registration',[AuthManager::class, 'registration'])->name('registration');
Route::post('registration',[AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/questions',[QuestionController::class,'getQuestions'])->name('questions');

Route::get('/help', function () {
    return view('help');
})->name('help');