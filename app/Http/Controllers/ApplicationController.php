<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancies;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new Application();
        $user = $request->session()->get('user');
        $job = Vacancies::findorfail($request->vacancies_id);
        $new->vacancies_id = $job->id;
        $new->user_id = $user->id;
        $new->nik = $request->nik;
        $new->alamat = $request->alamat;
        $new->tanggal_lahir = $request->tanggal_lahir;
        $new->no_hp = $request->no_telp;
        $path = public_path().'/images';

        $pakta = $request->file('pakta_integritas');
        $pakta->move($path.'/pakta_user', $pakta->getClientOriginalName());
        $pakta_path = "images/pakta_user/".$pakta->getClientOriginalName();

        $cv = $request->file('cv');
        $cv->move($path.'/cv', $cv->getClientOriginalName());
        $cv_path = "images/cv/".$cv->getClientOriginalName();

        
        $new->file_path = $cv_path;
        $new->pakta_integritas = $pakta_path;
        $new->save();
        return view('utility.apply_success', compact('user'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = $request->session()->get('user');
        $job = Vacancies::findorfail($id);
        return view('application.create', compact('user', 'job'));
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
        $e = Application::findorfail($id);
        $e->tahap_2 = $request->tahap_2;
        $e->save();
        return redirect()->back();
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
