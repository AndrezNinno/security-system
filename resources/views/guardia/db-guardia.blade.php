@extends('layouts.guardia')

@section('title', 'Dashboard Guardia')

@section('content')
        <!--=========================*
               Main Section
       *===========================-->
        <div class="vz_main_container">
            <div class="vz_main_content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-icon rt_icon_card d-flex mb-mob-4 text-center">
                            <div class="card-body">
                                <span class="heading_icon">
                                    <img src="{{ url('assets/images/icon-bg.png')}}" alt="Icon">
                                    <i class="feather ft-user-plus"></i>
                                </span>
                                <div class="icon_specs">
                                    <p>Visitantes</p>
                                    <span>{{ $visitantes }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-icon rt_icon_card mb-0 text-center">
                            <div class="card-body">
                                <span class="heading_icon">
                                    <img src="{{ url('assets/images/icon-bg.png')}}" alt="Icon">
                                    <i class="feather ft-activity"></i>
                                </span>
                                <div class="icon_specs">
                                    <p>Aforo</p>
                                    <span>{{ $aforo.'/'.$aforoTotal }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="vz_main_content" style="margin-top: 30px; padding: 0px 5px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card_title">Emisoft Tour</h4>
                                    <p>
                                        En esta sección de ayuda al usuario, encontrarás un tour guiado en caso de que
                                        te sientas perdido, con él podrás entender a grandes rasgos las funcionalidades
                                        y caracteristas incluídas para ti, esperamos sea de tu agrado, con cada nueva
                                        tarjeta que aparezca deberás dar click en la sección "Next"
                                    </p>

                                    <button id="startTourBtn" class="btn btn-primary">Iniciar Tour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!--=========================*
                Footer
            *===========================-->
            <footer>
                <div class="footer-area">
                    <p>© Copyright 2020. Todos los derechos reservados.</p>
                </div>
            </footer>
            <!--=========================*
                End Footer
            *===========================-->

            <!--=========================*
                End Main Section
            *===========================-->

        </div>
        <!--=========================*
            End Page Content
        *===========================-->
@endsection