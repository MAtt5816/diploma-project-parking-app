<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\ReservationController;
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
    public function handle(Request $request, Closure $next, $role)
    {
        if($role == 'allParkings'){
            $parking = new ParkingController();
            $parkings = $parking->index();
            $arr = array();
            $arr1 = array();
            foreach($parkings as $item){
                array_push($arr, $item->name);
                array_push($arr1, $item->id);
            }
            session(['parkings' => $arr]);
            session(['parkings_id' => $arr1]);
        }
        else{
            $driver_roles = array('cars','reservations','stops');
            $operator_roles = array('parkings');

            $uid = Session::get('user')->id;

            if(in_array($role,$driver_roles)){
                $driver = new DriverController();
                $drivers = $driver->index();
                foreach($drivers as $item){
                    if($item->user_id == $uid){
                        $driver_id = $item->id;
                        break;
                    }
                }
                $request->request->add(['driver_id' => $driver_id]);
            }
            else if(in_array($role,$operator_roles)){
                $operator = new OperatorController();
                $operators = $operator->index();
                foreach($operators as $item){
                    if($item->user_id == $uid){
                        $operator_id = $item->id;
                        break;
                    }
                }
                $request->request->add(['operator_id' => $operator_id]);
            }

            switch($role){
                case 'cars': {
                    $vehicle = new VehicleController();
                    $vehicles = $vehicle->index();
                    $arr = array();
                    $arr1 = array();
                    foreach($vehicles as $item){
                        if($item->driver_id == $driver_id){
                            array_push($arr, $item->registration_plate);
                            array_push($arr1, $item->id);    
                        }
                    }
                    session(['cars' => $arr]);
                    session(['cars_id' => $arr1]);

                    break;
                }
                case 'reservations': {
                    $reservation = new ReservationController();
                    $reservations = $reservation->index();
                    $arr = array();
                    foreach($reservations as $item){
                        if($item->driver_id == $driver_id){
                            array_push($arr, $item->start_date);
                        }
                    }
                    session(['reservations' => $arr]);

                    break;
                }
                case 'stops': {
                    $stop = new StopController();
                    $stops = $stop->index();
                    $arr = array();
                    foreach($stops as $item){
                        if($item->driver_id == $driver_id){
                            array_push($arr, $item->start_date);
                        }
                    }
                    session(['stops' => $arr]);

                    break;
                }
                case 'parkings': {
                    $parking = new ParkingController();
                    $parkings = $parking->index();
                    $arr = array();
                    foreach($parkings as $item){
                        if($item->operator_id == $operator_id){
                            array_push($arr, $item->name);
                        }
                    }
                    session(['parkings' => $arr]);

                    break;
                }
                default:
                    return redirect('/');
            }
        }
        
        return $next($request);
    }
}
