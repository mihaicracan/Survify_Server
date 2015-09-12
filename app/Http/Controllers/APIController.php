<?php

namespace App\Http\Controllers;

// use DB;
use App\Http\Controllers\Controller;

class APIController extends Controller 
{

    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index() {

    }

    public function getTest() {
    	die("API Test");
    }

    public function getAuthTest() {
    	die("API Auth Test");
    }

}