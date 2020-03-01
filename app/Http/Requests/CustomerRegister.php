<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'fname' => 'required|string',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
            'rpassword' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [

            'required' => ' :attribute can not be leave empty',
            'string' => ' :attribute should be string',
            'email' => ' :attribute should be email',
            'unique' => ' :attribute already exists',
            'same' => 'Password does not match'
        ];
    }

    public function attributes()
    {
        return [

            'fname' => 'Full Name',
            'email' => 'Email',
            'password' => 'Password',
            'rpassword' => 'Repeat Password'

        ];
    }
}
