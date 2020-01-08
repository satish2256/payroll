<?php

namespace App\Http\Controllers;

use App\Models\CashAdvance;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\User;
use PDF;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $data['invoice']=Invoice::find($id);
        $data['employees']=Employee::where('status',1)
            ->pluck('name','id');
        $data['deductions']=Deduction::where('status',1)
            ->pluck('id');
        return view('backend.salary.show',compact('data'));
    }
}
