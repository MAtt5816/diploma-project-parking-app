<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), 
            ['name' => 'required|string|max:255', 
                'email' => 'required|string|email|max:255|unique:drivers', 
                'password' => 'required|string|min:8',
                'surname' => 'string',
                'city' => 'string',
                'street' => 'string',
                'house_number' => 'string',
                'postal_code' => 'string',
                'phone' => 'int',
                'login' => 'string'
            ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors());
        }
        $driver = Driver::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password),
            'surname' => $request->surname, 'city' => $request->city, 'street' => $request->street, 'house_number' => $request->house_number, 'postal_code' => $request->postal_code, 
            'phone' => $request->phone, 'login' => $request->login]);
        $token = $driver->createToken('auth_token')->plainTextToken;
        return response()->json(['data' => $driver, 'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return [ 
            'message' => 'Logged out'
        ];
    }

    public function login(Request $request) {
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
}
