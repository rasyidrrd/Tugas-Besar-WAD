<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancies;
use App\Models\Application;
use App\Models\User;

class VacanciesController extends Controller
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
    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        return view('vacancies.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new Vacancies();
        if ($request->hasFile('cover_image') && $request->hasFile('file_requirement') && $request->hasFile('pakta_integritas')) {
            $path = public_path().'/images';
            $cover = $request->file('cover_image');
            $cover->move($path.'/cover', $cover->getClientOriginalName());
            $cover_path = "images/cover/".$cover->getClientOriginalName();

            $pakta = $request->file('pakta_integritas');
            $pakta->move($path.'/pakta', $pakta->getClientOriginalName());
            $pakta_path = "images/pakta/".$pakta->getClientOriginalName();

            $requirement = $request->file('file_requirement');
            $requirement->move($path.'/requirement', $requirement->getClientOriginalName());
            $requirement_path = "images/requirement/".$requirement->getClientOriginalName();

            $new->title = $request->title;
            $new->description = $request->jobdesc;
            $new->due_date = $request->due_date;
            $new->kuota = $request->kuota;
            $new->file_path = $requirement_path;
            $new->pakta_integritas = $pakta_path;
            $new->image_path = $cover_path;
            $new->save();

            return redirect()->route('admin.index');
        }else{
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $job = Vacancies::findorfail($id);
        $user = $request->session()->get('user');
        $application = Application::join('users','users.id', '=','applications.user_id')->
                select('users.name', 'users.email','applications.id','applications.tahap_2','applications.tanggal_lahir','applications.alamat', 'applications.nik', 'applications.no_hp', 'applications.pakta_integritas', 'applications.file_path')->
                where('applications.vacancies_id', '=', $id)->get();
        return view('vacancies.show', compact('user','application','job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $vacancies = Vacancies::findorfail($id);
        $user = $request->session()->get('user');
        return view('vacancies.edit', compact('user','vacancies'));
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
        $new = Vacancies::findorfail($id);
        $path = public_path().'/images';
        if($request->hasFile('file_requirement')){
            $requirement = $request->file('file_requirement');
            $requirement->move($path.'/requirement', $requirement->getClientOriginalName());
            $requirement_path = "images/requirement/".$requirement->getClientOriginalName();
            $new->file_path = $requirement_path;
        }else {
            $new->file_path = $new->file_path;
        }
        if($request->hasFile('pakta_integritas')){
            $pakta = $request->file('pakta_integritas');
            $pakta->move($path.'/pakta', $pakta->getClientOriginalName());
            $pakta_path = "images/pakta/".$pakta->getClientOriginalName();
            $new->pakta_integritas = $pakta_path;
        }else {
            $new->pakta_integritas = $new->pakta_integritas;
        }
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image');
            $cover->move($path.'/cover', $cover->getClientOriginalName());
            $cover_path = "images/cover/".$cover->getClientOriginalName();
            $new->image_path = $cover_path;
        } else {
            $new->image_path = $new->image_path;
        }
        $new->kuota = $request->kuota;
        $new->title = $request->title;
        $new->description = $request->jobdesc;
        $new->due_date = $request->due_date;
        $new->save();

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancies = Vacancies::findorfail($id);
        $vacancies->delete();
        return redirect()->route('admin.index');
    }

    public function list(Request $request){
        $user = $request->session()->get('user');
        $jobs = Vacancies::all();
        return view('vacancies.list', compact('user', 'jobs'));
    }
}
