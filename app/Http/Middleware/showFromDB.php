<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\ReservationController;

class showFromDB
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
        $id = $request->route()->parameter('id');   
        $vid = $id;
        $pid = $id;     

        $driver_roles = array('vehicle','stop','reservation');
        $operator_roles = array('parking');

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
        }

        switch($role){
            case 'vehicle': {
                Session::flash('details', 'vehicle');
                break;
            }
            case 'parking': {
                Session::flash('details', 'parking');
                break;
            }
            case 'stop': {
                $stop = new StopController();
                $stop = json_decode($stop->show($id));
                if($stop->driver_id != $driver_id){
                    return back()->withErrors(['err','Zalogowano na niewłaściwe konto']);   // bad user ID
                }
                Session::flash('details', 'stop');
                Session::flash('stop', $stop);
                $vid = $stop->vehicle_id;
                $pid = $stop->parking_id;

                break;
            }
            case 'reservation': {
                $reservation = new ReservationController();
                $reservation = json_decode($reservation->show($id));
                if($reservation->driver_id != $driver_id){
                    return back()->withErrors(['err','Zalogowano na niewłaściwe konto']);   // bad user ID
                }
                Session::flash('details', 'reservation');
                Session::flash('reservation', $reservation);
                $vid = $reservation->vehicle_id;
                $pid = $reservation->parking_id;
                
                break;
            }
            default: {
                return redirect('/');
            }
        }

        if($role != 'parking'){
            $vehicle = new VehicleController();
            $vehicle = json_decode($vehicle->show($vid));
            if($role=='vehicle' && $vehicle->driver_id != $driver_id){
                return back()->withErrors(['err','Zalogowano na niewłaściwe konto']);   // bad user ID
            }
            Session::flash('vehicle', $vehicle);       
        }

        if($role != 'vehicle'){
            $parking = new ParkingController();
            $parking = json_decode($parking->show($pid));
            if($role=='parking' && $parking->operator_id != $operator_id){
                return back()->withErrors(['err','Zalogowano na niewłaściwe konto']);   // bad user ID
            }
            Session::flash('parking', $parking);    
        }

        return $next($request);
    }
}
