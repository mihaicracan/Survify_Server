<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class APIController extends Controller 
{

    public function __construct() 
    {
        // $this->middleware('jwt.auth');
    }

    public function postLogin(Request $request)
    {
    	if (User::login($request)) {
    	    die("success");
    	} else {
    	    die("invalid login");
    	}
    }

    public function postRegister(Request $request)
    {
    	User::register($request);

    	die("created");
    }

    public function postLogout(Request $request)
    {
    	User::logout($request);
    	die("logged out");
    }

    public function getAuthTest(){
    	die("merge");
    }
}