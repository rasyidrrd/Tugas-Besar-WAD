<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use App\Models\Vacancies;

class UserController extends Controller
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
            if($user->type != 'user'){
                return redirect()->route('home');
            } else {
                $application = Application::join('vacancies','vacancies.id', '=','applications.vacancies_id')->
                select('applications.*','vacancies.title', 'vacancies.description', 'vacancies.image_path', 'vacancies.due_date', 'vacancies.kuota')->
                where('applications.user_id', '=', $user->id)->get();
                // dd($application);
                return view('user.index', compact('user', 'application'));
            }
        }
        else 
            return view('user.login', compact('user', 'error'));
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
        return view('user.register', compact('user', 'error'));
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
            $user = User::select('name', 'email', 'password')->where('email', $request->email)->get();
            if(!$user->isEmpty() || !$request->name){
                $user = $request->session()->get('user');
                $error = array("email_error"=>true, "name"=>$request->name, "email"=>$request->email);
                return view('user.register', compact('user', 'error'));
            } else{
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->save();
                return redirect()->route('user.index');
            }
        } else if($request->type == 'login') {
            $user = User::select('id','name', 'email', 'password')->where('email', $request->email)->get();
            if(!$user->isEmpty() && $request->password == $user[0]->password){
                $user = $user[0];
                $user->type = 'user';
                $request->session()->put('user', $user);
                return redirect()->route('user.index');
            } else{
                $user = $request->session()->get('user');
                $error = array("email_error"=>true, "email"=>$request->email);
                return view('user.login', compact('user', 'error'));
            }
        } else {
            $request->session()->forget('user');
            return redirect()->route('user.index');
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
        //
    }
}
