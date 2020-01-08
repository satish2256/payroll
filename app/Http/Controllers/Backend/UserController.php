<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        // return view('backend.user.index');
        //get all data from database
        //$data['users']= User::all();
        //get all data from database with pagination
//        $data['roles']= Role::all();
        $data['users']= User::orderBy('created_at', 'DESC')->get();
//     dd($data);
        //get all with order by
        //$data['users']=User::orderby('created_at','desc')->get();
        return view('backend.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        dd('test');
//        $data['roles']=Role::all();
//        $data['roles']=Role::where('status',1)->get();
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //store data into database and send data into user model
        $pass = $request->input('password');
        $request->request->add(['password' => Hash::make($pass)]);
        $id= User::create($request->all());

//        dd($request);
        if($id){
            $request->session()->flash('success_message','User Created Successfully!');
            //redirect back to user index page
            return redirect()->route('user.index');
        }else{
            $request->session()->flash('error_message','User Created Failed!');
            return redirect()->route('user.create');
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
        //get user by id
        $data['user']=User::find($id);
        //dd($data);
        return view('backend.user.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $data['roles']=Role::where('status',1)->get();
        //get user by id
        $data['user']=User::find($id);
        //dd($data);
        return view('backend.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        //add Updated_by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status =$user->update($request->all());
        if($status){
            $request->session()->flash('success_message','User Updated Successfully!');
        }else{
            $request->session()->flash('error_message','User Updated Failed!');
        }
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //get user by id
        $user= User::find($id);
        //delete
        if($user->delete()){
            $request->session()->flash('success_message','User Delete Successfully!');
        }else{
            $request->session()->flash('error_message','User Delete Failed!');
        }
        return redirect()->route('user.index');
    }
}
