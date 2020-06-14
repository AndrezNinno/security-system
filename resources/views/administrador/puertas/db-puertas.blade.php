@extends('layouts.admin')

@section('title', 'Administrar puertas')

@section('content')
    <!--=========================*
        Main Section
    *===========================-->
    <div class="vz_main_container">
        <div class="vz_main_content">
            <div class="row">
                <!-- Primary table -->
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card_title d-flex flex-wrap justify-content-between align-items-center">
                                <center>
                                    <h4 class="card_title mb-0">Listado de Puertas</h4>
                                </center>
                                <div>
                                    <!-- Vertically centered modal -->
                                    <div class="col-lg-6 mt-4 stretched_card">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalCenter">Agregar Puerta</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="/administrador/puertas/registrar" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mb-6">Agregar Puerta</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span></button>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <div class="form-group col my-1">
                                                                            <label for="nombre" class="col-form-label">Nombre</label>
                                                                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col my-1">
                                                                        <label for="descripcion" class="col-form-label">Descripción</label>
                                                                        <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col my-1">
                                                                    <label for="estado" class="">Estado de la puerta</label>
                                                                    <select class="form-control" name="estado" id="estado" required>
                                                                        <option value="Cerrada">Cerrada</option>
                                                                        <option value="Abierta">Abierta</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                            <button type="button" class="btn btn-light"
                                                                data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Vertically centered modal -->
                                </div>
                            </div>
                            <div class="table-responsive datatable-primary">
                                <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <td class="w-30p">Nombre</td>
                                            <td>Descripción </td>
                                            <td>Estado</td>
                                            <td>Asignación </td>
                                            <td>Acciones</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($puertas as $puerta)
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div class="fw-600 ">{{ $puerta->nombre }}</div>
                                                </td>
                                                <td>{{ $puerta->descripcion }}</td>
                                                <td>{{ $puerta->estado }}</td>
                                                <td>{{ $guardias[$puerta->nombre] }}</td>
                                                <td>
                                                    <a href="#" style="color: white" type="button" class="ti-pencil mr-1 btn btn-primary" title="Editar"></a>
                                                    <a href="{{ '/administrador/puertas/asignar/'.$puerta->id }}" style="color: white" type="button" class="ti-list btn btn-primary" title="Asignar"></a>
                                                    <a href="{{'/administrador/puertas/eliminar/'.$puerta->id}}" style="color: white" type="button" class="ti-trash btn btn-primary" title="Borrar" onclick="return confirm('Está seguro que quiere eliminar la puerta?')"></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div class="fw-600 ">No hay puertas</div>
                                                </td>
                                                <td>?</td>
                                                <td>?</td>
                                                <td>?</td>
                                                <td>
                                                    <a href="#" style="color: white" type="button"
                                                        class="ti-pencil mr-1 btn btn-primary" title="Editar"></a>
                                                    <a href="asignarguardia.html" style="color: white" type="button"
                                                        class="ti-list btn btn-primary" title="Asignar"></a>
                                                    <a href="#" style="color: white" type="button"
                                                        class="ti-trash btn btn-primary" title="Borrar"></a>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Primary table -->
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