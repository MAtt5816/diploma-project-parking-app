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

class deleteFromDB
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
        $driver_roles = array('vehicle','stop','reservation');
        $operator_roles = array('parking');

        $uid = Session::get('user')->id;
        $id = $request->route()->parameter('id');

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
                $vehicle = new VehicleController();
                $json = json_decode($vehicle->show($id));
                if($json->driver_id != $driver_id){
                    return back()->withErrors(['err','Zalogowano na niewłaściwe konto']);   // bad user ID
                }

                $request->session()->forget('cars');
                $request->session()->forget('cars_id');

                $vehicle->destroy($id);

                break;
            }
            case 'parking': {
                $parking = new ParkingController();
                $json = json_decode($parking->show($id));
                if($json->operator_id != $operator_id){
                    return back()->withErrors(['err','Zalogowano na niewłaściwe konto']);   // bad user ID
                }

                $request->session()->forget('parkings');
                $request->session()->forget('parkings_id');
                $request->session()->forget('locations');
                $request->session()->forget('total');
                $request->session()->forget('free');
                $request->session()->forget('operators');

                $parking->destroy($id);

                break;
            }
            case 'stop': {
                $stop = new StopController();
                $json = json_decode($stop->show($id));
                if($json->driver_id != $driver_id){
                    return back()->withErrors(['err','Zalogowano na niewłaściwe konto']);   // bad user ID
                }

                $request->session()->forget('stops');
                $request->session()->forget('stops_id');

                $stop->destroy($id);

                break;
            }
            case 'reservation': {
                $reservation = new ReservationController();
                $json = json_decode($reservation->show($id));
                if($json->driver_id != $driver_id){
                    return back()->withErrors(['err','Zalogowano na niewłaściwe konto']);   // bad user ID
                }

                $request->session()->forget('reservations');
                $request->session()->forget('reservations_id');

                $reservation->destroy($id);

                break;
            }
            default: {
                return redirect('/');
            }
        }


        return $next($request);
    }
}
