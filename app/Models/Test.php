<?php 

namespace App\Models;

use Jenssegers\Mongodb\Model as Eloquent;

class Test extends Eloquent {

    protected $collection = 'democoll';

}