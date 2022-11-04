<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use App\Models\Operator;
use App\Models\Inspector;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OperatorCodeController;
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
                [$check, $obj] = $this->registerOperator($request, $user->id);
                break;
            }
            case 'inspector': {
                [$check, $obj] = $this->registerInspector($request, $user->id);
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

    public function logout(Request $request){
        if ($request->user()) { 
            auth()->user()->tokens()->delete();
            return [ 
                'message' => 'Logged out'
            ];
        }
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::where('login', $fields['login'])->first(); // sprawdzenie loginu
        if(!$user || !Hash::check($fields['password'], $user->password)){ // sprawdzenie hasła
            return response([
                'message' => 'Bad creds'
            ], 401);
        }
        $token = $user->createToken('myapptoketn')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function resetPassword(Request $request){
        $fields = $request->validate([
            'login' => 'required|string',
            'old_password' => 'required|string',
            'new_password' => 'required|string',
        ]);
        $user = User::where('login', $fields['login'])->first(); // sprawdzenie loginu
        if(!$user || !Hash::check($fields['old_password'], $user->password)){ // sprawdzenie hasła
            return response([
                'message' => 'Bad creds'
            ], 401);
        }
        else{
            $user = User::where('login', $fields['login'])->update(['password' => Hash::make($fields['new_password'])]);
            $response = [
                'user' => $user
            ];
            return response($response, 201);
        }
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

    private function registerInspector(Request $request, int $user_id) {
        $validator = Validator::make($request->all(), 
            ['operator_id' => 'int']);
        if ($validator->fails())
        {
            return [false, response()->json($validator->errors())];
        }
        $code = new OperatorCodeController();
        $inspector = Inspector::create(['operator_code' => $code->randCode(), 'operator_id' => $request->operator_id, 'user_id' => $user_id]);
        return [true, $inspector];
    }
    
    private function registerOperator(Request $request, int $user_id) {
        $validator = Validator::make($request->all(), 
        ['email' => 'required|string|email|max:255|unique:drivers', 
            'tin' => 'required|string|max:12',
            'phone' => 'int',
        ]);
        if ($validator->fails())
        {
            return [false, response()->json($validator->errors())];
        }
        $operator = Operator::create(['email' => $request->email, 'tin' => $request->tin, 'phone' => $request->phone,
            'user_id' => $user_id]);
        return [true, $operator];
    }
}
