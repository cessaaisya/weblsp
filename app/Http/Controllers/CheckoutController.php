<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function index()
    {
        $customers = Auth::user();

        if (!$customers instanceof Customers) {
            $customers = Customers::find(Auth::id());
        }

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $selectedProductIds = session('selected_products', []);
        $selectedProductIds = is_array($selectedProductIds) ? $selectedProductIds : [];
        $selectedProducts = Products::whereIn('id', $selectedProductIds)->get();

        $totalPrice = $selectedProducts->sum(function ($product) use ($cartItems) {
            $cartItem = $cartItems->firstWhere('product_id', $product->id);
            return $cartItem ? $product->getDiscountedPrice() * $cartItem->quantity : 0;
        });

        $idorders = Orders::all();
        return view('checkout.index', compact('selectedProducts', 'totalPrice', 'customers', 'idorders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get selected product IDs from the request
        $selectedProducts = $request->input('selected_products', []);

        // Ensure $selectedProducts is an array
        $selectedProducts = is_array($selectedProducts) ? $selectedProducts : [];

        // Store selected product IDs in the session
        session(['selected_products' => $selectedProducts]);

        // Redirect to the checkout page
        return Redirect::route('checkout.index')->with('success', 'Products successfully added to checkout!');
    }

    /**
     * Display the specified resource.
     */
    public function storecheckout(Request $request)
    {
        Payments::create($request->all());
        // return $request->input();
        return redirect('/aftercheckout')->with('success', 'Berhasil, barang berhasil di checkout');

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkout(Request $request)
    {
        // Ambil data produk dari tabel cart berdasarkan user_id
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        // Hitung total harga produk yang dipilih
        // $totalPrice = $cartItems->sum(function ($cartItem) {
        //     return $cartItem->product->getDiscountedPrice() * $cartItem->quantity;
        // });

        // Tampilkan halaman checkout dengan data produk yang dipilih dan total harga
        return view('checkout.index', compact('cartItems', 'totalPrice'));
    }

    public function process(Request $request)
    {
        // Ambil data produk dari tabel cart berdasarkan user_id
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        // Simpan data produk sementara sebelum dihapus dari keranjang belanja
        $productsToRestore = $cartItems->map(function ($cartItem) {
            return [
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
            ];
        });

        // Hitung total harga produk yang dipilih
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->getDiscountedPrice() * $cartItem->quantity;
        });

        // Simpan data pesanan ke dalam tabel orders
        $order = Orders::create([
            'customer_id' => $userId,
            'order_date' => now(), // Tanggal pesanan dibuat
            'total_amount' => $totalPrice,
            'status' => 'Proses', // Status pesanan
        ]);

        // Hapus semua item dalam keranjang belanja yang terkait dengan pengguna yang saat ini login
        Cart::where('user_id', $userId)->delete();

        // Restore data produk ke dalam keranjang belanja setelah pesanan dibuat
        foreach ($productsToRestore as $product) {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ]);
        }

        // Redirect pengguna ke halaman beranda atau halaman terima kasih
        return redirect()->route('checkout.index')->with([
            'success' => 'Order successfully made! Please kindly continue to payment :)',
            'order_id' => $order->id
        ]);
    }
}

