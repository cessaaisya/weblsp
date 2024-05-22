<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlists;
use App\Models\Customers;
use App\Models\Products;

class WishlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("wishlists.index", [
            "wishlists" => Wishlists::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("wishlists.create" , [
            'customer' => Customers::all(),
            'product' => Products::all()
        ]);
    }

    public function insertwishlists(Request $request)
    {
        Wishlists::create($request->all());
        return redirect('/wishlists')->with('success', 'New wishlist Data Created Successfully');
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
        $wishlists = Wishlists::find($id);
        if (!$wishlists) return redirect()->route('wishlists.edit');
        return view('wishlists.edit', [
            'wishlists' => $wishlists,
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
        $wishlists = Wishlists::find($id);
        $wishlists->customer_id = $request->customer_id;
        $wishlists->product_id = $request->product_id;
        $wishlists->save();
        return redirect('/wishlists')->with('success', 'wishlists Data Update Successfully');    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapuswishlists($id) 
    { 
        $wishlists = Wishlists::find($id);
        $wishlists->delete();
        return redirect('/wishlists')->with('success', 'The wishlists Data Successfully Delete!');
    }
}
