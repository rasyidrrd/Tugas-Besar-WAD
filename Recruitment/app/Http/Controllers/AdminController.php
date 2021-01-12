<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vacancies;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        $error = null;
        if($user){
            if($user->type != 'admin'){
                return redirect()->route('user.index');
            } else {
                $jobs = Vacancies::all();
                return view('admin.index', compact('user', 'jobs'));
            }
        }
        else 
            return view('admin.login', compact('user', 'error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        $error = null;
        return view('admin.register', compact('user', 'error'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->type == 'register'){
            $admin = Admin::select('name', 'email', 'password')->where('email', $request->email)->get();
            if(!$admin->isEmpty()){
                $user = $request->session()->get('user');
                $error = array("email_error"=>true, "name"=>$request->name, "email"=>$request->email);
                return view('admin.register', compact('user', 'error'));
            } else{
                $admin = new Admin();
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->password = $request->password;
                $admin->save();
                return redirect()->route('admin.index');
            }
        } else if($request->type == 'login') {
            $admin = Admin::select('id','name', 'email', 'password')->where('email', $request->email)->get();
            if(!$admin->isEmpty() && $request->password == $admin[0]->password){
                $admin = $admin[0];
                $admin->type = 'admin';
                $request->session()->put('user', $admin);
                return redirect()->route('admin.index');
            } else{
                $user = $request->session()->get('user');
                $error = array("email_error"=>true, "email"=>$request->email);
                return view('admin.login', compact('user', 'error'));
            }
        } else {
            $request->session()->forget('user');
            return redirect()->route('admin.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
