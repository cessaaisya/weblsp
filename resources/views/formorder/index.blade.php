<link rel="stylesheet" href="css/formorder.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js">
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Order Form</h5>
            <div class="table-responsive p-0">
                <div class="card border-2 m-4 pt-4">
                <form action='/insertformorder' method="POST" id="frmOrders">
                  @csrf
                    <div class="mb-3 ms-3 me-3">
                        <label for="customer_id" class="form-label">Customer Id</label>
                        <br>
                        <select name="customer_id" id="customer_id" class="form-control">
                            <option value="">
                                @foreach($customer as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </option>
                        </select>
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="date" class="form-label">Order Date</label>
                        <input type="date" id="order_date" name="order_date" class="form-control" placeholder="Enter Your date" aria-label="date">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="total"class="form-label">Total Amount</label>
                        <input type="text" id="total_amount" name="total_amount" class="form-control" placeholder="Enter Your total amount" aria-label="total">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="status"class="form-label">Status</label>
                        <input type="text" id="status" name="status" class="form-control" placeholder="Enter Your status" aria-label="status">
                    </div>
                    <div class="row ms-3 me-3 justify-content-end">
                        <div class="col-3">
                        <button type="submit" class="btn btn-primary" id="save">Save</button>
                    </div>
                    </div>
          </div>
          </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
