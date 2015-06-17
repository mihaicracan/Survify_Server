<?php

namespace App\Http\Controllers;

// use DB;
use App\Http\Controllers\Controller;
use App\Models\Test;

class TestController extends Controller {
    
    public function index() {

        $data = Test::all()->toJson();

        var_dump($data); die();
        return "Buna :)";
    }

}