<!DOCTYPE html>
<html lang="en">
<head>
<style>
        .nav-item a {
            color: white;
        }
    </style>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ ('css/styles.css')}}" rel="stylesheet" />
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
                        <!-- Tambahkan ikon keranjang di sini -->
                        <li class="nav-item">
                        <a class="nav-link" href="/cart" id="cartIcon">
                            <i class="bi-cart-fill"></i>
                            Cart
                            <!-- <span class="badge bg-light text-black ms-1 rounded-pill" id="cartItemCount">0</span> -->
                        </a>
                    </li>
                    <!-- Akhir dari penambahan ikon keranjang -->
                    <li class="nav-item">
                    <!-- Search Bar
                        <form class="d-flex" id="searchForm">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
                        </form>
                    </li> -->
                </ul>
                <!-- Sidebar list barang -->
                <div id="sidebar" class="sidebar">
                    <ul id="cartItemList" class="cart-item-list">
                        <!-- List barang akan ditambahkan di sini secara dinamis menggunakan JavaScript -->
                    </ul>
                </div>
                <!-- Tambahkan tombol untuk mengurangi jumlah barang -->
                <!-- <li class="nav-item">
                    <button class="btn btn-danger" id="removeFromCartBtn">
                        <i class="bi bi-dash"></i>
                    </button>
                </li> -->
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
    
    <div class="container">
        @if ($products->isNotEmpty())
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="/single-product/{{ $product->id }}">
                        <div class="product-img-container">
                            <img class="card-img-top" style="width: 300px; height: 250px;" src="{{ asset('storage/' . $product->image1_url) }}" alt="{{ $product->product_name }}">
                        </div>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="/singleproduct/{{ $product->id }}">{{ $product->product_name }}</a></h5>

                        <!-- The Logic For Displaying Discount Price -->
                        <!-- We use the number_format() function to format the prices with 2 decimal places. -->
                        <p class="card-text">
                            @if ($product->discounts->isNotEmpty())
                                @foreach ($product->discounts as $discount)
                                    <span class="badge bg-danger">{{ $discount->percentage }}% Off</span>
                                    <del class="text-muted">Rp{{ number_format($product->price, 0) }}</del>
                                    <span class="discounted-price">Rp{{ number_format($product->price - ($product->price * $discount->percentage / 100), 0) }}</span>
                                @endforeach
                            @else
                                <span class="price">Rp{{ number_format($product->price, 0) }}</span>
                            @endif
                        </p>
                        <!-- End Logic For Displaying Discount Price -->

                        <!-- The Buttons in The Card -->
                        <a class="btn btn-success" href="https://wa.me/6281292284572" role="button">
                            Chat Seller
                        </a>
                        <a class="btn btn-primary" href="/formcustomer" role="button">
                            Buy Product
                        </a> <br>
                        <div class="d-inline-block">
                            <form method="post" action="{{ route('add-to-wishlist') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </form>
                        </div>
                        <div class="d-inline-block">
                            <!-- Tombol tambah ke keranjang -->
                            <form action="{{ route('cart.addToCart', $product->id) }}" method="POST" class="me-2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-warning">
                                                <i class="bi bi-cart-fill"></i> 
                                            </button>
                               </form>
                        </div>
                        <div class="d-inline-block">
                            <a href="{{ route('singleproduct.show', ['id' => $product->id]) }}" class="btn btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p>No products found</p>
        @endif
    </div>
    <!-- End of Main Content -->

    <footer class="footer text-faded text-center py-5">
        <div class="container"><p class="m-0 small">Copyright &copy; Veggies Friends 2023</p></div>
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
