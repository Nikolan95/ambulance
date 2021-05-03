<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Ambulance</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app-material.css') }}" rel="stylesheet" type="text/css" />

    </head>
    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 ">
                <div class="col-12 align-self-center">
                    <div class="text-center auth-logo-text">
                        <h4 class="mt-0 mb-3 mt-5">
                            <img src="{{ asset('images/ambulance-logo.png') }}" alt="logo-large" class="logo-lg logo-dark">
                        </h4>
                    </div> <!--end auth-logo-text-->
                    <div class="auth-page">
                        <div class="card auth-card shadow-lg">
                            <div class="card-body">
                                <div class="px-3">
                                    <div class="auth-logo-box">
                                    
                                    </div><!--end auth-logo-box-->

                                    <form class="form-horizontal auth-form my-4" action="{{ route('doctor.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            @error('username')
                                                <div class="color"> {{ $message }} </div>
                                                @enderror()
                                            <label for="username">Username</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i>
                                                </span>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Type username">
                                            </div>
                                        </div><!--end form-group-->
                                        <div class="form-group">
                                            @error('firstname')
                                                <div class="color"> {{ $message }} </div>
                                            @enderror()

                                            <label for="firstname">First Name</label>

                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-mail"></i>
                                                </span>
                                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Type first name">
                                            </div>
                                        </div><!--end form-group-->
                                        <div class="form-group">
                                            @error('lastname')
                                                <div class="color"> {{ $message }} </div>
                                            @enderror()

                                            <label for="lastname">Last name</label>

                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-mail"></i>
                                                </span>
                                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Type lastname">
                                            </div>
                                        </div><!--end form-group-->
                                        <div class="form-group">
                                            @error('type')
                                                <div class="color"> {{ $message }} </div>
                                            @enderror()

                                            <label for="type">Doctor type</label>

                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-mail"></i>
                                                </span>
                                                <select class="form-control" name="type">
                                                    @foreach($doctype as $line)
                                                        <option value="{{ $line->id }}"> {{ $line->type }} </option>
                                                    @endforeach    
                                                <select>
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                                @error('password')
                                                    <div class="color" > {{ $message }} </div>
                                                @enderror()
                                            <label for="userpassword">Password</label>

                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" name="password" id="userpassword" placeholder="Type Password">
                                            </div>
                                        </div><!--end form-group-->

                                        <div class="form-group">
                                                @error('confirm_password')
                                                <div class="color"> {{ $message }} </div>
                                                @enderror()
                                            <label for="conf_password">Confirm password</label>

                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock-open"></i>
                                                </span>
                                                <input type="password" class="form-control" name="confirm_password" id="conf_password" placeholder="Confirm your password">
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit" >Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                </div><!--end /div-->
                                <div class="m-3 text-center text-muted">
                                    <p class="">Already have an account ? <a href="/login" class="text-primary ml-2">Log in</a></p>
                                </div>

                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end auth-card-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        <!-- jQuery  -->
       <script src="{{ asset('js/jquery.min.js') }}"></script>
       <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
       <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
       <script src="{{ asset('js/metismenu.min.js') }}"></script>
       <script src="{{ asset('js/waves.js') }}"></script>
       <script src="{{ asset('js/feather.min.js') }}"></script>
       <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
       
       <!-- App js -->
       <script src="{{ asset('js/app.js') }}"></script>

    </body>

</html>
