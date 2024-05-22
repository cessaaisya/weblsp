<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
        .nav-item a {
            color: white;
        }
    </style>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Veggies Friends</title>
        <link rel="icon" type="image/x-icon" href="assets/veggies friends.png" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Help to fulfill your needs & make your life healthier</span>
                <span class="site-heading-lower">Veggies Friends</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.html">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.html">About</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/productview">Products</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/wishlistslp">Wishlist</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/login">Login</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/register">Register</a></li>
                        <li class="nav-item px-lg-4"><a class="dropdown-item" href="#">
                        @if(Auth::check())
                            <p>{{ Auth::User()->name }} - Customer</p>
                        @else
                            <p>Guest</p>
                        @endif        
                            </a>
                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item text-white">Logout</button>
                                                </form>
                                            </li>
</li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
            <!-- Cart Section -->
<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($cartItems as $cartItem)
                                    <tr class="product-row">
                                        <td class="product-thumbnail">
                                            @if ($cartItem['product']->image1_url)
                                                <img src="{{ asset('storage/' . $cartItem['product']->image1_url) }}" alt="{{ $cartItem['product']->product_name }}" style="width: 100px; height: auto;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td class="product-name">{{ $cartItem['product']->product_name }}</td>
                                        <td class="product-price">Rp{{ $cartItem['product']->getDiscountedPrice() }}</td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary decrease" type="button">&minus;</button>
                                                </div>
                                                <input type="number" value="{{ $cartItem['quantity'] }}" class="form-control text-center quantity cart-update" data-price="{{ $cartItem['product']->price }}" />
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary increase" type="button" data-price="{{ $cartItem['product']->price }}">&plus;</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-total">
                                            {{-- Rp{{ $cartItem['product']->getDiscountedPrice() * $cartItem['quantity'] }} --}}
                                        </td>
                                        <td>
                                            <a href="/hapuscart/{{ $cartItem->id }}" class="btn btn-danger btn-sm">Remove</a>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                    </table>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5 btn-group-custom d-flex justify-content-between">
                        <a href ="/productview" class="btn btn-secondary flex-grow-1 me-2">Update Cart</a>
                        <a href ="/productview" class="btn btn-success flex-grow-1">Back To Shopping</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
    <div class="row justify-content-end">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 text-black h4 border-bottom mb-3">Cart Totals</div>
            </div>
            <!-- Total Belanja -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <span class="text-black">Total Belanja</span>
                </div>
                <div class="col-md-6 text-right">
                    <strong class="text-black" id="totalBelanja"></strong> <!-- ID unik untuk menampilkan total belanja -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="/bayarcheckout" class="btn btn-outline-info btn-lg py-3 btn-block">Proceed To Checkout</a>
                </div>
            </div>
        </div>
 </div>
</div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
        // Ambil elemen yang diperlukan
        const cartItemCountElement = document.getElementById('cartItemCount');
        const addToCartBtns = document.querySelectorAll('.addToCartBtn');
        const removeFromCartBtn = document.getElementById('removeFromCartBtn');

        // Mendapatkan nilai jumlah barang dari penyimpanan lokal saat halaman dimuat
        let currentCount = localStorage.getItem('cartItemCount');
        if (!currentCount) {
            currentCount = 0;
        }
        cartItemCountElement.innerText = currentCount;

        // Fungsi untuk menambahkan item ke keranjang
        function addToCart() {
            // Tambahkan 1 ke nilai saat ini
            currentCount++;
            // Update teks badge dengan nilai yang baru
            cartItemCountElement.innerText = currentCount;
            // Simpan nilai jumlah barang ke penyimpanan lokal
            localStorage.setItem('cartItemCount', currentCount);

            // Tampilkan notifikasi
            showNotification("Barang berhasil ditambahkan ke keranjang");
        }

        // Fungsi untuk mengurangi item dari keranjang
        function removeFromCart() {
            // Pastikan nilai tidak negatif
            if (currentCount > 0) {
                // Kurangi 1 dari nilai saat ini
                currentCount--;
                // Update teks badge dengan nilai yang baru
                cartItemCountElement.innerText = currentCount;
                // Simpan nilai jumlah barang ke penyimpanan lokal
                localStorage.setItem('cartItemCount', currentCount);
            }
        }

        // Tambahkan event listener untuk setiap tombol "Add to Cart"
        addToCartBtns.forEach(btn => {
            btn.addEventListener('click', addToCart);
        });

        // Tambahkan event listener untuk tombol "Remove from Cart"
        removeFromCartBtn.addEventListener('click', removeFromCart);

        // Fungsi untuk menampilkan notifikasi
        function showNotification(message) {
            // Buat elemen notifikasi
            const notification = document.createElement('div');
            notification.classList.add('notification');
            notification.textContent = message;

            // Tambahkan notifikasi ke dalam dokumen
            document.body.appendChild(notification);

            // Hapus notifikasi setelah beberapa detik
            setTimeout(() => {
                notification.remove();
            }, 3000); // Hapus notifikasi setelah 3 detik (3000 milidetik)
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Function to save cart items in localStorage
            function saveCartItems(cartItems) {
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
            }

            // Function to get cart items from localStorage
            function getCartItems() {
                return JSON.parse(localStorage.getItem('cartItems')) || [];
            }

            // Function to add item to cart
            function addItemToCart(productId) {
                var cartItems = getCartItems();
                if (!cartItems.includes(productId)) {
                    cartItems.push(productId);
                    saveCartItems(cartItems);
                }
            }

            // Add event listeners to "Add to Cart" buttons
            var addToCartButtons = document.querySelectorAll('.addToCartBtn');
            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var productId = button.dataset.productId;
                    addItemToCart(productId);
                    alert('Product added to cart!');
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var addToCartButtons = document.querySelectorAll('.addToCartBtn');
            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var productId = button.dataset.productId;
                    addToCart(productId);
                });
            });

            function addToCart(productId) {
                var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                if (!cartItems.includes(productId)) {
                    cartItems.push(productId);
                }
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                alert('Product added to cart');
            }
        });
    </script>

<script>
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        if (query.length > 0) {
            // Send search request to server
            fetch(/search?q=${query})
                .then(response => response.json())
                .then(data => {
                    // Handle search results, for example, display them in a dropdown
                    console.log('Search results:', data);
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                });
        } else {
            // Clear search results or hide them
            console.log('Search query is empty');
        }
 });
</script>

    </body>
</html>
