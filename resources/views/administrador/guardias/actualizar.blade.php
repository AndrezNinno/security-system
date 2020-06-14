@extends('layouts.admin')

@section('title', 'Actualizar guardia')

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
                                                <form action="{{ '/administrador/guardias/actualizar/'.$guardia->id }}" method="POST">
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
                                                                                        value="{{ $guardia->nombres}}"
                                                                                        name="nombres"
                                                                                        required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Tipo Documento</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <select required class="form-control" name="tipoDocumento" value="{{ $guardia->tipo_documento }}">
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
                                                                            <th scope="row">Documento</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input
                                                                                        class="form-control form-control-lg"
                                                                                        type="text"
                                                                                        id="example-text-input-lg"
                                                                                        value="{{ $guardia->numero_documento }}"
                                                                                        required
                                                                                        name="numeroDocumento">
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
                                                                                        value="{{ $guardia->correo }}"
                                                                                        required
                                                                                        name="correo">
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
                                                                                        value="{{ $guardia->telefono }}"
                                                                                        required
                                                                                        name="telefono">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Contraseña Nueva</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input
                                                                                        class="form-control form-control-lg"
                                                                                        type="password"
                                                                                        id="example-text-input-lg"
                                                                                        name="contrasena">
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>

                                                                </table>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <button class="btn btn-light m-r-10 m-b-5" type="submit">Guardar</button>
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