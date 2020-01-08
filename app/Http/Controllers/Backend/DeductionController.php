<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\DeductionRequest;
use App\Models\CashAdvance;
use App\Models\Deduction;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeductionController extends Controller
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
        $data['deductions']= Deduction::orderBy('created_at', 'DESC')->get();
        $data['employees']= Employee::all();
        $data['cashadvances']= CashAdvance::all();
        return view('backend.deduction.index',compact('data'));
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
        $data['cashadvances']=CashAdvance::where('status',1)
            ->pluck('id');
//        $data['employees']=Employee::where('status',1)->get();
        return view('backend.deduction.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeductionRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);

        $id= Deduction::create($request->all());
        if($id){
            $request->session()->flash('success_message','Deduction Created Successfully!');

            return redirect()->route('deduction.index');
        }else{
            $request->session()->flash('error_message','Deduction Created Failed!');
            return redirect()->route('deduction.create');
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
        $data['deduction']=Deduction::find($id);
        return view('backend.deduction.show',compact('data'));
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
        $data['cashadvances']=CashAdvance::where('status',1)
            ->pluck('id');
        //get tag by id
        $data['deduction']=Deduction::find($id);
        //dd($data);
        return view('backend.deduction.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeductionRequest $request, $id)
    {

        $deduction = Deduction::find($id);
        //add Updated_by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status =$deduction->update($request->all());
        if($status){
            $request->session()->flash('success_message','Deduction Updated Successfully!');
        }else{
            $request->session()->flash('error_message','Deduction Updated Failed!');
        }
        return redirect()->route('deduction.index');
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
        $deduction= Deduction::find($id);
        //delete
        if($deduction->delete()){
            $request->session()->flash('success_message','Deduction Delete Successfully!');
        }else{
            $request->session()->flash('error_message','Deduction Delete Failed!');
        }
        return redirect()->route('deduction.index');
    }




}
