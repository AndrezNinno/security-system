@extends('layouts.admin')

@section('title', 'Actualizar puerta')

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
                                                <form action="{{ '/administrador/puertas/update/'.$puerta->id }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table m-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Nombre</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input
                                                                                        class="form-control form-control-lg"
                                                                                        type="text"
                                                                                        id="example-text-input-lg"
                                                                                        value="{{ $puerta->nombre}}"
                                                                                        name="nombre"
                                                                                        required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Estado</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <select required class="form-control" name="estado" value="{{ $puerta->estado }}">
                                                                                        <option value="1">Abierta</option>
                                                                                        <option value="0">Cerrada</option>
                                                                                    </select>
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
                                                                            <th scope="row">Descripcion</th>
                                                                            <td>
                                                                                <div class="col-lg-9 mt-12 stretched_card">
                                                                                    <input
                                                                                        class="form-control form-control-lg"
                                                                                        type="text"
                                                                                        id="example-text-input-lg"
                                                                                        value="{{ $puerta->descripcion}}"
                                                                                        name="descripcion"
                                                                                        required>
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