<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name'=>'required|string|max:191',
            'phone'=>'required|regex:/[0-9]{10}/',
            'address'=>'required|string',
            'email'=>'required|email|unique:users',
            'username'=>'required',
            'password'=>'required|min:8',
        ];
    }
    function messages()
    {
        return [
            'name.required'=>$this->require_message('name'),
            'phone.required'=>$this->require_message('phone'),
            'address.required'=>$this->require_message('address'),
            'email.required'=>$this->require_message('email'),
            'username.required'=>'Please enter username',
            'password.required'=>'Please enter Password',
            'name.string'=>'Name must be String',
            'address.string'=>'Address must be String',
        ];
    }
    private function require_message($field){
        return "please enter".$field;
    }
}
