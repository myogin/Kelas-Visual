<?php

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


Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer', 'HomeController@customer')->name('customer');

Route::get('/ajax/users/search', 'UserController@ajaxSearch')->name("usersSearch");
Route::resource("users", "UserController");
Route::get("/api/user", "UserController@apiuser")->name("api.user");

Route::get('/ajax/lessons/search', 'LessonController@ajaxSearch')->name("lessonsSearch");
Route::resource("lessons", "LessonController");
Route::get("/api/lesson", "LessonController@apilesson")->name("api.lesson");

Route::resource("pratices", "PraticeController");
Route::get("/api/pratice", "PraticeController@apipratice")->name("api.pratice");

Route::get("/api/less", "HomeController@apiless")->name("api.less");
