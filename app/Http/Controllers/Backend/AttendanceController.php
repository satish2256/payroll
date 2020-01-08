<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AttendanceController extends Controller
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

        $data['attendances']= Attendance::orderBy('created_at', 'DESC')->get();
        $data['employees']= Employee::all();
        return view('backend.attendance.index',compact('data'));
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
        return view('backend.attendance.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request)
    {

        $request->request->add(['created_by'=>Auth::user()->id]);

        $id= Attendance::create($request->all());
        if($id){
            $request->session()->flash('success_message','Attendance Created Successfully!');

            return redirect()->route('attendance.index');
        }else{
            $request->session()->flash('error_message','Attendance Created Failed!');
            return redirect()->route('attendance.create');
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

        $data['attendance']=Attendance::find($id);
        return view('backend.attendance.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        //get attendance by id
//        $data['attendance']=Attendance::find($id);
//        $data['employees']=Employee::where('status',1)
//            ->pluck('name','id');
//
//        //dd($data);
//        return view('backend.attendance.edit',compact('data'));
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(AttendanceRequest $request, $id)
//    {
//
//        $attendance = Attendance::find($id);
//        //add Updated_by to request
//        $request->request->add(['updated_by'=>Auth::user()->id]);
//
//        $status =$attendance->update($request->all());
//        if($status){
//            $request->session()->flash('success_message','Attendance Updated Successfully!');
//        }else{
//            $request->session()->flash('error_message','Attendance Updated Failed!');
//        }
//        return redirect()->route('attendance.index');
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //get attendance by id
        $attendance= Attendance::find($id);
        //delete
        if($attendance->delete()){
            $request->session()->flash('success_message','Attendance Delete Successfully!');
        }else{
            $request->session()->flash('error_message','Attendance Delete Failed!');
        }
        return redirect()->route('attendance.index');
    }
}
