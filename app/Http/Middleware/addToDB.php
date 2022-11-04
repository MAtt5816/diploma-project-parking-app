<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Session;

class addToDB
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
        $uid = Session::get('user')->id;

        switch($role){
            case 'vehicle': {
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
                $vehicle = $vehicle->store($request);

                break;
            }
            case 'parking': {
                $operator = new OperatorController();
                $operators = $operator->index();
                foreach($operators as $item){
                    if($item->user_id == $uid){
                        $operator_id = $item->id;
                        break;
                    }
                }
                $request->request->add(['operator_id' => $operator_id]);
                $parking = new ParkingController();
                $parking = $parking->store($request);
                
                break;
            }
            default: {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
