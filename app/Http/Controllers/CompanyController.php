<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
    public function index(Request $request)
    {
        if ('name' == $request->sort) {
            $companies = Company::orderBy('name')->get();
        }
        else {
            $companies = Company::all();
        }
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),
        // [
        //     'company_name' => ['required', 'min:3', 'max:100'],
            
        // ],
        // [
        // 'company_name.min' => 'Vardas turi sudaryti nuo 3 iki 100 raidžių.',
        
        // ]
        // );
        // if ($validator->fails()) {
        //     $request->flash();
        //     return redirect()->back()->withErrors($validator);
        // }
 
        $company = new company;
        $company->name = $request->company_name;
        $company->adress = $request->company_adress;
        $company->save();
        return redirect()->route('company.index')->with('success_message', 'Sekmingai pridėta.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        // $validator = Validator::make($request->all(),
        // [
        //     'company_name' => ['required', 'min:3', 'max:100'],
            
        // ],
        // [
        // 'company_name.min' => 'Vardas turi sudaryti nuo 3 iki 100 raidžių.',
        
        // ]
        // );
        // if ($validator->fails()) {
        //     $request->flash();
        //     return redirect()->back()->withErrors($validator);
        // }
 
        
        $company->name = $request->company_name;
        $company->adress = $request->company_adress;
        $company->save();
        return redirect()->route('company.index')->with('success_message', 'Sekmingai pridėta.');

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if($company->companyCustomer->count()){
            return redirect()->route('company.index')->with('info_message', 'Trinti negalima, nes turi klientą.');
        }
        $company->delete();
        return redirect()->route('company.index')->with('success_message', 'Sekmingai ištrinta.');
 
 
    }
    }

