@extends('welcome')
@section('content')
    <div class="container pt-5 align-items-center">
        <div class="col-12 text-center mt-5">
            <h2>Alumnos</h2>
        </div>
        <div class="col-12 text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarAlumno">
                Agregar Alumno
            </button>
        </div>
        <div class="col-12 text-center pt-4">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Grado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tb_alumno">
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Creacion Materia -->
    <div class="modal fade" id="agregarAlumno" tabindex="-1" aria-labelledby="agregarAlumnoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="alm_codigo" class="form-label">Ingrese el código:</label>
                        <input type="text" class="form-control" id="alm_codigo"
                            placeholder="Ingrese el código del alumno">
                    </div>
                    <div class="mb-3">
                        <label for="alm_nombre" class="form-label">Ingrese el nombre:</label>
                        <input type="text" class="form-control" id="alm_nombre"
                            placeholder="Ingrese el nombre del alumno">
                    </div>
                    <div class="mb-3">
                        <label for="alm_edad" class="form-label">Ingrese la edad:</label>
                        <input type="text" class="form-control" id="alm_edad" placeholder="Ingrese la edad del alumno">
                    </div>
                    <div class="mb-3">
                        <label for="alm_sexo" class="form-label">Seleccione el sexo del alumno:</label>
                        <select class="form-select" id="alm_sexo" aria-label="Default select example">
                            <option value="" selected>Seleccione el sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alm_id_grd" class="form-label">Ingrese el grado del alumno:</label>
                        <select class="form-select" id="alm_id_grd" aria-label="Default select example">
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ingrese observación"
                                id="alm_observacion"></textarea>
                            <label for="alm_observacion">Observaciones</label>
                        </div>
                    </div>
                    <div id="errors"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-primary" onclick="guardarInformacion()">Guardar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  Modificacion Materia -->
    <div class="modal fade" id="modificarAlumno" tabindex="-1" aria-labelledby="modificarAlumnoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="alm_id" id="alm_id">
                    <div class="mb-3">
                        <label for="alm_codigo_u" class="form-label">Ingrese el código:</label>
                        <input type="text" class="form-control" id="alm_codigo_u"
                            placeholder="Ingrese el código del alumno">
                    </div>
                    <div class="mb-3">
                        <label for="alm_nombre_u" class="form-label">Ingrese el nombre:</label>
                        <input type="text" class="form-control" id="alm_nombre_u"
                            placeholder="Ingrese el nombre del alumno">
                    </div>
                    <div class="mb-3">
                        <label for="alm_edad_u" class="form-label">Ingrese la edad:</label>
                        <input type="text" class="form-control" id="alm_edad_u" placeholder="Ingrese la edad del alumno">
                    </div>
                    <div class="mb-3">
                        <label for="alm_sexo_u" class="form-label">Seleccione el sexo del alumno:</label>
                        <select class="form-select" id="alm_sexo_u" aria-label="Default select example">
                            <option value="" selected>Seleccione el sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alm_id_grd_u" class="form-label">Ingrese el grado del alumno:</label>
                        <select class="form-select" id="alm_id_grd_u" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ingrese observación"
                                id="alm_observacion_u"></textarea>
                            <label for="alm_observacion_u">Observaciones</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-primary" onclick="modificarInformacion()">Guardar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/alumno.js') }}"></script>
@endsection
