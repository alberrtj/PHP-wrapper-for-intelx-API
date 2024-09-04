<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="@yield('keyword' , $setting->title)">
    <meta name="description" content="@yield('description' , $setting->title)">
    <meta content="https://www.manaeducate.com/" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/uploads/setting/main/'.$setting->favicon)}}">

    <!-- App css -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/app.min.css')}}?v=0.1" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/toastr.css?v=0.1') }}"/>
    <link href="{{asset('assets/admin/css/fonts.css')}}?v=0.1" rel="stylesheet" type="text/css"/>

    <style>
        body.authentication-bg-pattern {
            background-image: url('{{asset("assets/admin/images/back.png")}}?v=0.1');
            /*background-color: #343b4a;*/
        }

        body {
            color: #fff;
        }

        .card {
            background-color: #29e3c657;
            border-radius: 50px;
        }

        .btn {
            background: #4299ad;
            border-color: #8af9e6d9;
            color: white;
        }

        .btn:hover {
            background: #8af9e6d9;
            border-color: #8af9e6d9;
            color: white;
        }

        .btn-success:active {
            color: #fff;
            background-color: #601b49 !important;
            border-color: #601b49 !important;
        }

        .logo {
            height: auto;
            width: 100%;
            background: #ffffff70;
            border-radius: 80px;
        }


    </style>
</head>

<body class="authentication-bg authentication-bg-pattern d-flex align-items-center">
<div class="home-btn d-none d-sm-block">

</div>

<div class="account-pages w-100 mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                                <span>
                                    <img class="logo" src="{{$logo}}" alt="{{$setting->title}}">
                                </span>
                        </div>

                        <form method="post" class="pt-2" action="{{URL::action('Auth\LoginController@postLogin')}}"
                              id="form">
                            {{ csrf_field() }}

                            <div class="form-group mb-3 text-right" dir="ltr">
                                <label for="email"> email</label>
                                <input class="form-control" type="email" id="email" required=""
                                       name="email"
                                       autocomplete="off"
                                       placeholder="Enter your email">
                            </div>

                            <div class="form-group mb-3 text-right" dir="ltr">
                                <label for="password">password</label>
                                <input class="form-control" type="password" required="" id="password"
                                       name="password"
                                       autocomplete="off"
                                       placeholder="Enter your password">
                            </div>

                            <div class="form-group has-feedback captcha">


                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-success btn-block" type="submit"> Login
                                </button>
                            </div>

                        </form>

                        <!-- end row -->

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->
            <div class="col-md-4 col-lg-6 col-xl-7"></div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="{{ asset('assets/admin/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{ asset('assets/admin/js/app.min.js')}}"></script>

<script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
@include('layouts.admin.blocks.message')

</body>
</html>

