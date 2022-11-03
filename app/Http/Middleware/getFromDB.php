<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Session;

class getFromDB
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $uid = Session::get('user')->id;
        $driver = new DriverController();
        $drivers = $driver->index();
        foreach($drivers as $item){
            if($item->user_id == $uid){
                $driver_id = $item->id;
                break;
            }
        }
        $request->request->add(['driver_id' => $driver_id]);
        $vehicle = new VehicleController();
        $vehicles = $vehicle->index();
        $arr = array();
        foreach($vehicles as $item){
            array_push($arr, $item->registration_plate);
        }
        session(['cars' => $arr]);

        return $next($request);
    }
}
