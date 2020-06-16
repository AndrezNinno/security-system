@extends('layouts.guardia')

@section('title', 'Dashboard Visitantes')

@section('content')
        <!--=========================*
               Main Section
       *===========================-->
        <div class="vz_main_container">
            <div class="vz_main_content">
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first()}}
                    </div>
                    @endif
                    <!-- Progress Table start -->
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <!-- Vertically centered modal -->
                                    <div class="col-lg-16 mt-4 float-right" style="margin-block-end: 0.2rem!important;">
                                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                            data-target="#exampleModalCenter">Registrar visitante</button>
                                        <button type="button" class="btn btn-success btn-fixed-w mb-3"
                                            data-toggle="modal" data-target="#exampleModalCenter2">Ingreso</button>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document"
                                            style="margin-top: 3.5rem!important; ">
                                            <div class="modal-content">
                                                <form action="/guardia/visitantes/registrar" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mb-6">Registrar Visitante</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <div class="form-group col my-1">
                                                                        <label for="regNombres" class="col-form-label">Nombre completo</label>
                                                                        <input class="form-control" type="text" placeholder="Nombres y Apellidos" id="regNombres" name="regNombres" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group col my-1">
                                                                        <label for="regGenero" class="col-form-label">Género</label>
                                                                        <input class="form-control" type="text" placeholder="Género" id="regGenero" name="regGenero" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <div class="form-group col my-1">
                                                                        <label class="col-form-label">Tipo Documento</label>
                                                                        <select required class="form-control" name="regTipoDocumento">
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
                                                                        <label for="regNumDocumento" class="col-form-label">Documento</label>
                                                                        <input class="form-control" type="text" placeholder="#########" id="regNumDocumento" required name="regNumDocumento">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <div class="form-group col my-1">
                                                                        <label for="regCorreo" class="col-form-label">Correo electrónico</label>
                                                                        <input class="form-control" type="email" placeholder="ejemplo@gmail.com" id="regCorreo" required name="regCorreo">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group col my-1">
                                                                        <label for="regTelefono" class="col-form-label">Teléfono</label>
                                                                        <input class="form-control" type="number" placeholder="#######" id="regTelefono" name="regTelefono" required>
                                                                    </div>
                                                                </div>
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
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter2">
                                    <div class="modal-dialog modal-dialog-centered" role="document"
                                        style="margin-top: 3.5rem!important; ">
                                        <div class="modal-content">
                                            <form action="/guardia/visitantes/ingresar" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title mb-6">Ingresos</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-row">
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col">
                                                                <div class="form-group col my-1">
                                                                    <label class="col-form-label">Tipo Documento</label>
                                                                    <select required class="form-control" name="ingresoTipoDocumento">
                                                                        <option value="CC">Cédula de Ciudadanía</option>
                                                                        <option value="CE">Cédula de Extranjería</option>
                                                                        <option value="PA">Pasaporte</option>
                                                                        <option value="RC">ingreso Civil</option>
                                                                        <option value="TI">Tarjeta de identidad</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group col my-1">
                                                                    <label for="ingresoNumDocumento" class="col-form-label">Documento</label>
                                                                    <input class="form-control" type="text" placeholder="##########" id="ingresoNumDocumento" name="ingresoNumDocumento" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-group col my-1">
                                                                <label for="ingresoTemperatura" class="col-form-label">Temperatura</label>
                                                                <input class="form-control" type="text" placeholder="Cantidad °" id="ingresoTemperatura" name="ingresoTemperatura" required>
                                                            </div>
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
                                                        class="ti-new-window mr-1 btn btn-primary" title="Salir"></a>
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
                                                        <li><a href="#" class="text-danger"><i class="ti-trash"></i></a>
                                                        </li>
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
                                                            style="width: 100%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-success">complate</span></td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="#" class="text-primary"><i
                                                                    class="fa fa-edit"></i></a></li>
                                                        <li><a href="#" class="text-danger"><i class="ti-trash"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Mark</td>
                                                <td>09 / 07 / 2018</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 85%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-danger">stopped</span></td>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="#" class="text-primary"><i
                                                                    class="fa fa-edit"></i></a></li>
                                                        <li><a href="#" class="text-danger"><i class="ti-trash"></i></a>
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
                                                            style="width: {{ floor((($tiempos[$visitante->nombres]->diffInMinutes($tiempoActual))/$tiempoMaximo) * 100) }}%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-info">in progress</span></td>
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
        </div>
@endsection