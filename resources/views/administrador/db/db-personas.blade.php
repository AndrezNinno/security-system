@extends('layouts.admin')

@section('title', 'Administrar personas')

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
                                    <h4 class="card_title mb-0">Listado de personas</h4>
                                </center>
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
                                            {{-- <td>Acciones</td> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($personas ?? [] as $persona)
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div class="fw-600 ">{{ $persona->nombres }}</div>
                                                </td>
                                                <td>{{ $persona->tipo_documento }}</td>
                                                <td>{{ $persona->numero_documento }}</td>
                                                <td>{{ $persona->correo }}</td>
                                                <td>{{ $persona->telefono }}</td>
                                                @if ($persona->estado == 1)
                                                    <td>Activo</td>
                                                @else
                                                    <td>Inactivo</td>
                                                @endif
                                                {{-- <td>
                                                    <a href="{{ '/administrador/DB/mostrar/'.$persona->id }}" style="color: white" type="button" class="ti-pencil mr-1 btn btn-primary" title="Editar"></a>
                                                    <a href="{{'/administrador/DB/eliminar/'.$persona->id}}" style="color: white" type="button" class="ti-trash btn btn-primary" title="Borrar" onclick="return confirm('Está seguro que quiere eliminar el Vigilante?')"></a>    
                                                </td> --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-nowrap">
                                                    <div class="fw-600 ">No hay personas registrados</div>
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