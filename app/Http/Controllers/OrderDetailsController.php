<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\Orders;


class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("orderdetails.index", [
            "orderdetails" => OrderDetails::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("orderdetails.create" ,[
            'order' => Orders::all()
        ]);
    }

    public function insertorderdetails(Request $request)
    {
        OrderDetails::create($request->all());
        return redirect('/orderdetails')->with('success', 'New Order details Data Created Successfully');
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
        $orderdetails = OrderDetails::find($id);
        if (!$orderdetails) return redirect()->route('orderdetails.edit');
        return view('orderdetails.edit', [
            'orderdetails' => $orderdetails,
            'order' => Orders::all()
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
        $orderdetails = OrderDetails::find($id);
        $orderdetails->product_id = $request->product_id;
        $orderdetails->order_id = $request->order_id;
        $orderdetails->quantity = $request->quantity;
        $orderdetails->subtotal = $request->subtotal;
        $orderdetails->save();
        return redirect('/orderdetails')->with('success', 'orderdetails Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapusorderdetails($id) 
    { 
        $orderdetails = OrderDetails::find($id);
        $orderdetails->delete();
        return redirect('/orderdetails')->with('success', 'The orderdetails Data Successfully Delete!');
    }
}
