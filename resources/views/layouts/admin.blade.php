<!DOCTYPE html>
<html class="no-js" lang="zxx">

    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <!--=========================*
                Meta Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gelr Bootstrap 4 Admin Template">

    <!--=========================*
              Page Title
    *===========================-->
    <title>Sistema de seguridad - @yield('title')</title>

    <!--=========================*
                Favicon
    *===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/favicon.png')}}">

    <!--=========================*
              All CSS
    *===========================-->
    <link rel="stylesheet" href="{{ url('css/all.css')}}">

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
    <link rel="stylesheet" href="{{ url('assets/css/flag-icon.min.css')}}">

    <!--=========================*
        AM Chart
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/vendors/am-charts/css/am-charts.css')}}" type="text/css" media="all" />

    <!--=========================*
        Morris Css
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/vendors/charts/morris-bundle/morris.css')}}">

    <!--=========================*
        Datatable
    *===========================-->
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/data-table/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/data-table/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/data-table/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/data-table/css/responsive.jqueryui.min.css')}}">

    <!--=========================*
        Fancy Box
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/css/jquery.fancybox.css')}}">

    <!--=========================*
        Hopscotch
    *===========================-->
    <link rel="stylesheet" href="{{ url('assets/vendors/hop-scotch/css/hopscotch.min.css')}}">
