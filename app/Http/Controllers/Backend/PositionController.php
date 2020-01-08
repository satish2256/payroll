<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PositionRequest;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PositionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['positions']= Position::orderBy('created_at', 'DESC')->get();
        return view('backend.position.index',compact('data'));
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

        return view('backend.position.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        $pass = $request->input('password');
        $request->request->add(['password' => Hash::make($pass)]);
//        $id= Position::create($request->all());

        $request->request->add(['created_by'=>Auth::user()->id]);

        $id= Position::create($request->all());
        if($id){
            $request->session()->flash('success_message','Position Created Successfully!');

            return redirect()->route('position.index');
        }else{
            $request->session()->flash('error_message','Position Created Failed!');
            return redirect()->route('position.create');
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

        $data['position']=Position::find($id);
        return view('backend.position.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get position by id
        $data['position']=Position::find($id);


        //dd($data);
        return view('backend.position.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {

        $position = Position::find($id);
        //add Updated_by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status =$position->update($request->all());
        if($status){
            $request->session()->flash('success_message','Position Updated Successfully!');
        }else{
            $request->session()->flash('error_message','Position Updated Failed!');
        }
        return redirect()->route('position.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //get position by id
        $position= Position::find($id);
        //delete
        if($position->delete()){
            $request->session()->flash('success_message','Position Delete Successfully!');
        }else{
            $request->session()->flash('error_message','Position Delete Failed!');
        }
        return redirect()->route('position.index');
    }
}
