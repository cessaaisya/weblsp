<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Models\Orders;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("payments.index", [
            "payments" => Payments::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("payments.create" ,[
            'order' => Orders::all()
        ]);
    }

    public function insertpayments(Request $request)
    {
        Payments::create($request->all());
        return redirect('/payments')->with('success', 'New payment Data Created Successfully');
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
        $payments = Payments::find($id);
        if (!$payments) return redirect()->route('payments.edit');
        return view('payments.edit', [
            'payments' => $payments,
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
        $payments = Payments::find($id);
        $payments->order_id = $request->order_id;
        $payments->payment_date = $request->payment_date;
        $payments->payment_method = $request->payment_method;
        $payments->amount = $request->amount;
        $payments->save();
        return redirect('/payments')->with('success', 'payments Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapuspayments($id) 
    { 
        $payments = Payments::find($id);
        $payments->delete();
        return redirect('/payments')->with('success', 'The payments Data Successfully Delete!');
    }
}