</head>
<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--=========================*
        Page Content
    *===========================-->
    <div class="vz_main_sec">
        <!--==================================*
                Header And Sidebar Section
        *====================================-->
        <nav class="vz_navbar navbar-collapsed">
            <div class="navbar-wrapper">
                <div class="navbar-content scroll-div">
                    <div class="vz_navigation">
                        <ul class="sidebar nav flex-column">
                            <li class="inactive" id="inicio">
                                <a class="nav-link text-center" data-nav="dashboard" href="/administrador/dashboard">
                                    <i class="feather ft-home"></i><span>Inicio</span>
                                </a>
                            </li>
                            
                            <li class="">
                                <a class="nav-link text-center" href="/administrador/visitantes" data-nav="ui_features" id="visitantes_tour">
                                <i class="feather  ft-user-plus"></i><span>Visitantes</span></a>
                            </li>
                            
                            <li class="">
                                <a class="nav-link text-center" href="/administrador/empleados" data-nav="ui_features" id="empleados_tour">
                                <i class="feather  ft-user"></i><span>Empleados</span></a>
                            </li>
                            
                            
                            <li class=""><a class="nav-link text-center" href="/administrador/guardias" data-nav="apps" id="vigilantes_tour">
                                <i class="feather ft-shield"></i><span>Vigilantes</span></a>
                            </li>
                            
                            <li class=""><a class="nav-link text-center" href="/administrador/puertas" data-nav="advance_kit" id="puertas">
                                <i class="feather ft-tablet"></i><span>Puertas</span></a>
                            </li>
                            
                            <li class=""><a class="nav-link text-center" href="/administrador/configuraciones" data-nav="forms" id="configuraciones">
                                <i class="feather ft-settings"></i><span>Configuraciones</span></a>
                            </li>

                            <li class=""><a class="nav-link text-center" href="/administrador/DB" data-nav="forms" id="configuraciones">
                                <i class="feather ft-database"></i><span>Base de datos</span></a>
                            </li>
                        </ul>
                        {{-- <div class="sidebar_content">
                        </div> --}}
                    </div>
                </div>
            </div>
        </nav>

        <header class="vz_main_header flex-grow-1 top_nav">
            <div class="container-fluid d-flex flex-row h-100 align-items-center">
                <!--=========================*
                            Logo
                *===========================-->
                <div class="text-center rt_nav_wrapper d-flex align-items-center">
                    <a class="nav_logo rt_logo" href="/administrador/dashboard"><img src="{{ url('assets/images/logo-dark.png')}}" alt="logo"/></a>
                    <a class="nav_logo nav_logo_mob" href="/administrador/dashboard"><img src="{{ url('assets/images/mobile-logo.png')}}" alt="logo"/></a>
                </div>
                <!--=========================*
                        End Logo
                *===========================-->
                <div class="nav_wrapper_main d-flex align-items-center justify-content-between flex-grow-1">
                    <a class="" id="vz_mobileCollapseIcon" href="javascript:void(0)">
                        <span></span>
                    </a>
                    <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">
                        <!--==================================*
                                End Message Section
                        *====================================-->
                        <!--==================================*
                                Profile Menu
                        *====================================-->
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle pr-3" href="#" data-toggle="dropdown" id="profileDropdown">
                                <span class="profile_sec">
                                    <span class="profile_name">
                                        <span class="hi_name">Hola, </span>
                                        {{ $administrador->nombres }}<i class="feather ft-chevron-down"></i>
                                    </span>
                                    {{-- Imagen de perfil del usuario administrador --}}
                                    <img src="{{ url('assets/images/user.jpg')}}" alt="profile"/>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-2" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="/administrador/perfil/">
                                    <i class="ti-user text-dark mr-3"></i> Datos personales
                                </a>
                                <a class="dropdown-item" href="/administrador/logout">
                                    <i class="feather ft-power text-dark mr-3"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>
                        <!--==================================*
                                End Profile Menu
                        *====================================-->
                    </ul>
                    <!--=========================*
                            Mobile Menu
                    *===========================-->
                    <span class="d-lg-none">
                        <a class="vz_mobile_menu_icon ml-3" id="vz_mobileCollapseIconMobile" href="javascript:"><span></span></a>
                    </span>
                    <!--=========================*
                        End Mobile Menu
                    *===========================-->
                </div>
            </div>
        </header>
        <!--==================================*
               End Header Sidebar Section
        *====================================-->

        @yield('content')
    </div>

    <!--=========================*
        Scripts
    *===========================-->

    <!--=========================*
        All JS
    *===========================-->

    <script src="{{ url('js/all.js')}}"></script>

    <!--=========================*
        This Page Scripts
    *===========================-->
    <!-- start amchart js -->
    <script src="{{ url('assets/vendors/am-charts/js/ammap.js')}}"></script>
    <script src="{{ url('assets/vendors/am-charts/js/worldLow.js')}}"></script>
    <script src="{{ url('assets/vendors/am-charts/js/continentsLow.js')}}"></script>
    <script src="{{ url('assets/vendors/am-charts/js/light.js')}}"></script>

    <script src="{{ url('assets/vendors/am-charts/am4/core.js')}}"></script>
    <script src="{{ url('assets/vendors/am-charts/am4/charts.js')}}"></script>
    <script src="{{ url('assets/vendors/am-charts/am4/animated.js')}}"></script>

    <!-- flot chart -->
    <script src="{{ url('assets/vendors/flot/jquery.flot.min.js')}}"></script>
    <script src="{{ url('assets/vendors/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ url('assets/vendors/flot/jquery.flot.resize.min.js')}}"></script>

    <!-- maps js -->
    <script src="{{ url('assets/js/am-maps.js')}}"></script>

    <!--Morris Chart-->
    <script src="{{ url('assets/vendors/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{ url('assets/vendors/charts/morris-bundle/morris.js')}}"></script>

    <!--Chart Js-->
    <script src="{{ url('assets/vendors/charts/charts-bundle/Chart.bundle.js')}}"></script>

    <!--Apex Chart-->
    <script src="{{ url('assets/vendors/apex/js/apexcharts.min.js')}}"></script>

    <!--EChart-->
    <script src="{{ url('assets/vendors/charts/echarts/echarts-en.min.js')}}"></script>

    <!--Home Script-->
    <script src="{{ url('assets/js/home.js')}}"></script>

    <!--Perfect Scrollbar-->
    <script src="{{ url('assets/js/perfect-scrollbar.min.js')}}"></script>

    <!-- Data Table js -->
    <script src="{{ url('assets/vendors/data-table/js/jquery.dataTables.js')}}"></script>
    <script src="{{ url('assets/vendors/data-table/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('assets/vendors/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ url('assets/vendors/data-table/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ url('assets/vendors/data-table/js/responsive.bootstrap.min.js')}}"></script>

    <!-- Data table Init -->
    <script src="{{ url('assets/js/init/data-table.js')}}"></script>

    <!-- Fancy Box Js -->
    <script src="{{ url('assets/js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{ url('assets/js/init/fancy.js')}}"></script>

    <!-- Hopscotch Js -->
    <script src="{{ url('assets/vendors/hop-scotch/js/hopscotch.min.js')}}"></script>

    <!-- Hopscotch init Js -->
    <script src="{{ url('assets/js/init/hop-scotch.js')}}"></script>
</body>