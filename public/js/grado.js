const url = '/api/grados';
const url_materias = '/api/materias';

const modalModificar = new bootstrap.Modal(document.getElementById('modificarGrado'), {
    keyboard: false
});
const modalAgregar = new bootstrap.Modal(document.getElementById('agregarGrado'), {
    keyboard: true
});

$(document).ready(function () {
    obtenerGrados();
    obtenerMaterias();
});

function obtenerGrados() {

    fetch(url)
        .then(response => response.json())
        .then(data => {
            $('#tb_grado').empty();
            $.each(data, function (index, value) {
                $('#tb_grado').append(
                    `<tr><td>${value.grd_nombre}</td>` +
                    `<td><button type="button" class="btn btn-warning" onclick="mostrarInformacion(${value.grd_id})">Modificar</button>` +
                    ` <button type="button" class="btn btn-danger" onclick="eliminarInformacion(${value.grd_id})">Eliminar</button></td></tr>`
                );
            });
        });
}

function obtenerMaterias() {

    fetch(url_materias)
        .then(response => response.json())
        .then(data => {
            $('#mxg_id_mat').empty();
            $('#mxg_id_mat_u').empty();
            $.each(data, function (index, value) {
                $('#mxg_id_mat').append(`<option value="${value.mat_id}">${value.mat_nombre}</option>`);
                $('#mxg_id_mat_u').append(`<option value="${value.mat_id}">${value.mat_nombre}</option>`);
            });
        });
}

function mostrarInformacion(grd_id) {
    $.ajax({
        type: "GET",
        url: `${url}/${grd_id}`,
        data: [],
        dataType: "JSON",
        success: function (data) {
            $('#grd_id').val(data.grd_id);
            $('#grd_nombre_u').val(data.grd_nombre);
            let materias = [];
            $.each(data.materias_grado, function (index, value) {
                materias.push(value.mxg_id_mat);
            });
            $('#mxg_id_mat_u').val(materias)
            modalModificar.show();
        }
    });
}

function guardarInformacion() {

    let form = new FormData();
    form.append('grd_nombre', document.getElementById('grd_nombre').value);
    //agregando valores del select al form data
    let materias = $('#mxg_id_mat').val();
    for (let i = 0; i < materias.length; i++) {
        form.append(`mxg_id_mat[${i}]`, materias[i]);
    }
    fetch(url, {
            method: 'POST',
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
                obtenerGrados();
            }
        })
        .catch(error => console.log(error));
}

function modificarInformacion() {
    const grd_nombre = document.getElementById('grd_nombre_u').value
    const mxg_id_mat = JSON.stringify($('#mxg_id_mat_u').val());
    const grd_id = document.getElementById('grd_id').value;
    fetch(`${url}/${grd_id}?grd_nombre=${grd_nombre}&mxg_id_mat=${mxg_id_mat}`, {
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
                obtenerGrados();
            }
        });
}

function eliminarInformacion(grd_id) {
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
            fetch(`${url}/${grd_id}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(resp => {
                    swalWithBootstrapButtons.fire(
                        'Eliminado!',
                        resp.message,
                        'success'
                    );
                    obtenerGrados();
                });

        }
    })

}
