<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
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

        // dd(request()->user);
        $rules = [
            'name' => 'required|regex:/^[a-zA-Z ]+$/u',
            'email' => 'required|unique:users',
            'age' => 'required',
            'bio' => 'required',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',
            'profile' => 'required'

        ];

        if (request()->user !== null) {
            $rules = array_merge(
                $rules,
                [
                    'email' => 'required|unique:users,email,' . request()->user,
                ]
            );
        }
        return $rules;
    }


    public function messages()
    {
        return ['cpassword.required' => "The confirm password field is required."];
        return ['cpassword.same' => "Your password and confirm password didn't match."];
        return ['profile.required' => "Please choose your profile picture."];
    }
}
