<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'hello') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|hello',
            'url' => 'active_url',
            'alpha' => 'alpha-num',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name!!',
            'mail.email' => 'email!!',
            'age.numeric' => 'numeric!!',
            'age.hello' => '%2!!',
            'url.active_url' => 'active_url!!',
            'alpha.alpha_num' => 'alpha-num!!',
        ];
    }
}
