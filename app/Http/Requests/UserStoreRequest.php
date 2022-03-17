<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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


    public function rules()
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z ]+$/u',
            'email' => 'required|unique:users',
            'age' => 'required',
            'bio' => 'required',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',

        ];
    }
    public function messages()
    {
        return ['cpassword.required' => "The confirm password field is required."];
        return ['cpassword.same' => "Your password and confirm password didn't match."];
    }
}
