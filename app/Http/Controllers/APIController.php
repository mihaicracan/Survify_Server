<?php

namespace App\Http\Controllers;

use Session;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

class APIController extends Controller 
{

    /**
     * APIController constructor.
     */
    public function __construct() 
    {
        // $this->middleware('jwt.auth');
    }

    /**
     * Retrieve authentication token.
     *
     * @param  \Request  $request
     * @return \Response
     */
    public function postLogin(Request $request)
    {   
        $token = User::login($request);

        return response(array('success' => true, 'token' => $token));
    }

    /**
     * Create a new user.
     *
     * @param  \Request  $request
     * @return \Response
     */
    public function postRegister(Request $request)
    {   
    	User::register($request);

    	return response(array('success' => true), 201);
    }

    /**
     * Invalidate current token.
     *
     * @param  \Request  $request
     * @return \Response
     */
    public function postLogout(Request $request)
    {
    	User::logout($request);
    	
        return response(array('success' => true), 201);
    }
}