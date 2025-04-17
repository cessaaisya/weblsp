<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductReviews;
use App\Models\Customers;
use App\Models\Products;
use Illuminate\Support\Facades\Log;

class ProductRevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if user is authenticated
        if (Auth::guest()) {
            // Redirect to login page if not authenticated
            return redirect()->route('login.login');
        }

        // Pass the current user, products, and product reviews to the view
        return view('productrevlp.index', [
            'productReviews' => ProductReviews::all(),
            'customer' => Auth::user(),
            'products' => Products::all(),
        ]);
    }

    public function insertproductrevlp(Request $request)
    {
        Productreviews::create($request->all());
        return redirect('/productrevlp')->with('success', 'New Product review Data Created Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);
        try {
            $review = ProductReviews::create($request->all());
            Log::info('Review created: ', ['review' => $review]);
            return redirect()->back()->with('success', 'Review submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to create review: ', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to submit review.');
        }

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
        //
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
        //
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
}
