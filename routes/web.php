<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

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
})->name('loginForm');

Route::post('/login', function(Request $request) {
    $auth = new AuthController();
    $response = $auth->login($request);
    $json = json_decode($response->content());
    if($response->status() == 201){
        $request->session()->put('user', $json->{'user'});
        $request->session()->put('token', $json->{'token'});
        return redirect('/');
    }
    else{
        return redirect()->back();   // TODO bad password
    }
});

});

});

});

Route::get('/logout', function() {
    Session::flush();
    return view('logout');
});



Route::group(['middleware' => 'sessionCheck'], function() {
    
    Route::get('/add_parking', function() {
        return view('dodaj_parking');
    });
    
    Route::get('/vehicle', function() {
        return view('pojazd');
    });
    
    Route::get('/vehicles', function() {
        return view('pojazdy');
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
    
    Route::get('/settings', function() {
        return view('ustawienia');
    });
    
    Route::get('/reservation', function() {
        return view('rezerwacja');
    });
    
    Route::get('/reservations', function() {
        return view('rezerwacje');
    });
    
    Route::get('/stop', function() {
        return view('postoj');
    });
    
    Route::get('/stops', function() {
        return view('postoje');
    });
    
    Route::get('/parkings', function() {
        return view('parkingi');
    });
});