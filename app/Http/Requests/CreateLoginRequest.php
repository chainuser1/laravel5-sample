<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoginRequest extends FormRequest
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
            'uname'=>'required',
            'pword'=>'required'
        ];
    }
    public function messages(){
        return [
            'uname.required' => 'Er, you forgot your username!',
            'pword.required' => 'Er, you forgot your password!',
        ];
    }


    /**
     * Validate the given class instance.
     *
     * @return void
     */

}
