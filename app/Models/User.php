<?php 

namespace App\Models;

use Jenssegers\Mongodb\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

use Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

	use Authenticatable, CanResetPassword, SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $collection = 'users';

    public static function login($request) 
    {
    	$email    = $request->input("email");
    	$password = $request->input("password");
    	$remember = $request->input("remember");

    	if ($token = JWTAuth::attempt(['email' => $email, 'password' => $password])) {
            echo $token;
    	    return true;
    	}
    	
    	return false;
    }

    public static function register($request)
    {
    	$user = new User;
    	$user->first_name = $request->input("first_name");
    	$user->last_name  = $request->input("last_name");
    	$user->email      = $request->input("email");
    	$user->password   = bcrypt($request->input("password"));

    	$user->save();
    }

    public static function logout($request)
    {
    	JWTAuth::invalidate(JWTAuth::getToken());
    }

}