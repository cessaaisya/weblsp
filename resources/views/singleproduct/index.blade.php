<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .nav-item a {
            color: white;
        }

        .single-product-content {
            background-color: #D2B48C; /* Warna coklat muda */
            padding: 20px;
            border-radius: 10px; /* Untuk memberikan sudut melengkung pada kotak */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .product-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-images {
            flex: 1;
            position: relative;
        }

        .product-images img {
            width: 100%; /* Gambar akan mengisi lebar kontainer */
            height: auto; /* Mengatur tinggi otomatis untuk mempertahankan aspek rasio */
            max-height: 500px; /* Atur tinggi maksimal gambar */
            display: none; /* Sembunyikan gambar awalnya */
            object-fit: cover; /* Gambar akan mengisi kotak tanpa mempertahankan aspek rasio */
        }

        .product-images img.active {
            display: block; /* Tampilkan gambar aktif */
        }

        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            font-size: 2em;
            cursor: pointer;
            padding: 0 10px;
        }

        .nav-arrow.left {
            left: 0;
        }

        .nav-arrow.right {
            right: 0;
        }

        .product-info {
            color: white !important; /* Menggunakan !important untuk memastikan warna diterapkan */
            flex: 1;
            text-align: left;
        }
    </style>

    <!-- My style -->
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/main.css" />

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
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/productrevlp">Review</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/productview">Products</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/wishlistslp">Wishlist</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/customer/login">Login</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/customer/register">Register</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/dashboard">DB</a></li>
                        <!-- Tambahkan ikon keranjang di sini -->
                        <li class="nav-item">
                        <a class="nav-link" href="/cart" id="cartIcon">
                            <i class="bi-cart-fill"></i>
                            Cart
                            <!-- <span class="badge bg-light text-black ms-1 rounded-pill" id="cartItemCount">0</span> -->
                        </a>
                    </li>
                    <!-- Akhir dari penambahan ikon keranjang -->
                        <li class="nav-item px-lg-4"><a class="dropdown-item" href="#">
                        @if(Auth::check())
                            <p>{{ Auth::User()->name }} - Customer</p>
                        @else
                            <p>Guest</p>
                        @endif        
                            </a>
                            <li>
                                                <form action="{{ route('logoutcustomer') }}" method="POST">
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
        <!-- Single Product -->
        <div class="container">
            <div class="product-detail">
                <div class="product-images" style="width:40px; height:500px;">
                    @if($product->image1_url)
                        <img src="{{ asset('storage/' . $product->image1_url) }}" alt="{{ $product->product_name }}" class="product-image active">
                    @endif
                    @if($product->image2_url)
                        <img src="{{ asset('storage/' . $product->image2_url) }}" alt="{{ $product->product_name }}" class="product-image">
                    @endif
                    @if($product->image3_url)
                        <img src="{{ asset('storage/' . $product->image3_url) }}" alt="{{ $product->product_name }}" class="product-image">
                    @endif
                    @if($product->image4_url)
                        <img src="{{ asset('storage/' . $product->image4_url) }}" alt="{{ $product->product_name }}" class="product-image">
                    @endif
                    @if($product->image5_url)
                        <img src="{{ asset('storage/' . $product->image5_url) }}" alt="{{ $product->product_name }}" class="product-image">
                    @endif
                    <button class="nav-arrow left" onclick="prevImage()">&#10094;</button>
                    <button class="nav-arrow right" onclick="nextImage()">&#10095;</button>
                </div>
                <div class="product-info">
                    <h1 style="color: white !important;">{{ $product->product_name }}</h1>
                    <p style="color: white !important;">{{ $product->description }}</p>
                    @if ($product->discounts->isNotEmpty())
                                    @foreach ($product->discounts as $discount)
                                        <span class="badge bg-danger">{{ $discount->percentage}}% Off</span>
                                        <del class="text-muted">Rp{{ $product->price, 0 }}</del>
                                        <span class="discounted-price">Rp{{ $product->price - ($product->price * $discount->percentage /100), 0}}</span>
                                    @endforeach
                                @else
                                  <span class="price">Price : Rp{{ number_format($product->price, 0) }}</span>
                      @endif
                    <p style="color: white !important;">Stock: {{ $product->stok_quantity }}</p>
                    <a href="/productview" class="btn btn-secondary" type="button" data-dismiss="modal">Back To Product</a>
                </div>
            </div>
        </div>
        <!-- End Single Product -->
    </section>
    <footer class="footer text-faded text-center py-5">
        <div class="container"><p class="m-0 small">Copyright &copy; Veggies&Friends 2024</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <!-- Image Navigation Script -->
    <script>
        let currentImageIndex = 0;
        const images = document.querySelectorAll('.product-image');

        function showImage(index) {
            images.forEach((img, i) => {
                img.classList.toggle('active', i === index);
            });
        }

        function nextImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            showImage(currentImageIndex);
        }

        function prevImage() {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            showImage(currentImageIndex);
        }
    </script>
</body>
</html>
