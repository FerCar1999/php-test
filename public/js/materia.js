const url = '/api/materias';

const modalModificar = new bootstrap.Modal(document.getElementById('modificarMateria'), {
    keyboard: false
});
const modalAgregar = new bootstrap.Modal(document.getElementById('agregarMateria'), {
    keyboard: true
});

$(document).ready(function () {
    obtenerMaterias();
});

function obtenerMaterias() {

    fetch(url)
        .then(response => response.json())
        .then(data => {
            $('#tb_materia').empty();
            $.each(data, function (index, value) {
                $('#tb_materia').append(
                    `<tr><td>${value.mat_nombre}</td>` +
                    `<td><button type="button" class="btn btn-warning" onclick="mostrarInformacion(${value.mat_id})">Modificar</button>` +
                    ` <button type="button" class="btn btn-danger" onclick="eliminarInformacion(${value.mat_id})">Eliminar</button></td></tr>`
                );
            });
        });
}

function mostrarInformacion(mat_id) {
    $.ajax({
        type: "GET",
        url: `${url}/${mat_id}`,
        data: [],
        dataType: "JSON",
        success: function (data) {
            $('#mat_id').val(data.mat_id);
            $('#mat_nombre_u').val(data.mat_nombre);
            modalModificar.show();
        }
    });
}

function guardarInformacion() {
    let form = new FormData();
    form.append('mat_nombre', document.getElementById('mat_nombre').value);
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
                obtenerMaterias();
            }
        })
        .catch(error => console.log(error));
}

function modificarInformacion() {
    const mat_nombre = document.getElementById('mat_nombre_u').value
    const mat_id = document.getElementById('mat_id').value;
    fetch(`${url}/${mat_id}?mat_nombre=${mat_nombre}`, {
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
                obtenerMaterias();
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
                    obtenerMaterias();
                });

        }
    })

}
