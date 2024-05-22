<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
        #whislist {
            background-color: #f5f5dc; /* Warna coklat muda */
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
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.html">Products</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.html">Store</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/login">Login</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/register">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Wishlist Section -->
        <section class="page-section" id="wishlist">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">WishList</h2>
                    <h3 class="section-subheading text-muted">Berikut adalah Product Favorite Oleh pelanggan yang pernah berkunjung atau menggunakan website ini.</h3>
                </div>
                <table class="table table-hover table-bordered table-stripped" id="whislist">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Product</th>
                        <th>Image</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlistProducts as $idx => $wishlistProduct)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td>{{ $wishlistProduct->products->product_name ?? 'Product Not Found' }}</td>
                            <td>
                                @if($wishlistProduct->products && $wishlistProduct->products->image1_url)
                                    <img src="{{ asset('storage/' . $wishlistProduct->products->image1_url) }}"
                                        alt="{{ $wishlistProduct->products->product_name }}" style="width: 300px; height: 250px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $wishlistProduct->products->price ?? 'Price Not Found' }}</td>
                        </tr>
                    @endforeach
                </tbody>
        <footer class="footer text-faded text-center py-5">
            
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>