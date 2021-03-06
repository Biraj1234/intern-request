<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'position' => 'required|unique:posts',
            'status' => 'required',
            'image_file' => 'required',
            'position' => 'required|unique:posts',
            'category_id' => 'required'
        ];
    }
    public function messages()
    {

        return [
            'image_file.required' => "Please choose a picture.",
            'category_id.required' => "Please select a category.",
        ];
    }
}
