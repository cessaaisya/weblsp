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
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/intro1.jpeg" alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Veggies & Fruits needs</span>
                            <span class="section-heading-lower">Fresh Everyday</span>
                        </h2>
                        <p class="mb-3">Every bag of vegetables and fruits start with locally sourced. We serve you the best quality in town, no more left-over #Veggiess&Fruits - we guarantee it!</p>
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Visit Us Today!</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Our Promise</span>
                                <span class="section-heading-lower">To You</span>
                            </h2>
                            <p class="mb-0">We are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products with the highest quality. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
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
// Ambil elemen ikon keranjang
var cartIcon = document.getElementById('cartIcon');

// Ambil elemen sidebar
var sidebar = document.getElementById('sidebar');

// Tambahkan event listener untuk klik pada ikon keranjang
cartIcon.addEventListener('click', function(event) {
    // Mencegah perilaku default dari tautan
    event.preventDefault();

    // Cek apakah sidebar sedang aktif
    var isSidebarActive = sidebar.classList.contains('active');

    // Toggle class 'active' pada sidebar untuk menampilkan atau menyembunyikannya
    sidebar.classList.toggle('active', !isSidebarActive);

    // Jika sidebar tidak aktif, bersihkan daftar barang dan tampilkan kembali
    if (!isSidebarActive) {
        clearCartList();
        populateCartList();
    }
});

// Fungsi untuk menambahkan item ke sidebar list barang
function addItemToCartList(itemName) {
    // Buat elemen list item baru
    var listItem = document.createElement('li');
    listItem.textContent = itemName;
    
    // Masukkan elemen list item ke dalam sidebar list barang
    var cartItemList = document.getElementById('cartItemList');
    cartItemList.appendChild(listItem);
}

// Fungsi untuk menampilkan daftar barang yang telah ditambahkan ke keranjang
function populateCartList() {
    // Ambil semua tombol "Add to Cart"
    var addToCartButtons = document.querySelectorAll('.addToCartBtn');

    // Tampilkan daftar barang yang telah ditambahkan ke keranjang
    addToCartButtons.forEach(function(button) {
        var productId = button.dataset.productId;
        var itemName = "Product " + productId; // Ganti dengan nama produk yang sesuai dengan ID

        // Tambahkan item ke daftar barang di sidebar
        addItemToCartList(itemName);
    });
}

// Fungsi untuk membersihkan daftar barang di sidebar
function clearCartList() {
    var cartItemList = document.getElementById('cartItemList');
    cartItemList.innerHTML = ''; // Menghapus semua elemen di dalam daftar
}

// Fungsi untuk menampilkan daftar barang yang telah ditambahkan ke keranjang
function populateCartList() {
    // Ambil semua tombol "Add to Cart"
    var addToCartButtons = document.querySelectorAll('.addToCartBtn');

    // Tampilkan daftar barang yang telah ditambahkan ke keranjang
    addToCartButtons.forEach(function(button) {
        var productId = button.dataset.productId;
        
        // Cek apakah produk dengan ID ini sudah ada di daftar
        if (isProductInCart(productId)) {
            var itemName = "Product " + productId; // Ganti dengan nama produk yang sesuai dengan ID

            // Tambahkan item ke daftar barang di sidebar
            addItemToCartList(itemName);
        }
    });
}
// Fungsi untuk memeriksa apakah produk dengan ID tertentu sudah ada di keranjang
function isProductInCart(productId) {
    var cartItems = localStorage.getItem('cartItems');
    if (cartItems) {
        cartItems = JSON.parse(cartItems);
        return cartItems.includes(productId);
    }
    return false;
}
</script>

    </body>
</html>
