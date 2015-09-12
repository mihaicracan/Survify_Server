<?php 

namespace App;

use Jenssegers\Mongodb\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

	use Authenticatable, CanResetPassword, SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $collection = 'users';

}