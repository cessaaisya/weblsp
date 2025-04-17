<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers; 

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("suppliers.index", [
            "suppliers" => Suppliers::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("suppliers.create");
    }

    public function insertsuppliers(Request $request)
    {
        Suppliers::create($request->all());
        return redirect('/suppliers')->with('success', 'New suppliers Data Created Successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view("suppliers.store");
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
        $suppliers = Suppliers::find($id);
        if (!$suppliers) return redirect()->route('suppliers.edit');
        return view('suppliers.edit', [
            'suppliers' => $suppliers
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
        $suppliers = Suppliers::find($id);
        $suppliers->name = $request->name;
        $suppliers->address = $request->address;
        $suppliers->phone = $request->phone;
        $suppliers->product = $request->product;
        $suppliers->quantity = $request->quantity;
        $suppliers->price_total = $request->price_total;
        $suppliers->supply_date = $request->supply_date;
        $suppliers->save();
        return redirect('/suppliers')->with('success', 'suppliers Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapussuppliers($id) 
    { 
        $suppliers = Suppliers::find($id);
        $suppliers->delete();
        return redirect('/suppliers')->with('success', 'The suppliers Data Successfully Delete!');
    }
}
