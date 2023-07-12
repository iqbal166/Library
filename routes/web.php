<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

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

Route::get('/', function () {
    return view('welcome');
});

//library

Route::get('/library',  'App\Http\Controllers\LibraryController@index');

Route::get('/library/create',  'App\Http\Controllers\LibraryController@create');

Route::post('/library/store',  'App\Http\Controllers\LibraryController@store');

Route::get('/library/edit/{id}',  'App\Http\Controllers\LibraryController@edit');

Route::post('/library/update',  'App\Http\Controllers\LibraryController@update');

Route::get('/library/destroy/{id}',  'App\Http\Controllers\LibraryController@destroy');

Route::get('/library/search',  'App\Http\Controllers\LibraryController@search');

//Users
Route::get('/users',  'App\Http\Controllers\UserController@index');

Route::get('/users/create',  'App\Http\Controllers\UserController@create');

Route::post('/users/store',  'App\Http\Controllers\UserController@store');

Route::get('/users/edit/{id}',  'App\Http\Controllers\UserController@edit');

Route::post('/users/update',  'App\Http\Controllers\UserController@update');

Route::get('/users/destroy/{id}',  'App\Http\Controllers\UserController@destroy');

//Route::get('/users/search',  'App\Http\Controllers\UserController@search');

//Login
Route::get('/login', 'App\Http\Controllers\LoginController@index');

Route::get('/login/register', 'App\Http\Controllers\LoginController@register');

Route::post('/login/store',  'App\Http\Controllers\LoginController@store');

Route::get('/login/logout', 'App\Http\Controllers\LoginController@logout');

Route::post('/login/login', 'App\Http\Controllers\LoginController@login');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');



Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);

})->middleware('guest')->name('password.update');
