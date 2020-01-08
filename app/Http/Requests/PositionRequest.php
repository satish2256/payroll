<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            'name'=>'required|string|max:191',
        ];
    }
    function messages()
    {
        return [
            'name.required'=>$this->require_message('name'),
            'amount.required'=>$this->require_message('amount'),
        ];
    }
    private function require_message($field){
        return "please enter".$field;
    }
}
