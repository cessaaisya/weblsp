<link rel="stylesheet" href="../css/formwishlist.css" />
<link rel="stylesheet" href="../css/styles.css" />

<div class="loginBox"> <img class="user" src="../assets/veggies friends.png" height="100px" width="100px">
        <h3>Wishlist Form</h3>
        <form action='/insertformwishlist' method="POST" id="frmwish">
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
                     <label for="product_id" class="form-label">Product Id</label>
                        <br>
                        <select name="product_id" id="product_id" class="form-control">
                            <option value="Choose Product">
                                @foreach($product as $p)
                                <option value="{{ $p->id }}">{{ $p->product_name }}</option>
                                @endforeach
                            </option>
                        </select>
                     </div>
                     <div class="row ms-3 me-3 justify-content-end">
                        <div class="col-3">
                        <button type="submit" class="btn btn-primary" id="save">Save</button>
                    </div>
                    </div>
          </div>
          </div> 
        </form> 
        <div class="text-center">
            <p style="color: #59238F;">Sign-Up</p>
        </div>
        
    </div>