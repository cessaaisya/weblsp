<!-- resources/views/homecessa.blade.php -->
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
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-primary mb-3">Help to fulfill your needs & make your life healthier</span>
            <span class="site-heading-lower">Veggies Friends</span>
        </h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/">Home</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/productrevlp">Review</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/productview">Products</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/wishlistslp">Wishlist</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/customer/login">Login</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/customer/register">Register</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/dashboard">DB</a></li>
                    <li class="nav-item">
                    <a class="nav-link" href="/cart" id="cartIcon">
                        <i class="bi-cart-fill"></i>
                        Cart
                    </a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section clearfix">
        <div class="container">
            <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('storage/' . $content->image) }}" style="width:
            620px; height:500px;" alt="..." />
                <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper">{{ $content->title }}</span>
                        <span class="section-heading-lower">{{ $content->subtitle }}</span>
                    </h2>
                    <p class="mb-3">{{ $content->description }}</p>
                    <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="https://wa.link/6o3d2p">Chat Admin</a></div>
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
        <div class="container"><p class="m-0 small">Copyright &copy; </p></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
