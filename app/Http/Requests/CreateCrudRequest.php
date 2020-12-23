<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCrudRequest extends FormRequest
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
            'title' => 'required|max:255|unique:cruds,title',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter post title.',
            'title.unique' => 'The post has already been taken.',
            'description.required' => 'Please enter post description.'
        ];
    }
}
