const url = '/api/alumnos';
document.addEventListener("DOMContentLoaded", function (event) {
    obtenerAlumnos();
    buscar();
})


function obtenerAlumnos() {
    //peticion para traer alumnos
    fetch(url)
        .then(response => response.json())
        .then(data => {
            //limpiando buscador
            $('#buscador').empty();
            //seteando option por defecto
            $('#buscador').append('<option value="todo" selected>Todos</option>');
            $.each(data, function (index, value) {
                //insertando alumnos en el select
                $('#buscador').append(`<option value="${value.alm_id}">${value.alm_nombre}</option>`);
            });
        });
}


function buscar() {
    //obteniendo valor del buscador
    let buscador = document.getElementById('buscador').value;
    let url_n;
    //si el buscador tiene como valor un diferente de "todo" va a buscar los demas estudiantes
    url_n = (buscador != "todo") ? `${url}/${buscador}` : url;
    //peticion para traer alumno/s
    fetch(url_n)
        .then(response => response.json())
        .then(data => {
            let materias = "";
            //limpiando tabla
            $('#tb_materias_alumno').empty();
            //si la informacion que viene es mayor a 1
            if (data.length > 1) {
                //llenado de informacion
                $.each(data, function (index, value) {
                    //recorriendo materias para ponerlas en tabla
                    $.each(value.grado.materias_grado, function (index, value) {
                        materias += `<span class="badge bg-secondary">${value.materia.mat_nombre}</span> `
                    });
                    //setenado alumnos en las tablas
                    $('#tb_materias_alumno').append(
                        `<tr><td>${index+1}</td>` +
                        `<td>${value.alm_codigo}</td>` +
                        `<td>${value.alm_nombre}</td>` +
                        `<td>${value.grado.grd_nombre}</td>` +
                        `<td>${materias}</td></tr>`
                    );
                    //limpiando variable de materias
                    materias = "";
                });
            } else {
                //recorriendo materias del alumno
                $.each(data.grado.materias_grado, function (index, value) {
                    materias += `<span class="badge bg-secondary">${value.materia.mat_nombre}</span> `
                });
                //seteando valores del alumno
                $('#tb_materias_alumno').append(
                    `<tr><td>1</td>` +
                    `<td>${data.alm_codigo}</td>` +
                    `<td>${data.alm_nombre}</td>` +
                    `<td>${data.grado.grd_nombre}</td>` +
                    `<td>${materias}</td></tr>`
                );
                //limpiando variable de materias
                materias = "";
            }
        });
}
