<?php 

namespace App\Models;

use Exception;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

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

    /**
     * Authenticate user.
     *
     * @param  \Request  $request
     * @return string
     */
    public static function login($request) 
    {
        $user = new User;

        $user->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

    	if ($token = JWTAuth::attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            return $token;
    	}
    	
    	throw new Exception("invalidCredentials", 401);
    }

    /**
     * Register user.
     *
     * @param  \Request  $request
     * @return void
     */
    public static function register($request)
    {   
    	$user = new User;

        $user->validate($request, [
            'firstName' => 'required|max:255',
            'lastName'  => 'required|max:255',
            'email'     => 'required|email|unique:users,email|max:255',
            'password'  => 'required|max:255'
        ]);

    	$user->first_name = $request->input("firstName");
    	$user->last_name  = $request->input("lastName");
    	$user->email      = $request->input("email");
    	$user->password   = bcrypt($request->input("password"));

    	$user->save();
    }

    /**
     * Invalidate user token.
     *
     * @param  \Request  $request
     * @return void
     */
    public static function logout($request)
    {
    	JWTAuth::invalidate(JWTAuth::getToken());
    }

    /**
     * Get authenticated user.
     *
     * @param  \Request  $request
     * @return \App\Models\User
     */
    public static function getAuthenticated($request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        return $user;
    }

}