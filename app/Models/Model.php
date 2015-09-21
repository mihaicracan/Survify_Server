<?php 

namespace App\Models;

use Jenssegers\Mongodb\Model as Eloquent;
use Illuminate\Validation\Validator;
use Laravel\Lumen\Routing\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Model extends Eloquent
{   

    use ValidatesRequests;

    /**
     * Custom validation messages for API errors status.
     *
     * @var array
     */
    private $messages = array(
        'required'    => 'required :attribute'
    );

    /**
     * Validate the given request with the given rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return void
     */
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {   
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $this->messages, $customAttributes);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
    }

    /**
     * Format the validation errors to be returned.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return array
     */
    protected function formatValidationErrors(Validator $validator)
    {   
        $errors = $validator->errors()->all();
        $result = array();

        foreach ($errors as $error) {
            $result[] = Str::camel($error);
        }

        return $result;
    }
}