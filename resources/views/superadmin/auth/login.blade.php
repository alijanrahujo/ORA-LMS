<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div class="home-btn d-none d-sm-block">
        <a href="index.html"><i class="fas fa-home h2 text-white"></i></a>
    </div>

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mb-0">

                        <div class="card-body p-4">

                            <div class="account-box">
                                <div class="account-logo-box">
                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="80">
                                        </a>
                                    </div>
                                    <h5 class="text-uppercase mb-1 mt-4">Sign In</h5>
                                    <p class="mb-0">Login to your Admin account</p>
                                </div>

                                <div class="account-content mt-4">
                                    <form class="form-horizontal" action="{{Route('superadmin.login')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="john@deo.com">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <a href="page-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                                                <label for="password">Password</label>
                                                <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">

                                                <div class="checkbox checkbox-success">
                                                    <input id="remember" type="checkbox" checked="">
                                                    <label for="remember">
                                                        Remember me
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row text-center mt-2">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <button type="button" class="btn mr-1 btn-facebook waves-effect waves-light">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button>
                                                <button type="button" class="btn mr-1 btn-googleplus waves-effect waves-light">
                                                    <i class="fab fa-google"></i>
                                                </button>
                                                <button type="button" class="btn mr-1 btn-twitter waves-effect waves-light">
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4 pt-2">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted mb-0">Don't have an account? <a href="page-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>

</body>

</html>
