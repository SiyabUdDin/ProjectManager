<?php

namespace App\Http\Controllers;

use App\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
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
            $companies=company::where('user_id',Auth::user()->id)->get();
            return view('companies.index',['companies'=>$companies]);
        }

return view('Auth.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
return view('companies.create');
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


            $compny=company::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'user_id'=>Auth::user()->id


            ]);
            if($compny){
                return redirect()->route('companies.index')
                    ->with('success','Company Created Successfully');
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
    public function show(company $company)
    {
        //
       // $company=company::Where('id',$company->id)->first();
        $company=company::find($company->id);
        return view('companies.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(company $company)
    {
        //
        $company = company::find($company->id);
        return view('companies.edit', ['company' => $company]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, company $company)
    {
        //
        $companyUpdate=company::find($company->id)->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')

        ]);
        if($companyUpdate){
            return redirect()->route('companies.show',['company'=>$company->id])
                ->with('success','Company Updated Successfully');
        }
        return back()->withInput();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(company $company)
    {
        //
        $companyDelete=company::find($company->id);
        if($companyDelete->delete()){
            return redirect()->route('companies.index')
                ->with('success','Company Deleted Successfully');
        }

    }
}
