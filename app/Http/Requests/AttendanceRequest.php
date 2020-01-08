<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
//                'date'=>'date_format:"m-d-Y"|required',
            'timein' => 'date_format:H:i',
//            'timeout' => 'date_format:H:i|after:time_start',
        ];
    }
    function messages()
    {
        return [
            'date.string'=>$this->require_message('date'),
            'timein.string'=>$this->require_message('timein'),
            'timeout.string'=>$this->require_message('timeout'),

        ];
    }
    private function require_message($field){
        return "please enter".$field;
    }
}
