<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Wishlists;
use App\Models\Products;

class WishlistslpController extends Controller
{
    public function index(Request $request)
{
    // Ambil data produk dari wishlist pengguna yang saat ini login
    $wishlistProducts = Wishlists::where('customer_id', Auth::id())
        ->with('products') // Pastikan untuk mengambil data produk yang terkait dengan setiap wishlist
        ->get();

    // Inisialisasi variabel untuk menyimpan total harga diskon
    $totalDiscountedPrice = 0;

    // Iterasi setiap produk dalam wishlist untuk menghitung total harga diskon
    foreach ($wishlistProducts as $wishlistProduct) {
        // Periksa apakah produk memiliki diskon
        if ($wishlistProduct->products->discount_percentage > 0) {
            // Hitung harga diskon
            $discountedPrice = $wishlistProduct->products->price - ($wishlistProduct->products->price * $wishlistProduct->products->discount_percentage / 100);
            // Tambahkan harga diskon ke total harga diskon
            $totalDiscountedPrice += $discountedPrice;
        } else {
            // Jika produk tidak memiliki diskon, tambahkan harga normal ke total harga diskon
            $totalDiscountedPrice += $wishlistProduct->products->price;
        }
    }

    // Hitung jumlah produk dalam wishlist
    $wishlistCount = $wishlistProducts->count();

    // Kirimkan total harga diskon ke view
    return view('wishlistslp.index', compact('wishlistProducts', 'wishlistCount', 'totalDiscountedPrice'));
}


public function addToWishlist(Request $request)
{
    // Validasi request
    $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);

    // Cek apakah pengguna sudah login
    if (Auth::check()) {
        // Cek apakah produk sudah ada di wishlist pengguna
        $existingWishlist = Wishlists::where('customer_id', Auth::id())
            ->where('product_id', $request->input('product_id'))
            ->first();

        // Jika produk belum ada di wishlist, tambahkan ke dalam wishlist
        if (!$existingWishlist) {
        $wishlist = new Wishlists();
            $wishlist->customer_id = Auth::id();
            $wishlist->product_id = $request->input('product_id');
            $wishlist->save();
        }

        // Redirect ke halaman wishlist dengan menyertakan product_id
        return redirect()->route('wishlistslp.index')->with('product_id', $request->input('product_id'));
    } else {
        return redirect()->route('login')->with('error', 'Please login to add product to wishlist.');
    }
}




public function destroy($id)
{
    // Temukan dan hapus item wishlist berdasarkan ID
    $wishlistItem = Wishlists::findOrFail($id);

    // Pastikan item wishlist milik pengguna yang saat ini login
    if ($wishlistItem->customer_id === Auth::id()) {
        $wishlistItem->delete();
        return redirect()->route('wishlist-product.index')->with('success', 'Product has been removed from wishlist.');
    } else {
        return redirect()->route('wishlist-product.index')->with('error', 'You are not authorized to delete this item.');
    }
}

}