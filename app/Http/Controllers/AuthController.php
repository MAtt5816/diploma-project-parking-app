<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use App\Models\Operator;
use App\Models\Inspector;
use App\Http\Controllers\UserController;
use Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),
            ['login' => 'string',
            'password' => 'required|string|min:8',
            'user_type' => 'in:driver,operator,inspector'
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors());
        }
        $user = User::create(['login' => $request->login, 'password' => Hash::make($request->password),
            'user_type' => $request->user_type]);
        $token = $user->createToken('auth_token')->plainTextToken;

        $obj = null;
        $check = false;
        switch ($request->user_type) {
            case 'driver': {
                [$check, $obj] = $this->registerDriver($request, $user->id);
                break;
            }
            case 'operator': {
                // TODO
                break;
            }
            case 'inspector': {
                // TODO
                break;
            }
        }

        if($check){
            return response()->json(['data' => $user, 'details' => $obj, 'access_token' => $token, 'token_type' => 'Bearer', ]);
        }
        else{
            $tmp = new UserController();
            $tmp->destroy($user->id);
            return response()->json($obj);
        }
    }

    public function logout(){   // TODO
        auth()->user()->tokens()->delete();
        return [ 
            'message' => 'Logged out'
        ];
    }

    public function login(Request $request) {   // TODO
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        $driver = Driver::where('email', $fields['email'])->first(); // sprawdzenie maila
        if(!$driver || !Hash::check($fields['password'], $driver->password)){ // sprawdzenie hasła
            return response([
                'message' => 'Bad creds'
            ], 401);
        }
        $token = $driver->createToken('myapptoketn')->plainTextToken;
        $response = [
            'driver' => $driver,
            'token' => $token
        ];
        return response($response, 201);
    }

    private function registerDriver(Request $request, int $user_id) {
        $validator = Validator::make($request->all(), 
            ['name' => 'required|string|max:255', 
                'email' => 'required|string|email|max:255|unique:drivers', 
                'surname' => 'string',
                'city' => 'string',
                'street' => 'string',
                'house_number' => 'string',
                'postal_code' => 'string',
                'phone' => 'int',
                'user_id' => 'bigInteger',
            ]);
        if ($validator->fails())
        {
            return [false, response()->json($validator->errors())];
        }
        $driver = Driver::create(['name' => $request->name, 'email' => $request->email, 'surname' => $request->surname, 'city' => $request->city,
            'street' => $request->street, 'house_number' => $request->house_number, 'postal_code' => $request->postal_code, 
            'user_id' => $user_id, 'phone' => $request->phone]);
        return [true, $driver];
    }
}
