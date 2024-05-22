<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discounts;
use App\Models\DiscountCategories;
use App\Models\Products;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("discounts.index", [
            "discounts" => Discounts::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("discounts.create",[
            "discountcategories" => DiscountCategories::all(),
            'product' => Products::all()
        ]);
    }

    public function insertdiscounts(Request $request)
    {
        Discounts::create($request->all());
        return redirect('/discounts')->with('success', 'New discount Data Created Successfully');
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
        $discounts = Discounts::find($id);
        if (!$discounts) return redirect()->route('discounts.edit');
        return view('discounts.edit', [
            'discounts' => $discounts,
            "discountcategories" => DiscountCategories::all(),
            'product' => Products::all()
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
        $discounts = Discounts::find($id);
        $discounts->category_discount_id = $request->category_discount_id;
        $discounts->product_id = $request->product_id;
        $discounts->start_date = $request->start_date;
        $discounts->end_date = $request->end_date;
        $discounts->percentage = $request->percentage;
        $discounts->save();
        return redirect('/discounts')->with('success', 'discounts Data Update Successfully');    
    
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

    public function hapusdiscounts($id) 
    { 
        $discounts = Discounts::find($id);
        $discounts->delete();
        return redirect('/discounts')->with('success', 'The discounts Data Successfully Delete!');
    }
}
