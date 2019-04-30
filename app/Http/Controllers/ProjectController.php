<?php

namespace App\Http\Controllers;

use App\project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
            $projecties=project::where('user_id',Auth::user()->id)->get();
            return view('projects.index',['projecties'=>$projecties]);
        }

        return view('Auth.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        //
        return view('projects.create',['company_id'=>$id]);
    }
    public function Adduser(Request $request){

        $project=project::find($request->input('project_id'));
if(Auth::user()->id==$project->user_id){
    $user=user::where('email',$request->input('email'))->get();
    if($user && $project){
        $project->user()->attach($user->id);
    }
}

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()) {


            $project=project::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'company_id'=>$request->input('company_id'),
                'user_id'=>Auth::user()->id


            ]);
            if($project){
                return redirect()->route('projects.index')
                    ->with('success','Project Created Successfully');
            }

        }
        return view('Auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
        // $company=company::Where('id',$company->id)->first();
        $project=project::find($project->id);
        return view('projects.show',['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(project $project)
    {
        //
        $project = project::find($project->id);
        return view('projects.edit', ['project' => $project]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, project $project)
    {
        //
        $projectUpdate=project::find($project->id)->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')

        ]);
        if($projectUpdate){
            return redirect()->route('projects.show',['company'=>$project->id])
                ->with('success','Project Updated Successfully');
        }
        return back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(project $project)
    {
        //
        $projectDelete=project::find($project->id);
        if($projectDelete->delete()){
            return redirect()->route('projects.index')
                ->with('success','project Deleted Successfully');
        }

    }
}
