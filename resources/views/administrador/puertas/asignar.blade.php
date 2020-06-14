@extends('layouts.admin')

@section('title', 'Asignar vigilante')

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
                                        <h5 class="card_title mb-0">Asignar Vigilante </h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="view-info">
                                            <div class="general-info">
                                                <form action="{{'/administrador/puertas/actualizar/'.$puerta->id}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table m-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Puerta</th>
                                                                            <td>{{ $puerta->nombre }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Descripción</th>
                                                                            <td>{{ $puerta->descripcion }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Estado de la puerta</th>
                                                                            <td>{{ $puerta->estado }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Vigilante actualmente asignado</th>
                                                                            <td>{{ $guardiaAsignado }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Vigilante</th>
                                                                            <td>
                                                                                <select class="form-control" name="idGuardia">
                                                                                    @foreach ($guardias as $guardia)
                                                                                        <option value="{{ $guardia->id }}">{{ $guardia->nombres }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <input class="btn btn-light m-r-10 m-b-5" type="submit"
                                                        value="Guardar">
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
        </div><br><br><br><br><br><br><br><br>
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