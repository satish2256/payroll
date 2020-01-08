<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeductionRequest extends FormRequest
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
            'pagibig'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'philhealth'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'projectissues'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'sss'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'total_deduction'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
    function messages()
    {
        return [
            'pagibig.string'=>$this->require_message('pagibig'),
            'philhealth.string'=>$this->require_message('philhealth'),
            'projectissues.string'=>$this->require_message('projectissues'),
            'sss.string'=>$this->require_message('sss'),
            'total_deduction.string'=>$this->require_message('total_amount'),

        ];
    }
    private function require_message($field){
        return "please enter".$field;
    }
}
