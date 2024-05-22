<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReviews;
use App\Models\Customers;
use App\Models\Products;

class ProductReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("productreviews.index", [
            "productreview" => ProductReviews::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("productreviews.create", [
            'customer' => Customers::all(),
            'product' => Products::all()
        ]);
    }

    public function insertproductreviews(Request $request)
    {
        Productreviews::create($request->all());
        return redirect('/productreviews')->with('success', 'New Product review Data Created Successfully');
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
        $productreviews = Productreviews::find($id);
        if (!$productreviews) return redirect()->route('productreviews.edit');
        return view('productreviews.edit', [
            'productreviews' => $productreviews,
            'customer' => Customers::all(),
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
        $productreviews = Productreviews::find($id);
        $productreviews->customer_id = $request->customer_id;
        $productreviews->product_id = $request->product_id;
        $productreviews->rating = $request->rating;
        $productreviews->comment = $request->comment;
        $productreviews->save();
        return redirect('/productreviews')->with('success', 'productreviews Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapusproductreviews($id) 
    { 
        $productreviews = Productreviews::find($id);
        $productreviews->delete();
        return redirect('/productreviews')->with('success', 'The productreviews Data Successfully Delete!');
    }
}
