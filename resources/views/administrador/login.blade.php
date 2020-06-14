<!doctype html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!--=========================*
                Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gelr Bootstrap 4 Admin Template">

    <!--=========================*
              Page Title
    *===========================-->
    <title>Iniciar Sesión | Administrador </title>

    <!--=========================*
                Favicon
    *===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/favicon.png')}}">

    <!--=========================*
            Bootstrap Css
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">

    <!--=========================*
              Custom CSS
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/css/style.css')}}">

    <!--=========================*
               Owl CSS
    *===========================-->
    <link href="{{ url('assets/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">

    <!--=========================*
            Font Awesome
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css')}}">

    <!--=========================*
             Themify Icons
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/css/themify-icons.css')}}">

    <!--=========================*
               Ionicons
    *===========================-->
    <link href="{{ url('assets/css/ionicons.min.css')}}" rel="stylesheet"/>

    <!--=========================*
              EtLine Icons
    *===========================-->
    <link href="{{ url('assets/css/et-line.css')}}" rel="stylesheet"/>

    <!--=========================*
              Feather Icons
    *===========================-->
    <link href="{{ url('assets/css/feather.css')}}" rel="stylesheet"/>

    <!--=========================*
              Modernizer
    *===========================-->
    <script src="{{ url('assets/js/modernizr-2.8.3.min.js')}}"></script>

    <!--=========================*
               Metis Menu
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/css/metisMenu.css')}}">

    <!--=========================*
               Slick Menu
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/css/slicknav.min.css')}}">

    <!--=========================*
            Google Fonts
    *===========================-->

    <!-- Montserrat USE: font-family: 'Montserrat', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="/administrador/login">
                @csrf
                <div class="login-form-body text-center p-4">
                    <img src="assets/images/logo-login.png" class="mb-5" alt="Logo">
                    <div class="form-gp">
                        <label for="cedula">Cedula</label>
                        <input type="number" id="cedula" name="cedula" required>
                        <i class="ti-credit-card"></i>
                    </div>
                    <div class="form-gp">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" required>
                        <i class="ti-lock"></i>
                    </div>
                    
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" class="btn btn-primary">Iniciar Sesión <i class="ti-arrow-right"></i></button>
                    </div>
                   
                </div>
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
                @endif

            </form>

            <div class="login100-more" style="background-image: url('assets/images/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>


<!--=========================*
            Scripts
*===========================-->

<!-- Jquery Js -->
<script src="{{ url('assets/js/jquery.min.js')}}"></script>
<!-- bootstrap 4 js -->
<script src="{{ url('assets/js/popper.min.js')}}"></script>
<script src="{{ url('assets/js/bootstrap.min.js')}}"></script>
<!-- Owl Carousel Js -->
<script src="{{ url('assets/js/owl.carousel.min.js')}}"></script>
<!-- Metis Menu Js -->
<script src="{{ url('assets/js/metisMenu.min.js')}}"></script>
<!-- SlimScroll Js -->
<script src="{{ url('assets/js/jquery.slimscroll.min.js')}}"></script>
<!-- Slick Nav -->
<script src="{{ url('assets/js/jquery.slicknav.min.js')}}"></script>
<!-- This Page Js -->

<script>
    jQuery(document).ready(function ($) {
        $('.form-gp input').on('focus', function() {
            $(this).parent('.form-gp').addClass('focused');
        });
        $('.form-gp input').on('focusout', function() {
            if ($(this).val().length === 0) {
                $(this).parent('.form-gp').removeClass('focused');
            }
        });
    });
</script>

</body>

</html>
