@extends('layouts.guardia')

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
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card_title mb-0">Información usuario</h5>
                                </div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="general-info">
                                            <form action="/guardia/actualizar" method="POST">
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
                                                                                <input
                                                                                    class="form-control form-control-lg"
                                                                                    type="text"
                                                                                    id="example-text-input-lg"
                                                                                    name="nombres"
                                                                                    value="{{ $guardia->nombres }}">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Tipo Documento</th>
                                                                        <td>
                                                                            <div class="col-lg-9 mt-12 stretched_card">
                                                                                <select required class="form-control" name="tipoDocumento">
                                                                                    <option value="CC">Cédula de Ciudadanía</option>
                                                                                    <option value="CE">Cédula de Extranjería</option>
                                                                                    <option value="PA">Pasaporte</option>
                                                                                    <option value="RC">Registro Civil</option>
                                                                                    <option value="TI">Tarjeta de identidad</option>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Correo Electronico</th>
                                                                        <td>
                                                                            <div class="col-lg-9 mt-12 stretched_card">
                                                                                <input
                                                                                    class="form-control form-control-lg"
                                                                                    type="email"
                                                                                    id="example-text-input-lg"
                                                                                    name="correo"
                                                                                    value="{{ $guardia->correo }}">
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
                                                                        <th scope="row">Numero de Teléfono</th>
                                                                        <td>
                                                                            <div class="col-lg-9 mt-12 stretched_card">
                                                                                <input
                                                                                    class="form-control form-control-lg"
                                                                                    type="text"
                                                                                    id="example-text-input-lg"
                                                                                    name="telefono"
                                                                                    value="{{ $guardia->telefono }}">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Documento</th>
                                                                        <td>
                                                                            <div class="col-lg-9 mt-12 stretched_card">
                                                                                <input
                                                                                    class="form-control form-control-lg"
                                                                                    type="text"
                                                                                    id="example-text-input-lg"
                                                                                    name="numeroDocumento"
                                                                                    value="{{ $guardia->numero_documento }}">
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
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first()}}
                            </div>
                        @endif
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
