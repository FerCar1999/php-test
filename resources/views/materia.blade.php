@extends('welcome')
@section('content')
    <div class="container pt-5 align-items-center">
        <div class="col-12 text-center mt-5">
            <h2>Materias</h2>
        </div>
        <div class="col-12 text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarMateria">
                Agregar Materia
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
                <tbody id="tb_materia">
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Creacion Materia -->
    <div class="modal fade" id="agregarMateria" tabindex="-1" aria-labelledby="agregarMateriaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Materia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="mat_nombre" class="form-label">Ingrese el nombre:</label>
                        <input type="text" class="form-control" id="mat_nombre"
                            placeholder="Ingrese el nombre de la materia">
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
    <div class="modal fade" id="modificarMateria" tabindex="-1" aria-labelledby="modificarMateriaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Materia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="csrf-token" id="csrf-token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="mat_id" id="mat_id">
                    <div class="mb-3">
                        <label for="mat_nombre_u" class="form-label">Ingrese el nombre:</label>
                        <input type="text" class="form-control" id="mat_nombre_u"
                            placeholder="Ingrese el nombre de la materia">
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
    <script src="{{ asset('js/materia.js') }}"></script>
@endsection
