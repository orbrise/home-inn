<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Checkout extends FormRequest
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
            
            'first_name' => 'required|alpha',
            'address' => 'required|string',
            'town' => 'required|string',
            //'country' =>  'required|string',
           'email' => 'nullable|email',
            'phone' => 'required|numeric',
        ];

    }

    public function messages()
    {
        return [

            'required' => ' :attribute can not be leave empty',
            'alpha' => ' :attribute should be string',
            'email' => ' :attribute should be email',
            'numeric' => ' :attribute should be number only',
            
        ];
    }

    public function attributes()
    {
        return [

            'first_name' => 'Full Name',
            'address' => 'Address',
            'town' => 'City',
            'country' =>  'Country',
            'email' => 'Email',
            'phone' => 'Phone Number'

        ];
    }
}
