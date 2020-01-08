<?php

namespace App\Http\Controllers;

use App\Models\CashAdvance;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\User;
use PDF;

class UserController extends Controller
{

    public function index(Request $request) {
        $users = User::all();
        $data['employees']= Employee::all();
        $data['deductions']= Deduction::all();
        $data['salaries']= Salary::all();
        $data['cashadvances']= CashAdvance::all();
        return view('users.index',compact('data'));
    }

    public function report(Request $request,$id)
    {
        $users = User::all();
        $data['employees']=Employee::where('status',1)
            ->pluck('name','id');
        $data['deductions']= Deduction::all();
        $data['salaries']= Salary::find($id);
        $data['cashadvances']=CashAdvance::where('status',1)
            ->pluck('id');
//        dd($data['salaries']);
        return view('users.report',compact('data'));
//        if($request->view_type === 'download') {
//            $pdf = PDF::loadView('users.report', ['users' => $users]);
//            return $pdf->download('users.pdf');
//        } else {
//            $view = View('users.report', ['users' => $users]);
//            $pdf = \App::make('dompdf.wrapper');
//            $pdf->loadHTML($view->render());
//            return $pdf->stream();
//        }

    }
}
