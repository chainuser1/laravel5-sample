<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'title'=>'required|max:250',
            'content'=>'required',
            'created_at'=>'required|date'
        ];
    }
    public function messages(){
        return [
            'title.required'=>'News title must be provided.',
            'title.max'=>'News title must be less than 251 characters.',
            'content.required'=>'Must include news content.',
            'created_at.required'=>'Must include date of article creation'
        ];
    }
}
