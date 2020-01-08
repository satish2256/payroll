<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
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
            'medical_allowance'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'dearness_allowance'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'travelling_allowance'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'house_rent_allowance'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'bonus'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'basic'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'total_amount'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
    function messages()
    {
        return [
            'medical_allowance.required'=>$this->require_message('medical_allowance'),
            'dearness_allowance.required'=>$this->require_message('dearness_allowance'),
            'travelling_allowance.required'=>$this->require_message('travelling_allowance'),
            'house_rent_allowance.string'=>$this->require_message('house_rent_allowance'),
            'bonus.string'=>$this->require_message('bonus'),
            'basic.string'=>$this->require_message('basic'),
        ];
    }
    private function require_message($field){
        return "please enter".$field;
    }
}
