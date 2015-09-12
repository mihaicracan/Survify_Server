<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function getLogin(){

        return view("auth.login");
    }


    public function postLogin(Request $request){

        $email = $request->input("email");
        $password = $request->input("password");
        $remember = $request->input("remember");

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect("test");
        } else {
            die("invalid login");
        }
    }


    public function getRegister(){

        return view("auth.register");
    }


    public function postRegister(Request $request){

        $user = new User;
        $user->first_name = $request->input("first_name");
        $user->last_name  = $request->input("last_name");
        $user->email      = $request->input("email");
        $user->password   = bcrypt($request->input("password"));

        $user->save();

        return redirect("login");
    }

    public function getLogout(Request $request){
        Auth::logout();
        return redirect("login");
    }
}