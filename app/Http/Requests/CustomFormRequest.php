<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CustomFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(failure_response($this->flatten($errors)), '200');
    }
    private function flatten($errors)
    {
        $response = [];
        foreach($errors as $key => $error)
        {
            $response[$key] = $error[0];
        }
        return array_unique($response);
    }
}
