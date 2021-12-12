@extends('welcome')
@section('content')
    <div class="container pt-5 align-items-center">
        <div class="col-12 text-center mt-5">
            <h2>Materias de Alumnos</h2>
        </div>
        <div class="col-12 text-center">
            <label for="buscador">Seleccione un alumno</label>
            <select class="form-select" id="buscador" onchange="buscar();">
                <option selected value="todo">Todos</option>
            </select>
        </div>
        <div class="col-12 text-center pt-4">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Alumno</th>
                        <th scope="col">Grado</th>
                        <th scope="col">Materias</th>
                    </tr>
                </thead>
                <tbody id="tb_materias_alumno">
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/materias_alumno.js') }}"></script>
@endsection
