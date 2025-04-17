<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .nav-item a {
            color: white;
        }
        .form-label,
        .form-control {
            color: white;
        }
        .form-control {
            background-color: #343a40;
            border: 1px solid #495057;
        }
        .form-control option {
            color: black;
        }
        .page-title {
            text-align: center;
            color: white;
            margin-top: 20px;
            font-size: 2rem;
        }
        .rating-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin: 1rem 3rem;
        }
        .rating {
            display: flex;
            direction: rtl;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
        }
        .rating input:checked ~ label {
            color: #ffc107;
        }
        .rating label:hover,
        .rating label:hover ~ label {
            color: #ffc107;
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
                    <!-- Add cart icon -->
                    <li class="nav-item">
                        <a class="nav-link" href="/cart" id="cartIcon">
                            <i class="bi-cart-fill"></i>
                            Cart
                        </a>
                    </li>
                    <!-- End cart icon -->
                    <li class="nav-item px-lg-4">
                        <a class="dropdown-item" href="#">
                            @if(Auth::check())
                                <p>{{ Auth::User()->name }} - Customer</p>
                            @else
                                <p>Guest</p>
                            @endif
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logoutcustomer') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-white">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section clearfix">
        <h2 class="page-title">Product Reviews</h2>
        <!-- FORM -->
        <form action='/insertproductrevlp' method="POST" id="frmprodrev">
            @csrf
            <div class="mb-3 ms-3 me-3">
                <label for="customer_id" class="form-label">Customer</label>
                <input type="text" id="customer_name" class="form-control" value="{{ $customer ? $customer->name : 'Guest' }}" readonly>
                <input type="hidden" name="customer_id" value="{{ $customer ? $customer->id : '' }}">
            </div>
            <div class="mb-3 ms-3 me-3">
                <label for="product_id" class="form-label">Product</label>
                <br>
                <select name="product_id" id="product_id" class="form-control">
                    <option value="">
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </option>
                </select>
            </div>
            <div class="rating-container mb-3 ms-3 me-3"><br><br>
        <label for="rating" class="form-label">Rating</label><br><br>
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5" />
            <label for="star5" title="5 stars">&#9733;</label>
            <input type="radio" id="star4" name="rating" value="4" />
            <label for="star4" title="4 stars">&#9733;</label>
            <input type="radio" id="star3" name="rating" value="3" />
            <label for="star3" title="3 stars">&#9733;</label>
            <input type="radio" id="star2" name="rating" value="2" />
            <label for="star2" title="2 stars">&#9733;</label>
            <input type="radio" id="star1" name="rating" value="1" />
            <label for="star1" title="1 star">&#9733;</label>
        </div>
    </div>
            <div class="mb-3 ms-3 me-3">
                <label for="comment" class="form-label">Comment</label>
                <input type="text" id="comment" name="comment" class="form-control" placeholder="Enter Your comment" aria-label="comment">
            </div>
            <div class="row ms-3 me-3 justify-content-end">
                <div class="col-3">
                    <button type="submit" class="btn btn-primary" id="save">Save</button>
                    <a href="{{ route('productrevlp.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
        <!-- END FORM -->
        <!-- Product Reviews -->
        <div class="mt-4 ms-3 me-3" style="color: white;">
            <h3 class="mb-3">Existing Reviews</h3>
            @if($productReviews->count() > 0)
            <div style="border-bottom: 1px solid white;">
                @foreach($productReviews as $review)
                <div style="margin-bottom: 20px;">
                    <p><strong>Customer:</strong> {{ $review->customer->name }}</p>
                    <p><strong>Product:</strong> {{ $review->product->product_name }}</p>
                    <p><strong>Rating:</strong> {{ str_repeat('⭐', $review->rating) }}</p>
                    <p><strong>Comment:</strong> {{ $review->comment }}</p>
                </div>
                @unless($loop->last)
                <hr style="border-top: 1px solid white;">
                @endunless
                @endforeach
            </div>
            @else
            <p>No reviews available.</p>
            @endif
        </div>
        <!-- End Product Reviews -->
    </section>
    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small">Copyright &copy; Veggies Friends 2024</p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const rating = document.querySelectorAll('input[name="rating"]');
            rating.forEach((input) => {
                input.addEventListener('change', (event) => {
                    console.log(`Rating selected: ${event.target.value}`);
                    // You can store the rating value in a hidden field or send it to the server using an AJAX request
                });
            });
        });
    </script>
</body>
</html>
