<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // * Збори коштів
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // * Фонди
    Route::get('/funds', 'App\Http\Controllers\FundController@fundsView')->name('funds');
    Route::get('/fund/{id}', 'App\Http\Controllers\FundController@fundView')->name('fund');

    // * Збори коштів
    Route::get('/fundraisings', 'App\Http\Controllers\FundraisingController@fundraisingsView')->name('fundraisings');
    
    // TODO Профіль користувача з відкритим статусом || Доробити перевірку на статус профілю ( відкритий та закритий, якщо закритий - не показувати сторінку ) 
    Route::get('/profile/{id}', 'App\Http\Controllers\AppController@user_public_profile_page')->name('user_public_profile_page');
    
    // * Повідомлення
    Route::post('/profile/{id}', 'App\Http\Controllers\AppController@chat_send_message')->name('chat_send_message');

    // * Пошук
    Route::get('/search', function () {
        return view('search');
    })->name('search');

    Route::get('/admin', function() {
        return view('admin.index');
    })->name('admin');
});
