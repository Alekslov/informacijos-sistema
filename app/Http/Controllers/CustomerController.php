<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Company;
use Validator;

class CustomerController extends Controller
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
        $companies = Company::all();
        if($request->company_id) {
            $customers = Customer::where('company_id', $request->company_id)->get();
            $filterBy = $request->company_id;
        }
        else {
            $customers = Customer::all();
        }
        $companies = $companies->sortBy('name');
    
        $customers = $customers->sortBy('surname');
        return view('customer.index', [
            'companies' => $companies,
            'customers' => $customers,
            'filterBy' => $filterBy ?? 0,
            'sortBy' => $sortBy ?? 0
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $companies = $companies->sortBy('name');
        return view('customer.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
       
        $customer = new Customer;
        $customer->name = $request->customer_name;
        $customer->surname = $request->customer_surname;
        $customer->phone = $request->customer_phone;
        $customer->email = $request->customer_email;
        $customer->comment = $request->customer_comment;
        $customer->company_id = $request->company_id;
        $customer->save();
        return redirect()->route('customer.index')->with('success_message', 'Sekmingai pridėtas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $companies = Company::all();
        $companies = $companies->sortBy('surname');
        return view('customer.edit', ['customer' => $customer, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        
          
    
        $customer->name = $request->customer_name;
        $customer->surname = $request->customer_surname;
        $customer->phone = $request->customer_phone;
        $customer->email = $request->customer_email;
        $customer->comment = $request->customer_comment;
        $customer->company_id = $request->company_id;
        $customer->save();
        return redirect()->route('customer.index')->with('success_message', 'Sekmingai pakeistas.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
