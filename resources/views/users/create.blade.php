<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Veggies&Friends</title>

    <!-- Custom fonts for this template-->
    <link href="/styledashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/styledashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-0">Veggies&Friends</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User Interface
            </div>

            <!-- Nav Item - Users -->
            <li class="nav-item active">
                <a class="nav-link" href="users">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Categories
            </div>

            <!-- Nav Item - Product Categories -->
            <li class="nav-item">
                <a class="nav-link" href="productcategories">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Product Categories</span></a>
            </li>

            <!-- Nav Item - Discount Categories -->
            <li class="nav-item">
                <a class="nav-link" href="discountcategories">
                    <i class="fas fa-fw fa-percent"></i>
                    <span>Discount Categories</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Buy
            </div>
            <!-- Nav Item - Orders -->
            <li class="nav-item">
                <a class="nav-link" href="orders">
                <i class="fas fa-fw fa-clipboard"></i>
                    <span>Orders</span></a>
            </li>
            <!-- Nav Item - Customers -->
            <li class="nav-item">
                <a class="nav-link" href="customers">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Customers</span></a>
            </li>
            <!-- Nav Item - Payments -->
            <li class="nav-item">
                <a class="nav-link" href="payments">
                    <i class="fas fa-fw fa-wallet"></i>
                    <span>Payments</span></a>
            </li>
            <!-- Nav Item - Order Details -->
            <li class="nav-item">
                <a class="nav-link" href="orderdetails">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Order Details</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>
            <!-- Nav Item - Deliveries -->
            <li class="nav-item">
                <a class="nav-link" href="deliveries">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Deliveries</span></a>
            </li>
            <!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="products">
                    <i class="fas fa-fw fa-fax"></i>
                    <span>Products</span></a>
            </li>
            <!-- Nav Item - Discounts -->
            <li class="nav-item">
                <a class="nav-link" href="discounts">
                    <i class="fas fa-fw fa-percent"></i>
                    <span>Discounts</span></a>
            </li>
            <!-- Nav Item - Product Reviews -->
            <li class="nav-item">
                <a class="nav-link" href="productreviews">
                <i class="fas fa-fw fa-certificate"></i>
                    <span>Product Reviews</span></a>
            </li>
            <!-- Nav Item - Wishlist -->
            <li class="nav-item">
                <a class="nav-link" href="wishlists">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Wishlist</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} 
                                <br><img class="img-profile rounded-circle"
                                    src="/styledashboard/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                {{ Auth::user()->name }} - {{ Auth::user()->roles }}
                                </a>
                                <a><hr class="dropdown-divider" /></a>
                        <a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                            </div>
                        </a>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>
                            <div class="card mb-4">
                            <div class="card-header pb-0">
                            <a class="btn btn-primary" href="{{ route('users.create')}}" role="button">Add New Item</a>
                            <br><br>
                    <!-- Table -->
 <div class="container-fluid py-1">
      <div class="row">
        <div class="col-12">
          <div class="card mb-6">
            <div class="card-header pb-2">
              <h6>Form User</h6>
            </div>
            <!-- <div class="card-body px-0 pt-0 pb-2"> -->

            <!-- FORM -->
              <div class="table-responsive p-0">
                <div class="card border-2 m-4 pt-4">
                <form action='/insertdata' method="POST" id="frmUser">
                  @csrf
                    <div class="mb-3 ms-3 me-3">
                        <label for="name" class="form-label">User's Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="enter your name" aria-label="password">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="email"class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="enter your email" aria-label="name">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="password"class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="enter your password" aria-label="name">
                     </div>
                     <div class="mb-3 ms-3 me-3">
                      <label for="roles" class="form-label">Roles</label>
                      <select class="form-select" aria-label="Default select example" id="roles" name="roles" >
                        <!-- <option selected>Chose your roles</option> -->
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                      </select>
                     </div>
                     <div class="mb-3 ms-3 me-3">
                        <label for="aktif"class="form-label">Active</label>
                        <input type="aktif" id="aktif" name="aktif" class="form-control" placeholder="enter your activity" aria-label="name">
                     </div>
                     <div class="row ms-3 me-3 justify-content-end">
                        <div class="col-3">
                        <button type="submit" class="btn btn-primary" id="save">Save</button>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                    </div>
          </div>
          </div> 

        <!-- END FORM -->

      <!-- End Table -->
                </div>
            </div>
        </div>
    </div>
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/styledashboard/vendor/jquery/jquery.min.js"></script>
    <script src="/styledashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/styledashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/styledashboard/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/styledashboard/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/styledashboard/js/demo/chart-area-demo.js"></script>
    <script src="/styledashboard/js/demo/chart-pie-demo.js"></script>

</body>

</html>