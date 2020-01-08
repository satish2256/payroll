<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CashAdvaneRequest;
use App\Models\CashAdvance;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CashAdvanceController extends Controller
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

        $data['cashadvances']= CashAdvance::orderBy('created_at', 'DESC')->get();
        $data['employees']= Employee::all();
        return view('backend.cashadvance.index',compact('data'));
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

        return view('backend.cashadvance.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashAdvaneRequest $request)
    {

        $request->request->add(['created_by'=>Auth::user()->id]);

        $id= CashAdvance::create($request->all());
        if($id){
            $request->session()->flash('success_message','CashAdvance Created Successfully!');

            return redirect()->route('cashadvance.index');
        }else{
            $request->session()->flash('error_message','CashAdvance Created Failed!');
            return redirect()->route('cashadvance.create');
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

        $data['cashadvance']=CashAdvance::find($id);
        return view('backend.cashadvance.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get cashadvance by id
        $data['cashadvance']=CashAdvance::find($id);
        $data['employees']=Employee::where('status',1)
            ->pluck('name','id');

        //dd($data);
        return view('backend.cashadvance.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CashAdvaneRequest $request, $id)
    {

        $cashadvance = CashAdvance::find($id);
        //add Updated_by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status =$cashadvance->update($request->all());
        if($status){
            $request->session()->flash('success_message','CashAdvance Updated Successfully!');
        }else{
            $request->session()->flash('error_message','CashAdvance Updated Failed!');
        }
        return redirect()->route('cashadvance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //get cashadvance by id
        $cashadvance= CashAdvance::find($id);
        //delete
        if($cashadvance->delete()){
            $request->session()->flash('success_message','CashAdvance Delete Successfully!');
        }else{
            $request->session()->flash('error_message','CashAdvance Delete Failed!');
        }
        return redirect()->route('cashadvance.index');
    }
}
