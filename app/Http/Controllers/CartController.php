<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Products;
use \App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data dari tabel cart berdasarkan user_id
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        // Tampilkan halaman cart dengan data produk yang sesuai
        return view('cart.index', compact('cartItems'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Products::find($productId);
        $userId = auth()->id();
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $quantityToAdd = $request->input('stock_quantity', 1);
        $price = $product->price;
    
        // Calculate price with discount if available
        if ($product->discounts()->exists()) {
            $discount = $product->discounts()->first();
            $discountPercentage = $discount->percentage;
    
            if ($discountPercentage > 0) {
                $price = $product->price - ($product->price * $discountPercentage / 100);
            }
        }
    
        $cartItem = Cart::where('user_id', $userId)
                        ->where('product_id', $product->id)
                        ->first();
    
        if ($cartItem) {
            // Update existing cart item
            $cartItem->quantity += $quantityToAdd;
            $cartItem->total = $cartItem->quantity * $price;
            $cartItem->save();
        } else {
            // Create new cart item
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => $quantityToAdd,
                'total' => $quantityToAdd * $price,
            ]);
        }
    
        // Calculate endtotal for the current user
        $endtotal = Cart::where('user_id', $userId)->sum('total');
    
        // Update endtotal for all cart items of the user
        Cart::where('user_id', $userId)->update(['endtotal' => $endtotal]);
    
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapuscart($id)
{
    // Temukan dan hapus item wishlist berdasarkan ID
    $cartItem = Cart::findOrFail($id);

    // Pastikan item wishlist milik pengguna yang saat ini login
    if ($cartItem->user_id === Auth::id()) {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Product Berhasil Dihapus dari Cart');
    } else {
        return redirect()->route('cart.index')->with('error', 'You are not authorized to delete this item.');
    }
}

    public function showCart()
    {
        $total_price = 0; 
        $user_id = auth()->user()->id;
        $products = Products::all();
        $carts = Cart::where('user_id', $user_id)->get();
        $cartItems = [];
        if (isset($_COOKIE['cartItems'])) {
            $cartItems = json_decode($_COOKIE['cartItems'], true);
        }
        $productsInCart = Products::whereIn('id', $cartItems)->get();
        return view('cart.index', compact('productsInCart'));

        foreach ($carts as $cart) {
            $total_price = $total_price + $products->price;
}
}
}