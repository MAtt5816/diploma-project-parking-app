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
use Illuminate\Support\Carbon;

class updateDB
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
        $driver_roles = array('vehicle','reservation');
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
            case 'vehicle': {
                // $vehicle = new VehicleController();
                // $vehicle = $vehicle->store($request);

                break;
            }
            case 'parking': {
                // $parking = new ParkingController();
                // $parking = $parking->store($request);

                break;
            }
            case 'stop': {
                Session::reflash();
                $request->merge(['start_date' => Carbon::parse(Session::get('stop')->start_date)->format('Y-m-d H:i:s')]);
                $request->merge(['end_date' => Carbon::now()->format('Y-m-d H:i:s')]);
                $request->merge(['driver_id' => Session::get('stop')->driver_id]);
                $request->merge(['vehicle_id' => Session::get('stop')->vehicle_id]);
                $request->merge(['parking_id' => Session::get('stop')->parking_id]);
                $stop = new StopController();
                $stop->update($request, Session::get('stop')->id);

                break;
            }
            case 'reservation': {
                // $request->merge(['start_date' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s')]);
                // $request->merge(['end_date' => Carbon::parse($request->end_date)->format('Y-m-d H:i:s')]);
                // $reservation = new ReservationController();
                // $reservation->store($request);

                break;
            }
            default: {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
