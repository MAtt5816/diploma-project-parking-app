<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Models\User;    
use App\Http\Controllers\AuthController;

class resetPassword
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
        /*
        $request->validate([
            'password' => 'required|min:8',
            'new_pass' => 'required|min:8|confirmed',
        ]);

        $uid = Session::get('user')->id;
        $user_name = Session::get('user')->login;

        $user = new UserController();
        $user = $user->show($uid);

        $request->request->add(['login' => $user_name]);

        $auth = new AuthController();
        $user2 = $auth->login($request);
        $success = false;
        $json = json_decode($user2->content());
        if($user->id == $json->{'user'}->id){
            $request->merge(['password' => $request->new_pass]);
            $request->request->add(['user_type' => $user->user_type]);
            User::whereId($uid)->update($request);
            $success = true;
        }

        if($success){
            return redirect()->route('home'); 
        }
        else{
            return back()->withErrors(['email' => [__($status)]]);
        }
        */

        $user_name = Session::get('user')->login;

        $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $request->request->add(['login' => $user_name]);

        $auth = new AuthController();
        $user = $auth->resetPassword($request);

        if(! is_null($user)){
            return redirect()->route('home'); 
        }
        else{
            return back()->withErrors(['email' => [__($status)]]);
        }

/*
        $request->validate([
            'password' => 'required',
            'new_pass' => 'required|confirmed',
        ]);

        if(!Hash::check($request->password, auth()->user()->password)){
            return back()->withErrors(["msg" => "Old Password Doesn't match!"]);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_pass)
        ]);

        return back()->with("status", "Password changed successfully!");
        */
    }
}
