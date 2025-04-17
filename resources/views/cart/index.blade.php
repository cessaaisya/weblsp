<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your styles and metadata here -->
</head>
<body>
    <header>
    <style>
        .nav-item a {
            color: white;
        }

        .table th, .table td, .table thead th {
            color: white;
        }

        .table .btn {
            color: white;
        }

        .text-black {
            color: white !important;
        }

        .btn-outline-secondary {
            color: white;
            border-color: white;
        }

        .btn-outline-secondary:hover {
            background-color: white;
            color: black;
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
        <!-- Your navigation code here -->
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
                                        <th>Select</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalBelanja = 0;
                                    @endphp
                                    @foreach ($cartItems as $cartItem)
                                        @php
                                            $totalPerItem = $cartItem['product']->getDiscountedPrice() * $cartItem['quantity'];
                                            $totalBelanja += $totalPerItem;
                                        @endphp
                                        <tr class="product-row">
                                            <td>
                                                <input type="checkbox" class="select-item">
                                            </td>
                                            <!-- Add hidden product ID -->
                                            <td class="product-id" style="display: none;">{{ $cartItem->id }}</td>
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
                                                <span class="quantity-display">{{ $cartItem['quantity'] }}</span>
                                            </td>
                                            <td class="product-total">Rp{{ $totalPerItem }}</td>
                                            <td>
                                                <a href="/hapuscart/{{ $cartItem->id }}" class="btn btn-danger btn-sm">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-5 btn-group-custom d-flex justify-content-between">
                                    <a href="/productview" class="btn btn-success flex-grow-1">Back To Shop</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-end">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12 text-white h4 border-bottom mb-3">Cart Totals</div>
                                        </div>
                                        <!-- Total Belanja -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <span class="text-white">shopping total</span>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <strong class="text-white" id="totalBelanja">Rp{{ $totalBelanja }}</strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="/checkout" class="btn btn-outline-info btn-lg py-3 btn-block">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-faded text-center py-5">
        <div class="container"><p class="m-0 small">Copyright &copy; Veggies&Friends 2024</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.select-item');
            const totalBelanjaElement = document.getElementById('totalBelanja');
            let selectedItems = [];

            function calculateTotal() {
                let totalBelanja = selectedItems.reduce((total, item) => {
                    return total + parseFloat(item.total.replace(/,/g, ''));
                }, 0);

                totalBelanjaElement.innerText = 'Rp' + totalBelanja.toLocaleString('id-ID');
            }

            checkboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function () {
                    const row = checkbox.closest('.product-row');
                    const product = {
                        id: row.querySelector('.product-id').innerText,
                        product_name: row.querySelector('.product-name').innerText,
                        price: row.querySelector('.product-price').innerText.replace('Rp', '').replace(/,/g, ''),
                        quantity: row.querySelector('.quantity-display').innerText,
                        total: row.querySelector('.product-total').innerText.replace('Rp', '').replace(/,/g, ''),
                    };

                    if (checkbox.checked) {
                        selectedItems.push(product);
                    } else {
                        const itemIndex = selectedItems.findIndex(item => item.id === product.id);
                        selectedItems.splice(itemIndex, 1);
                    }

                    calculateTotal();
                    localStorage.setItem('selectedItems', JSON.stringify(selectedItems));
                });
            });
        });
    </script>
</body>
</html>