<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MyRule;

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
            'msg' => 'required',
            'name' => 'required',
            'mail' => 'email',
            'age' => ['numeric', new MyRule(5)],
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
