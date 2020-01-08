<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name'=>'required|string|unique:departments'.(request()->method()=="POST" ? '' : ',name,'.$this->id),
            'email'=>'required|email|unique:users',
            'phone'=>'required|regex:/[0-9]{9}/',
            'head_of_department'=>'string|max:191',
            'description'=>'string|max:191'
        ];
    }
    function messages()
    {
        return [
            'name.required'=>$this->require_message('name'),
            'email.required'=>$this->require_message('email'),
            'phone.required'=>$this->require_message('phone'),
            'head_of_depart.string'=>$this->require_message('head_of_department'),
            'description.string'=>$this->require_message('description'),
            'name.unique'=>'Name is already taken',
        ];
    }
    private function require_message($field){
        return "please enter".$field;
    }
}
