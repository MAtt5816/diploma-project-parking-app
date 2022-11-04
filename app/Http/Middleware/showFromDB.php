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

        // TODO temp json showing now
        switch($role){
            case 'vehicle': {
                $vehicle = new VehicleController();
                $vehicle = $vehicle->show($id);
                return response()->json($vehicle);

                break;
            }
            case 'parking': {
                $parking = new ParkingController();
                $parking = $parking->show($id);
                return response()->json($parking);

                break;
            }
            case 'stop': {
                $stop = new StopController();
                $stop = $stop->show($id);
                return response()->json($stop);

                break;
            }
            case 'reservation': {
                $reservation = new ReservationController();
                $reservation = $reservation->show($id);
                return response()->json($reservation);

                break;
            }
            default: {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
