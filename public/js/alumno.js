const url = '/api/alumnos';
const url_grados = '/api/grados';

const modalModificar = new bootstrap.Modal(document.getElementById('modificarAlumno'), {
    keyboard: false
});
const modalAgregar = new bootstrap.Modal(document.getElementById('agregarAlumno'), {
    keyboard: true
});

$(document).ready(function () {
    obtenerAlumnos();
    obtenerGrados();
});

function obtenerAlumnos() {

    fetch(url)
        .then(response => response.json())
        .then(data => {
            $('#tb_alumno').empty();
            $.each(data, function (index, value) {
                $('#tb_alumno').append(
                    `<tr><td>${value.alm_codigo}</td>` +
                    `<td>${value.alm_nombre}</td>` +
                    `<td>${value.grado.grd_nombre}</td>` +
                    `<td><button type="button" class="btn btn-warning" onclick="mostrarInformacion(${value.alm_id})">Modificar</button>` +
                    ` <button type="button" class="btn btn-danger" onclick="eliminarInformacion(${value.alm_id})">Eliminar</button></td></tr>`
                );
            });
        });
}

function obtenerGrados() {

    fetch(url_grados)
        .then(response => response.json())
        .then(data => {
            $('#alm_id_grd').empty();
            $('#alm_id_grd_u').empty();
            $('#alm_id_grd').append('<option value="" selected>Seleccione una opcion</option>');
            $('#alm_id_grd_u').append('<option value="" selected>Seleccione una opcion</option>');
            $.each(data, function (index, value) {
                $('#alm_id_grd').append(`<option value="${value.grd_id}">${value.grd_nombre}</option>`);
                $('#alm_id_grd_u').append(`<option value="${value.grd_id}">${value.grd_nombre}</option>`);
            });
        });
}

function mostrarInformacion(alm_id) {
    $.ajax({
        type: "GET",
        url: `${url}/${alm_id}`,
        data: [],
        dataType: "JSON",
        success: function (data) {
            $('#alm_id').val(data.alm_id);
            $('#alm_codigo_u').val(data.alm_codigo);
            $('#alm_nombre_u').val(data.alm_nombre);
            $('#alm_edad_u').val(data.alm_edad);
            $('#alm_sexo_u').val(data.alm_sexo);
            $('#alm_id_grd_u').val(data.alm_id_grd);
            $('#alm_observacion_u').val(data.alm_observacion);
            modalModificar.show();
        }
    });
}

function guardarInformacion() {
    let form = new FormData();
    form.append('alm_codigo', document.getElementById('alm_codigo').value);
    form.append('alm_nombre', document.getElementById('alm_nombre').value);
    form.append('alm_edad', document.getElementById('alm_edad').value);
    form.append('alm_sexo', document.getElementById('alm_sexo').value);
    form.append('alm_id_grd', document.getElementById('alm_id_grd').value);
    form.append('alm_observacion', document.getElementById('alm_observacion').value);
    fetch(url, {
            method: 'POST',
            redirect: 'follow',
            body: form,
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(resp => {
            if (resp.message == "The given data was invalid.") {
                for (const error in resp.errors) {
                    $(`#${error}`).addClass('is-invalid');
                }
                $('#errors').empty();
                $.each(resp.errors, function (i, v) {
                    $('#errors').append(`<div class="alert alert-warning" role="alert">${v}</div>`);
                });
                Swal.fire({
                    title: 'Advertencia',
                    text: "Debe llenar los campos en rojo",
                    icon: 'warning',
                    confirmButtonText: 'Cerrar'
                });
            } else {
                Swal.fire({
                    title: 'Exito',
                    text: resp.message,
                    icon: 'success',
                    confirmButtonText: 'Cerrar'
                });
                modalAgregar.hide();
                obtenerAlumnos();
            }
        });
}

function modificarInformacion() {
    const alm_codigo = document.getElementById('alm_codigo_u').value
    const alm_nombre = document.getElementById('alm_nombre_u').value
    const alm_edad = document.getElementById('alm_edad_u').value
    const alm_sexo = document.getElementById('alm_sexo_u').value
    const alm_id_grd = document.getElementById('alm_id_grd_u').value
    const alm_observacion = document.getElementById('alm_observacion_u').value
    const alm_id = document.getElementById('alm_id').value;
    fetch(`${url}/${alm_id}?alm_codigo=${alm_codigo}&alm_nombre=${alm_nombre}&alm_edad=${alm_edad}&alm_sexo=${alm_sexo}&alm_id_grd=${alm_id_grd}&alm_observacion=${alm_observacion}`, {
            method: 'PUT',
            redirect: 'follow',
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(resp => {
            if (resp.message == "The given data was invalid.") {
                for (const error in resp.errors) {
                    $(`#${error}_u`).addClass('is-invalid');
                }
                Swal.fire({
                    title: 'Advertencia',
                    text: "Debe llenar los campos en rojo",
                    icon: 'warning',
                    confirmButtonText: 'Cerrar'
                });
            } else {
                Swal.fire({
                    title: 'Exito',
                    text: resp.message,
                    icon: 'success',
                    confirmButtonText: 'Cerrar'
                });
                modalModificar.hide();
                obtenerAlumnos();
            }
        });
}

function eliminarInformacion(mat_id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Está seguro de eliminar este campo?',
        text: "Una vez eliminado, no se puede regresar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`${url}/${mat_id}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(resp => {

                    swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        resp.message,
                        'success'
                    );
                    obtenerAlumnos();
                });

        }
    })

}
