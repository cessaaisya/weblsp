<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("customers.index", [
            "customers" => Customers::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("customers.create");
    }

    public function insertcustomers(Request $request)
    {
        Customers::create($request->all());
        return redirect('/customers')->with('success', 'New Customer Data Created Successfully');
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
        $customers = Customers::find($id);
        if (!$customers) return redirect()->route('customers.edit');
        return view('customers.edit', [
            'customers' => $customers
        ]); 
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
        $customers = Customers::find($id);
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->password = $request->password;
        $customers->phone = $request->phone;
        $customers->address1 = $request->address1;
        $customers->address2 = $request->address2;
        $customers->address3 = $request->address3;
        $customers->save();
        return redirect('/customers')->with('success', 'customers Data Update Successfully');    
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

    public function hapuscustomers($id) 
    { 
        $customers = Customers::find($id);
        $customers->delete();
        return redirect('/customers')->with('success', 'The customers Data Successfully Delete!');
    }
}
