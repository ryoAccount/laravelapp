<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator {
    public function validateHello($attr, $value, $param) {
        return $value % 2 === 0;
    }
}