<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SalaryRequest;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
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
        $data['salaries']= Salary::paginate(10);
        $data['salaries']= Salary::orderBy('created_at', 'DESC')->get();
        $data['employees']= Employee::all();
//      $data['deductions']= Deduction::all();
        return view('backend.salary.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees']=Employee::where('status',1)
            ->pluck('name','id');
//        $data['deductions']=Deduction::where('status',1)
//            ->pluck('id');
        return view('backend.salary.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaryRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);

        $id= Salary::create($request->all());
        if($id){
            $request->session()->flash('success_message','Salary Created Successfully!');
            return redirect()->route('salary.index');

        }else{
            $request->session()->flash('error_message','Salary Created Failed!');
            return redirect()->route('salary.create');
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
        $data['salary']=Salary::find($id);
        $data['employees']=Employee::where('status',1)
            ->pluck('name','id');
//        $data['deductions']=Deduction::where('status',1)
//            ->pluck('id');
        return view('backend.salary.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['employees']=Employee::where('status',1)
            ->pluck('name','id');
        //get tag by id
        $data['salary']=Salary::find($id);
        //dd($data);
        return view('backend.salary.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaryRequest $request, $id)
    {
        $salary = Salary::find($id);
        //add Updated_by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status =$salary->update($request->all());
        if($status){
            $request->session()->flash('success_message','Salary Updated Successfully!');
        }else{
            $request->session()->flash('error_message','Salary Updated Failed!');
        }
        return redirect()->route('salary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //get tag by id
        $salary= Salary::find($id);
        //delete
        if($salary->delete()){
            $request->session()->flash('success_message','Salary Delete Successfully!');
        }else{
            $request->session()->flash('error_message','Salary Delete Failed!');
        }
        return redirect()->route('salary.index');
    }
}
