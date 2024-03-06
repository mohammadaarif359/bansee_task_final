<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','Admin\RegisterController@showRegisterForm')->name('register.show');
Route::post('/register','Admin\RegisterController@register')->name('register');
Route::get('/login','Admin\AuthController@showLoginForm')->name('login');
Route::post('/login','Admin\AuthController@login')->name('login');
Route::get('/logout', 'Admin\AuthController@logout')->name('logout');

// after login route
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function(){
	// quiz
	Route::get('/quiz','Admin\QuizController@index')->name('quiz');
	Route::post('/quiz/score','Admin\QuizController@score')->name('quiz.score');
});
