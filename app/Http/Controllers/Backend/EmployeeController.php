<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\EmployeeRequest;
use App\Models\CashAdvance;
use App\Models\Deduction;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees']= Employee::paginate(10);
        $data['employees']= Employee::orderBy('created_at', 'DESC')->get();
        $data['departments']= Department::all();
        $data['positions']= Position::all();
        return view('backend.employee.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments']=Department::where('status',1)
            ->pluck('name','id');
        $data['positions']=Position::where('status',1)
            ->pluck('name','id');
        return view('backend.employee.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $pass = $request->input('password');
        $request->request->add(['password' => Hash::make($pass)]);
//        $id= Employee::create($request->all());

        $request->request->add(['created_by'=>Auth::user()->id]);

        $id= Employee::create($request->all());
        if($id){
            $request->session()->flash('success_message','Employee Created Successfully!');

            return redirect()->route('employee.index');
        }else{
            $request->session()->flash('error_message','Employee Created Failed!');
            return redirect()->route('employee.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['employee']=Employee::find($id);
        return view('backend.employee.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get employee by id
        $data['employee']=Employee::find($id);
        $data['departments']=Department::where('status',1)
            ->pluck('name','id');
        $data['positions']=Position::where('status',1)
            ->pluck('name','id');

        //dd($data);
        return view('backend.employee.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {

        $employee = Employee::find($id);
        //add Updated_by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status =$employee->update($request->all());
        if($status){
            $request->session()->flash('success_message','Employee Updated Successfully!');
        }else{
            $request->session()->flash('error_message','Employee Updated Failed!');
        }
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //get employee by id
        $employee= Employee::find($id);
        //delete
        if($employee->delete()){
            $request->session()->flash('success_message','Employee Delete Successfully!');
        }else{
            $request->session()->flash('error_message','Employee Delete Failed!');
        }
        return redirect()->route('employee.index');
    }
    function cashadvance(Request $request){
        $employee = CashAdvance::where('employee_id','=',$request->input('employee_id'))
            ->first();
        return $employee->amount;
    }
    function deduction(Request $request){
        $employee = Deduction::where('employee_id','=',$request->input('employee_id'))
            ->first();
        return $employee->total_deduction;
    }
//    function position(Request $request){
//        $employee = Position::where('employee_id','=',$request->input('employee_id'))
//            ->first();
//        return $employee->amount;
//    }
}
