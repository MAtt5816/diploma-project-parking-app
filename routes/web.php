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
})->name('home')->middleware('getFromDB:allParkings');

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

Route::get('/signup', function() {
    return view('signup');
});

Route::post('/signup', function(Request $request) {
    if($request->has('user')){
        switch($request->get('user')){
            case 'kierowca':
                return view('user/signup_k');
            case 'operator':
                return view('user/signup_o');
        }
    }
    return redirect()->back();
});

Route::get('/signup_driver', function() {
    return view('user/signup_k');
});

Route::post('/signup_driver', function() {
    return redirect('/');
})->middleware('registerUser:driver');

Route::get('/signup_operator', function() {
    return view('user/signup_o');
});

Route::post('/signup_operator', function() {
    return redirect('/');
})->middleware('registerUser:driver');

Route::get('/logout', function() {
    Session::flush();
    return view('logout');
});


Route::group(['middleware' => 'sessionCheck:all'], function() {
    
    Route::get('/change_password', function() {
        return view('zmiana_hasla');
    });
    
    Route::get('/settings', function() {
        return view('ustawienia');
    });
    
    Route::post('/change_password', function() {
        return view('zmiana_hasla');
    })->middleware('resetPassword');
});


Route::group(['middleware' => 'sessionCheck:driver'], function() {
    
    Route::get('/vehicle', function() {
        return view('pojazd');
    });
    
    Route::get('/vehicles', function() {
        return view('pojazdy');
    })->middleware('getFromDB:cars');
    
    Route::get('/reservation', function() {
        return view('rezerwacja');
    })->middleware(['getFromDB:cars','getFromDB:allParkings']);
    
    Route::get('/reservations', function() {
        return view('rezerwacje');
    })->middleware('getFromDB:reservations');

    
    Route::get('/stop', function() {
        return view('postoj');
    })->middleware(['getFromDB:cars','getFromDB:allParkings']);
    
    Route::get('/stops', function() {
        return view('postoje');
    })->middleware('getFromDB:stops');

    Route::group([], function() {
        Route::post('/vehicle', function() {
            return redirect('/');
        })->middleware('addToDB:vehicle');

        Route::post('/stop', function() {
            return redirect('/');
        })->middleware('addToDB:stop');

        Route::post('/reservation', function() {
            return redirect('/');
        })->middleware('addToDB:reservation');
    });

    Route::get('/delete_stop/{id}', function($id){
        return redirect('/stops');
    })->middleware('deleteFromDB:stop');

    Route::get('/delete_reservation/{id}', function() {
        return redirect('/reservations');
    })->middleware('deleteFromDB:reservation');

    Route::get('/delete_vehicle/{id}', function() {
        return redirect('/vehicles');
    })->middleware('deleteFromDB:vehicle');

    Route::get('/show_reservation/{id}', function() {
        return redirect('/reservations');
    })->middleware('showFromDB:reservation');

    Route::get('/show_vehicle/{id}', function() {
        return redirect('/vehicles');
    })->middleware('showFromDB:vehicle');

    Route::get('/show_stop/{id}', function($id){
        return redirect('/stops');
    })->middleware('showFromDB:stop');

    Route::get('/info_stop/{id}', function($id){
        return redirect('/stops');
    })->middleware(['showFromDB:stop', 'stopInfo']);

    Route::get('/end_stop/{id}', function(){
        return redirect('/stops');
    })->middleware(['showFromDB:stop','updateDB:stop']);
});

Route::group(['middleware' => 'sessionCheck:operator'], function() {

    Route::get('/add_parking', function() {
        return view('dodaj_parking');
    });

    Route::get('/add_inspector', function() {
        return view('user/dodanie_kontrolera');
    });

    Route::get('/parkings', function() {
        return view('parkingi');
    })->middleware('getFromDB:parkings');

    Route::group(['middleware' => 'addToDB:parking'], function() {
        Route::post('/add_parking', function() {
            return redirect('/');
        });
    });

    Route::get('/delete_parking/{id}', function() {
        return redirect('/parkings');
    })->middleware('deleteFromDB:parking');

    Route::get('/show_parking/{id}', function() {
        return redirect('/parkings');
    })->middleware('showFromDB:parking');
});

Route::group(['middleware' => 'sessionCheck:inspector'], function() {

    Route::get('/verify', function() {
        return view('weryfikator');
    });
});