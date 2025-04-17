<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
        #whislist {
            background-color: #f5f5dc; /* Warna coklat muda */
        }
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
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
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
        <!-- Wishlist Section -->
        <section class="page-section" id="wishlist">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" style="color: white;">Your WishList</h2>
                </div>
                <table class="table table-hover table-bordered table-stripped" id="whislist">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Action</th>
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
                            <td>
                                <!-- The Logic For Displaying Discount Price -->
                        <!-- We use the number_format() function to format the prices with 2 decimal places. -->
                        <p class="card-text">
                            @if ($wishlistProduct->products->discounts->isNotEmpty())
                                @foreach ($wishlistProduct->products->discounts as $discount)
                                    <span class="badge bg-danger">{{ $discount->percentage }}% Off</span>
                                    <del class="text-muted">Rp{{ number_format($wishlistProduct->products->price, 0) }}</del>
                                    <span class="discounted-price">Rp{{ number_format($wishlistProduct->products->price - ($wishlistProduct->products->price * $discount->percentage / 100), 0) }}</span>
                                @endforeach
                            @else
                                <span class="price">Rp{{ number_format($wishlistProduct->products->price, 0) }}</span>
                            @endif
                        </p>
                        <!-- End Logic For Displaying Discount Price -->
                            </td>
                            <td> <a href="/hapuswishlistslp/{{$wishlistProduct->id}}" class="btn btn-danger btn btn-outline-primar btn-sm">Remove</a>
                            <div class="d-inline-block">
                            <a href="{{ route('singleproduct.show', ['id' => $wishlistProduct->products->id]) }}" class="btn btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div></td>
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