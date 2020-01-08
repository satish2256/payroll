<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashAdvaneRequest extends FormRequest
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
//            'date_advance'=>'date_format:"d-m-Y"|required',
            'amount'=>'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
    function messages()
    {
        return [
            'date_advance.string'=>$this->require_message('date_advance'),
            'amount.string'=>$this->require_message('amount'),

        ];
    }
    private function require_message($field){
        return "please enter".$field;
    }
}
