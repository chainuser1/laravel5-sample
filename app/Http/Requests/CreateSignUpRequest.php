<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSignUpRequest extends FormRequest
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
            'fname'=>'required|between:2,25|alpha',
            'lname'=>'required|between:2,75|alpha',
            'email'=>'required|email|unique:tblprofiles',
            'uname'=>'required|unique:tblusers,username|unique:tblprofiles,username|between:8,25|alpha_num',
            'pword'=>'required|between:12,50',
            'confirm_pword'=>'required|same:pword',
            'birthday'=>'required|date',
            'sex'=>'required|alpha'
        ];
    }
    /**
     * Get the error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
                'fname.required'=>' First Name is required.',
                'fname.between'=>'First Name must be at least 2 letters and not exceeding 25.',
                'fname.alpha'=>'Must compose of letters only.',
                'lname.required'=>' Last Name is required.',
                'lname.between'=>'Lastt Name must be at least 2 letters and not exceeding 75.',
                'lname.alpha'=>'Must compose of letters only.',
                'uname.required'=>'Username is required.',
                'uname.unique'=>'This username is already taken.',
                'uname.between'=>'Username must be at least 8 to 25 characters.',
                'uname.alpha_num'=>'Username should contain letters and numbers only.',
                'pword.required'=>'Password is required.',
                'pword.between'=>'Password must be at least 12 to 50 characters.',
                'confirm_pword.required'=>'Please confirm your password.',
                'confirm_pword.same'=>'Password didn\'t matched.'
            ];
    }

    /**
     * Validate the given class instance.
     *
     * @return void
     */

}
