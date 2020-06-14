@extends('layouts.admin')

@section('title', 'Perfil')

@section('content')
    <!--=========================*
        Main Section
    *===========================-->
    <div class="vz_main_container">
        <div class="vz_main_content">
            <div class="profile_page">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cover-profile">
                            <div class="profile-bg-img" style="background: url('{{ url('assets/images/lock-bg.jpg')}}') no-repeat;">
                                <div class="card-block user-info">
                                    <div class="col-md-12">
                                        <div class="media-left">
                                            <div class="profile-image">
                                                <img class="user-img img-radius" src="{{ url('assets/images/team/member2.jpg')}}" alt="user-img">
                                            </div>
                                        </div>
                                        <div class="media-body row">
                                            <div class="col-lg-12">
                                                <div class="user-title">
                                                    <h2>{{ $administrador->nombres }}</h2>
                                                    <span class="text-white">{{ $administrador->rol }}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="pull-right cover-btn">
                                                    <form action="#">
                                                        <input class="btn btn-light m-r-10 m-b-5" type="file" id="fotoperfil" name="fotoperfil">
                                                        <button class="btn btn-light m-r-10 m-b-5" type="submit" >Guardar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card_title mb-0">Información Personal</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="view-info">
                                            <div class="general-info">
                                                <form action="{{ '/administrador/actualizar/'.$administrador->id }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table m-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Nombre completo</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input name="nombres" class="form-control form-control-lg" type="text" id="example-text-input-lg" value="{{ $administrador->nombres }}">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Genero</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input name="genero" class="form-control form-control-lg" type="text" id="example-text-input-lg" value="{{ $administrador->genero }}">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Fecha de Nacimiento</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input name="fechaNacimiento" class="form-control form-control-lg" type="date" id="example-text-input-lg" value="{{ $administrador->fecha_nacimiento }}">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Cargo</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input name="rol" class="form-control form-control-lg" type="text" value="{{ $administrador->rol }}" id="example-text-input-lg" disabled>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Correo Electronico</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input name="correo" class="form-control form-control-lg" type="email" id="example-text-input-lg" value="{{ $administrador->correo }}">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Numero de Teléfono</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input name="telefono" class="form-control form-control-lg" type="text" id="example-text-input-lg" value="{{ $administrador->telefono }}">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Contraseña Anterior</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input name="anterior" class="form-control form-control-lg" type="password" id="example-text-input-lg">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Contraseña Nueva</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input name="nueva" class="form-control form-control-lg" type="password" id="example-text-input-lg">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input class="btn btn-light m-r-10 m-b-5" type="submit" value="Guardar">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    </div>
    <!--=========================*
            End Main Section
    *===========================-->
@endsection