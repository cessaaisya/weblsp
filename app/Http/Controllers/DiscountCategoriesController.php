<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountCategories;

class DiscountCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("discountcategories.index", [
            "disccat" => DiscountCategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discountcategories.create');
    }

    public function insertdisccat(Request $request)
    {
        DiscountCategories::create($request->all());
        return redirect('/discountcategories')->with('success', 'New Discount Categories Data Created Successfully');
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
        $discountcategories = DiscountCategories::find($id);
        if (!$discountcategories) return redirect()->route('discountcategories.edit');
        return view('discountcategories.edit', [
            'discountcategories' => $discountcategories
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
        $discountcategories = DiscountCategories::find($id);
        $discountcategories->category_name = $request->category_name;
        $discountcategories->save();
        return redirect('/discountcategories')->with('success', 'discountcategories Data Update Successfully');    
    
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

    public function hapusdiscountcategories($id) 
    { 
        $discountcategories = DiscountCategories::find($id);
        $discountcategories->delete();
        return redirect('/discountcategories')->with('success', 'The discountcategories Data Successfully Delete!');
    }
}
