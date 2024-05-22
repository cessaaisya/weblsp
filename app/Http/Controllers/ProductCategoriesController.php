<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("productcategories.index", [
            "productcat" => ProductCategories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("productcategories.create");
    }

    public function insertprocat(Request $request)
    {
        ProductCategories::create($request->all());
        return redirect('/productcategories')->with('success', 'New Customer Data Created Successfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $productcategories = ProductCategories::find($id);
        if (!$productcategories) return redirect()->route('productcategories.edit');
        return view('productcategories.edit', [
            'productcategories' => $productcategories
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
        $productcategories = ProductCategories::find($id);
        $productcategories->category_name = $request->category_name;
        $productcategories->save();
        return redirect('/productcategories')->with('success', 'productcategories Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapusproductcategories($id) 
    { 
        $productcategories = ProductCategories::find($id);
        $productcategories->delete();
        return redirect('/productcategories')->with('success', 'The productcategories Data Successfully Delete!');
    }
}
