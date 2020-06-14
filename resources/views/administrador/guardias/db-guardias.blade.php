@extends('layouts.admin')

@section('title', 'Administrar vigilantes')

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
                                    <h4 class="card_title mb-0">Listado de Vigilantes</h4>
                                </center>
                                <div>
                                    <!-- Vertically centered modal -->
                                    <div class="col-lg-6 mt-4 stretched_card">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Agregar Vigilante</button>
                                        <!-- Modal -->
                                        <div class="modal fade mt-5" id="exampleModalCenter">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="/administrador/guardias/registrar" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mb-6">Agregar Vigilante</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <div class="form-group col my-1" >
                                                                            <label for="nombres" class="col-form-label">Nombre completo</label>
                                                                            <input required class="form-control" type="text" name="nombres" id="nombres" placeholder="Nombre y apellidos">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group col my-1">
                                                                            <label for="contrasena" class="col-form-label">Contraseña</label>
                                                                            <input required type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col">
                                                                        <div class="form-group col my-1">
                                                                            <label class="col-form-label">Tipo Documento</label>
                                                                            <select required class="form-control" name="tipoDocumento">
                                                                                <option value="CC">Cédula de Ciudadanía</option>
                                                                                <option value="CE">Cédula de Extranjería</option>
                                                                                <option value="PA">Pasaporte</option>
                                                                                <option value="RC">Registro Civil</option>
                                                                                <option value="TI">Tarjeta de identidad</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group col my-1">
                                                                            <label for="numeroDocumento" class="col-form-label">Número Documento</label>
                                                                            <input required class="form-control" type="text" name="numeroDocumento" id="numeroDocumento" placeholder="##########">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col my-1">
                                                                    <label for="correo" class="col-form-label">Correo electrónico</label>
                                                                    <input required class="form-control" type="email" name="correo" id="correo" placeholder="Correo electrónico">
                                                                </div>
                                                                <div class="form-group col my-1">
                                                                    <label for="telefono" class="col-form-label">Teléfono</label>
                                                                    <input required class="form-control" type="text" name="telefono" id="telefono" placeholder="Teléfono">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
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
                                            <td>T.D</td>
                                            <td>Documento</td>
                                            <td>Correo</td>
                                            <td>Telefono</td>
                                            <td>Estado</td>
                                            <td>Puerta asignada</td>
                                            <td>Acciones</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($guardias as $guardia)
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div class="fw-600 ">{{ $guardia->nombres }}</div>
                                                </td>
                                                <td>{{ $guardia->tipo_documento }}</td>
                                                <td>{{ $guardia->numero_documento }}</td>
                                                <td>{{ $guardia->correo }}</td>
                                                <td>{{ $guardia->telefono }}</td>
                                                @if ($guardia->estado == 1)
                                                    <td>Activo</td>
                                                @else
                                                    <td>Inactivo</td>
                                                @endif
                                                @if ($puertas[$guardia->nombres] != null)
                                                    <td>{{ $puertas[$guardia->nombres] }}</td>
                                                @else
                                                    <td>No asignado</td>
                                                @endif
                                                <td>
                                                    <a href="{{ '/administrador/guardias/mostrar/'.$guardia->id }}" style="color: white" type="button" class="ti-pencil mr-1 btn btn-primary" title="Editar"></a>
                                                    @if ($puertas[$guardia->nombres] != null)
                                                        <a href="{{ '/administrador/guardias/desasignar/'.$guardia->id }}" style="color: white" type="button" class="ti-list btn btn-primary" title="Desasignar puerta"></a>
                                                    @endif
                                                    <a href="{{'/administrador/guardias/eliminar/'.$guardia->id}}" style="color: white" type="button" class="ti-trash btn btn-primary" title="Borrar" onclick="return confirm('Está seguro que quiere eliminar el Vigilante?')"></a>    
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div class="fw-600 ">No hay guardias registrados</div>
                                                </td>
                                                <td>?</td>
                                                <td>?</td>
                                                <td>?</td>
                                                <td>?</td>
                                                <td>?</td>
                                                <td>
                                                    <a href="#" style="color: white" type="button" class="ti-pencil mr-1 btn btn-primary" title="Editar"></a>
                                                    <a href="#" style="color: white" type="button" class="ti-trash btn btn-primary" title="Borrar"></a>    
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