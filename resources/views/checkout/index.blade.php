<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Veggies Friends</title>
    <link rel="icon" type="image/x-icon" href="assets/veggies_friends.png" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        /* General text color */
        body, p, h1, h2, h3, h4, h5, h6, a {
            color: white !important;
        }

        /* Product image styling */
        .product-image {
            max-width: 100px;
            max-height: 100px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
        }

        /* Total price styling */
        #totalPrice {
            text-align: right;
            margin-top: 20px;
        }

        /* Make Order button styling */
        #makeOrderButton {
            display: block;
            margin-top: 20px;
            text-align: right;
        }

        .form-label {
            width: 150px; /* Label width */
            display: inline-block;
        }

        .form-control {
            width: calc(100% - 160px); /* Input width */
            display: inline-block;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-primary mb-3">Help to fulfill your needs & make your life healthier</span>
            <span class="site-heading-lower">Veggies Friends</span>
        </h1>
    </header>
    <section>
        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Checkout Section -->
        <div class="untree_co-section before-footer-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div id="checkoutItems">
                            <!-- Items will be appended here by JavaScript -->
                        </div>
                        <div id="totalPrice"></div> <!-- Container for total price -->
                        <div class="col-md-6">
                            <form action="{{ route('checkout.process') }}" method="POST">
                                @csrf
                                <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                                <button type="submit" class="btn btn-outline-success" id="makeOrderButton">Make Orders Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="card-body">
            <form action='/storecheckout' method="POST" id="frmPay">
                @csrf
                <div class="mb-3 ms-3 me-3">
                    <label for="order_id" class="form-label">Order ID</label>
                    <select name="order_id" id="order_id" class="form-control">
                        <option value="" disabled selected>Select Order ID</option>
                        @foreach($idorders as $o)
                            <option value="{{ $o->id }}" {{ $loop->last ? 'selected' : '' }}>{{ $o->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 ms-3 me-3">
                    <label for="payment_date" class="form-label">Payment Date</label>
                    <input type="date" id="payment_date" name="payment_date" class="form-control" value="{{ date('Y-m-d') }}">
                </div>
                <div class="form-group mb-3 ms-3 me-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select class="form-control" id="payment_method" name="payment_method" required onchange="toggleTransferForm()">
                        <option value="" disabled selected>Select Payment Method</option>
                        <option value="Transfer">Transfer</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>
                <div id="transfer_form" class="form-group mb-3 ms-3 me-3" style="display: none;">
                    <label for="transfer_details" class="form-label">Card Number</label>
                    <input type="number" class="form-control" id="transfer_details" name="transfer_details" placeholder="Card Number">
                </div>
                <div class="mb-3 ms-3 me-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" id="amount" name="amount" class="form-control" readonly>
                </div>
                <div class="row ms-3 me-3 justify-content-end">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" id="save">Pay Now!</button>
                    </div>
                </div>
            </form>
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
            const checkoutItems = JSON.parse(localStorage.getItem('selectedItems'));
            const checkoutContainer = document.getElementById('checkoutItems');
            const totalPriceContainer = document.getElementById('totalPrice');
            const amountField = document.getElementById('amount');
            let totalPrice = 0;

            if (checkoutItems && checkoutItems.length > 0) {
                const table = document.createElement('table');
                const tableHeader = `
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                `;
                table.innerHTML = tableHeader;

                checkoutItems.forEach(function (item) {
                    const itemElement = document.createElement('tr');
                    const totalPerItem = item.price * item.quantity;
                    totalPrice += totalPerItem;

                    itemElement.innerHTML = `
                        <td>${item.product_name}</td>
                        <td>Rp${item.price.toLocaleString('id-ID')}</td>
                        <td>${item.quantity}</td>
                        <td>Rp${totalPerItem.toLocaleString('id-ID')}</td>
                    `;

                    table.appendChild(itemElement);
                });

                checkoutContainer.appendChild(table);
                totalPriceContainer.innerHTML = `<strong>Total Price: Rp${totalPrice.toLocaleString('id-ID')}</strong>`;
                amountField.value = totalPrice;
            } else {
                checkoutContainer.innerHTML = '<p>No items selected.</p>';
            }
        });

        function toggleTransferForm() {
            const paymentMethod = document.getElementById("payment_method").value;
            const transferForm = document.getElementById("transfer_form");

            if (paymentMethod === "Transfer") {
                transferForm.style.display = "block";
            } else {
                transferForm.style.display = "none";
            }
        }
        
    </script>
</body>
</html>
