@extends('welcome')
@section('content')
    <div class="container pt-5 align-items-center">
        <div class="col-12 text-center mt-5">
            <h2>Grados</h2>
        </div>
        <div class="col-12 text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarGrado">
                Agregar Grado
            </button>
        </div>
        <div class="col-12 text-center pt-4">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tb_grado">
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Creacion Materia -->
    <div class="modal fade" id="agregarGrado" tabindex="-1" aria-labelledby="agregarGradoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Grado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="grd_nombre" class="form-label">Ingrese el nombre:</label>
                        <input type="text" class="form-control" id="grd_nombre" placeholder="Ingrese el nombre del grado">
                    </div>
                    <div class="mb-3">
                        <label for="mxg_id_mat" class="form-label">Seleccione las materias:</label>
                        <select class="form-select" id="mxg_id_mat" multiple aria-label="multiple select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-primary" onclick="guardarInformacion()">Guardar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  Modificacion Materia -->
    <div class="modal fade" id="modificarGrado" tabindex="-1" aria-labelledby="modificarGradoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Grado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="csrf-token" id="csrf-token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="grd_id" id="grd_id">
                    <div class="mb-3">
                        <label for="grd_nombre_u" class="form-label">Ingrese el nombre:</label>
                        <input type="text" class="form-control" id="grd_nombre_u"
                            placeholder="Ingrese el nombre del grado">
                    </div>
                    <div class="mb-3">
                        <label for="gxm_id_mat_u" class="form-label">Seleccione las materias:</label>
                        <select class="form-select" id="mxg_id_mat_u" multiple aria-label="multiple select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
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
    <script src="{{ asset('js/grado.js') }}"></script>
@endsection
