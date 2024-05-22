<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register - Veggies&Friends</title>

    <!-- Custom fonts for this template-->
    <link href="/styledashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/styledashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">REGISTER CUSTOMER</h1>
                            </div>
                            <form action="{{ route('register.register') }}" method="POST" id="register">
        @csrf
        <div class="field">
            <input type="text" name="name" class="form-control" id="name" placeholder="Asma Nabila" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <div class="field">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <div class="field">
            <input type="password" name="password" class="form-control" id="password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <div class="field">
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <div class="field">
            <input type="text" name="address1" class="form-control" id="address1" placeholder="Address 1" required>
            @error('address1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <div class="field">
            <input type="text" name="address2" class="form-control" id="address2" placeholder="Address 2 (optional)">
            @error('address2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <div class="field">
            <input type="text" name="address3" class="form-control" id="address3" placeholder="Address 3 (optional)">
            @error('address3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br>
        <button type="submit" class="btn btn-primary">Register</button>
        <div class="link">
            Already have an account?
            <a href="/login">Login Now</a>
        </div>
        <div class="link">
            Common User?
            <a href="/">Enter Home Page</a>
        </div>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>