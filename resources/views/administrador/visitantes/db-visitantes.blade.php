@extends('layouts.admin')

@section('title', 'Administrar puertas')

@section('content')
    <!--=========================*
            Main Section
    *===========================-->
    <div class="vz_main_container">
        <div class="vz_main_content">
            <div class="card-body">
                <!-- Progress Table start -->
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card_title">Visitantes Centro comercial</h4>
                            <div class="single-table">
                                <div class="table-responsive datatable-primary">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">TD</th>
                                                <th scope="col">Documento</th>
                                                <th scope="col">Genero</th>
                                                <th scope="col">Tiempo</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Teléfono</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- 
                                                <tr>
                                                    <th scope="row">Astharlam Molina</th>
                                                    <td>Cedula</td>
                                                    <td>1090503514</td>
                                                    <td>Hombre</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 50%;" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-info">in progress</span></td>
                                                    <td>3125502844</td>
                                                    <td>
                                                        <a href="#" style="color: white" type="button"
                                                            class="ti-new-window mr-1 btn btn-primary"
                                                            title="Salir"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Mark</td>
                                                    <td>09 / 07 / 2018</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 80%;" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-warning">pending</span></td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="#" class="text-primary"><i
                                                                        class="fa fa-edit"></i></a></li>
                                                            <li><a href="#" class="text-danger"><i
                                                                        class="ti-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Mark</td>
                                                    <td>09 / 07 / 2018</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 100%;" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-success">complate</span></td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="#" class="text-primary"><i
                                                                        class="fa fa-edit"></i></a></li>
                                                            <li><a href="#" class="text-danger"><i
                                                                        class="ti-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Mark</td>
                                                    <td>09 / 07 / 2018</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 85%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">stopped</span></td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3">
                                                                <a href="#" class="text-primary">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="text-danger">
                                                                    <i class="ti-trash"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                             --}}
                                             @forelse ($visitantes as $visitante)
                                                <tr>
                                                    <th scope="row">{{ $visitante->nombres }}</th>
                                                    <td>{{ $visitante->tipo_documento }}</td>
                                                    <td>{{ $visitante->numero_documento }}</td>
                                                    <td>{{ $visitante->genero }}</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: {{ floor((($tiempoActual->diffInMinutes($tiempos[$visitante->nombres]))/$tiempoMaximo) * 100) }}%;" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-info">in progress</span>
                                                    </td>
                                                    <td>{{ $visitante->telefono }}</td>
                                                    <td>
                                                        <a href="{{'/guardia/visitantes/salir/'.$visitante->id}}" style="color: white" type="button" class="ti-new-window mr-1 btn btn-primary" title="Salir"></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th scope="row">No hay visitantes dentro..</th>
                                                    <td>?</td>
                                                    <td>?</td>
                                                    <td>?</td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 0%;" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-info">esperando</span></td>
                                                    <td>?</td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div><br><br><br>
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
    </div>
    <!--=========================*
            End Main Section
    *===========================-->
@endsection