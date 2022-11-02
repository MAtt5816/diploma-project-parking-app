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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/docs', function() {
    return redirect()->away('https://documenter.getpostman.com/view/20222408/2s84LLxCSL');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/logout', function() {
    return view('logout');
});

Route::get('/add_parking', function() {
    return view('dodaj_parking');
});

Route::get('/vehicle', function() {
    return view('pojazd');
});

Route::get('/add_inspector', function() {
    return view('user/dodanie_kontrolera');
});

Route::get('/verify', function() {
    return view('weryfikator');
});

Route::get('/change_password', function() {
    return view('zmiana_hasla');
});