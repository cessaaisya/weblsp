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
            overflow-x: auto;
            white-space: nowrap;
        }
        .product-images img {
            width: 200px;
            height: 200px; 
            object-fit: cover; /* Gambar akan mengisi kotak tanpa mempertahankan aspek rasio */
        }
        .product-info {
            color: white !important; /* Menggunakan !important untuk memastikan warna diterapkan */
}
        .product-info {
            color: white !important; /* Menggunakan !important untuk memastikan warna diterapkan */
            flex: 1;
            text-align: left;
            
        }
        
</style>


    <!-- My style -->

    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/main.css"/>

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
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.html">Store</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/wishlistslp">Wishlist</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/login">Login</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/register">Register</a></li>
                        <li class="nav-item px-lg-4">
    <a class="dropdown-item" href="#">
        @if(Auth::check())
            <p style="color: white !important;">{{ Auth::User()->name }} - Customer</p>
        @else
            <p style="color: white !important;">Guest</p>
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
            <!-- Single Product -->
    <body>
    <div class="container">
        <div class="product-detail">
            <div class="product-images">
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @if($product->image1_url)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $product->image1_url) }}" alt="{{ $product->product_name }}" class="product-image">
                            </div>
                        @endif
                        @if($product->image2_url)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $product->image2_url) }}" alt="{{ $product->product_name }}" class="product-image">
                            </div>
                        @endif
                        @if($product->image3_url)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $product->image3_url) }}" alt="{{ $product->product_name }}" class="product-image">
                            </div>
                        @endif
                        @if($product->image4_url)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $product->image4_url) }}" alt="{{ $product->product_name }}" class="product-image">
                            </div>
                        @endif
                        @if($product->image5_url)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $product->image5_url) }}" alt="{{ $product->product_name }}" class="product-image">
                            </div>
                        @endif
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="product-info" style="color: white;">
            <h1 style="color: white !important;">{{ $product->product_name }}</h1>
    <p style="color: white !important;">{{ $product->description }}</p>
    <p style="color: white !important;">Price: Rp{{ $product->price }}</p>
    <p style="color: white !important;">Stock: {{ $product->stok_quantity }}</p>
            </div>
        </div>
    </div>
    
    <!-- End Single Product -->

        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>
