
<link rel="stylesheet" href="css/formcust.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <img src="../assets/veggies friends.png" class="logo">
                    </div>
					<h4 font-family="Times New Roman" class="text-center">Customer Form</h4>
                    <div class="row px-3 justify-content-center mt-4 mb-4 border-line">
                        <img src="../assets/img/bg1.jpeg" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-2 py-2">
				<form action='/insertformcust' method="POST" id="frmCust">
                  @csrf
                    <div class="mb-3 ms-3 me-3">
                        <label for="name" class="form-label">Customer's Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" aria-label="name">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="email"class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email" aria-label="email">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="password"class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password" aria-label="password">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="phone"class="form-label">phone</label>
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter Your Phone" aria-label="phone">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="address1"class="form-label">1st Address</label>
                        <input type="address1" id="address1" name="address1" class="form-control" placeholder="Enter Your Address1" aria-label="address1">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="address2"class="form-label">2nd Address</label>
                        <input type="address2" id="address2" name="address2" class="form-control" placeholder="Enter Your Address2" aria-label="address2">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="address3"class="form-label">3rd Address</label>
                        <input type="address3" id="address3" name="address3" class="form-control" placeholder="Enter Your Address3" aria-label="address3">
                     </div>
                     <div class="row ms-3 me-3 justify-content-end">
                        <div class="col-3">
                        <button type="submit" class="btn btn-primary" id="save">Save</button>
                        <a href="/" class="btn btn-danger">Cancel</a>
                    </div>
                    </div>
          </div>
        
        </div>
    </div>
</div>