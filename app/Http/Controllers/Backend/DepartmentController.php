<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
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
        $data['departments']= Department::paginate(10);
        $data['departments']= Department::orderBy('created_at', 'DESC')->get();
        return view('backend.department.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);

        $id= Department::create($request->all());
        if($id){
            $request->session()->flash('success_message','Department Created Successfully!');

            return redirect()->route('department.index');
        }else{
            $request->session()->flash('error_message','Department Created Failed!');
            return redirect()->route('category.create');
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
        $data['department']=Department::find($id);
        return view('backend.department.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get tag by id
        $data['department']=Department::find($id);
        //dd($data);
        return view('backend.department.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::find($id);
        //add Updated_by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status =$department->update($request->all());
        if($status){
            $request->session()->flash('success_message','Department Updated Successfully!');
        }else{
            $request->session()->flash('error_message','Department Updated Failed!');
        }
        return redirect()->route('department.index');
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
        $department= Department::find($id);
        //delete
        if($department->delete()){
            $request->session()->flash('success_message','Department Delete Successfully!');
        }else{
            $request->session()->flash('error_message','Department Delete Failed!');
        }
        return redirect()->route('department.index');
    }
}
