<?php

namespace App\Http\Requests\App;

use App\Http\Requests\Request;

class CreateNewsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|max=250',
            'content'=>'required'
        ];
    }
    public function messages(){
        return [
            'title.required'=>'News title must be provided.',
            'title.max'=>'News title must be less than 251 characters.',
            'content.required'=>'Must include news content.'
        ];
    }
}
