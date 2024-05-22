<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Customers;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("orders.index", [
            "orders" => Orders::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("orders.create", [
            'customer' => Customers::all()
        ]);
        
    }

    public function insertorders(Request $request)
    {
        Orders::create($request->all());
        return redirect('/orders')->with('success', 'New Order Data Created Successfully');
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
        $orders = Orders::find($id);
        if (!$orders) return redirect()->route('orders.edit');
        return view('orders.edit', [
            'orders' => $orders,
            'customer' => Customers::all()
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
        $orders = Orders::find($id);
        $orders->customer_id = $request->customer_id;
        $orders->order_date = $request->order_date;
        $orders->total_amount = $request->total_amount;
        $orders->status = $request->status;
        $orders->save();
        return redirect('/orders')->with('success', 'orders Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapusorders($id) 
    { 
        $orders = Orders::find($id);
        $orders->delete();
        return redirect('/orders')->with('success', 'The orders Data Successfully Delete!');
    }
}
