<link rel="stylesheet" href="css/formpayment.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Payment Form</h3>
			</div>
			<div class="card-body">
			<form action='/insertformpayment' method="POST" id="frmPay">
                  @csrf
                     <div class="mb-3 ms-3 me-3">
                        <label for="orderid"class="form-label">Order id</label>
                        <br>
                        <select name="order_id" id="order_id" class="form-control">
                            <option value="">
                                @foreach($order as $o)
                                <option value="{{ $o->id }}">{{ $o->id }}</option>
                                @endforeach
                            </option>
                        </select>
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="date"class="form-label">Payment date</label>
                        <input type="date" id="payment_date" name="payment_date" class="form-control" placeholder="Enter Your date" aria-label="date">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="payment_method"class="form-label">Payment Method</label>
                        <select class="form-control" aria-label="Default select example" id="payment_method" name="payment_method" >
                        <!-- <option selected>Chose your payment_method</option> -->
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
</select>
                    </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="amount"class="form-label">Amount</label>
                        <input type="text" id="amount" name="amount" class="form-control" placeholder="Enter Your amount" aria-label="amount">
                     </div>
                     <div class="row ms-3 me-3 justify-content-end">
                        <div class="col-3">
                        <button type="submit" class="btn btn-primary" id="save">Save</button>
                    </div>
                    </div>
          </div>
          </div> 
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>