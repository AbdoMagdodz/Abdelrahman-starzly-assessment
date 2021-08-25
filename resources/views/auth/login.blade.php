<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Starzly</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">

</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper" class="login-register login-sidebar"
         style="background-image:url({{asset('assets/images/background/login-register.jpg')}});">
    <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material" method="POST" action="{{url('/login') }}" novalidate>
                {{csrf_field()}}
                <div class="text-center m-t-10">
                    <code style="color: #54C3EB !important;font-weight: 600;font-size: 40px">Starzly</code>
                </div>
                <div class="form-group m-t-20">
                    <div class="col-xs-12">
                        <div class="controls">
                            <input class="form-control" required name="email" value="{{ old('email') }}" type="text"
                                   placeholder="Email">
                            @error('email') <code class="text-danger">{{$message}}</code>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="controls">
                            <input class="form-control" required name="password" type="password" placeholder="Password">
                            @error('password')<code class="text-danger">{{ $message }}</code>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-block text-uppercase waves-effect waves-light"
                                type="submit" style="background-color: #0A4689!important;">Log In</button>
                    </div>
                </div>
            </form>



            <h4>username: <code>admin@starzly.com</code></h4>
            <h4>password: <code>123123123</code></h4>
        </div>
    </div>
</section>

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/validation.js')}}"></script>
</body>

</html>





