

$('#registrar').click(function (event) {
    event.preventDefault();

    var correo = $('#email').val();
    var nombre = $('#nombre').val();
    var apellidos = $('#apellido').val();
    var edad = document.getElementById("edad").value;
    var contraseña = $('#password').val();

    var expPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,15}$/;
    var expEmail = /^[\w.-]+@[a-zA-Z_-]+?(?:\.[a-zA-Z]{2,6})+$/;

    if (correo.length === 0 || edad === 0 || contraseña.length === 0 || nombre.length === 0 || apellidos.length === 0) {
        showErrorAlert("No dejar campos vacios");
        return false;
    } else if (nombre.length > 30 || nombre.length < 5) {
        showErrorAlert("Ingresa un nombre correcto");

        return false;
    } else if (apellidos.length > 30 || apellidos.length < 5) {
        showErrorAlert("Inrgesa un apellido correcto");

        return false;
    } else if (!expEmail.test(correo) || correo.length > 40) {
        showErrorAlert("Ingresa un correo correcto");

        return false;
    } else if (edad < 18) {
        showErrorAlert("Eres menor de edad");

        return false;
    } else if (!expPass.test(contraseña)) {
        showErrorAlert("Ingresa una contraseña correcta");

        return false;
    } else {
        $.ajax({
            url: "php/registro.php",
            type: "POST",
            data: { correo: correo, edad: edad, contraseña: contraseña, nombre: nombre, apellidos: apellidos },
            success: function (data) {
                console.log("Ajax success:", data);
                if (data == 1) {
                    showSuccessAlert("Registrado con exito");

                } else {
                    showErrorAlert("Registro no realizado");

                }
                $('input').val('');
            }
        });
    }
});

$('#iniciar').click(function (event) {
    event.preventDefault();

    var correo = document.getElementById('email').value;
    var contraseña = document.getElementById('password').value;

    if (correo.length === 0 || contraseña.length === 0) {
        showErrorAlert("No dejar campos vacios");

        return false;
    } else {
        var datos = new FormData();
        datos.append("email", correo);
        datos.append("password", contraseña);

        fetch('php/validar.php', {
            method: 'POST',
            body: datos
        }).then(response => response.json())
            .then(({ success, tipo, message }) => {
                console.log(success);
                if (success === 1) {
                    if (tipo === 2) {
                        showSuccessAlert("Bienvenido admin");
                        location.href = 'admins/interfaz_admin.php';
                    } else {
                        showSuccessAlert("Bienvenido Cliente");
                        location.href = 'clientes/interfazcliente.php';
                    }
                } else if (success === 3) {
                    showErrorAlert("No existe el usuario");
                }
                else {
                    showErrorAlert("Algo salio mal");
                }
            });
    }
});

function showErrorAlert(message) {
    Swal.fire({
        icon: "error",
        title: "Error",
        text: message,
        confirmButtonText: "Cerrar"
    });
}

function showSuccessAlert(message) {
    Swal.fire({
        icon: "success",
        title: "Correcto",
        text: message,
        confirmButtonText: "Cerrar"
    });
}

$(document).ready(function () {
    $('#menu-toggle').click(function () {
        console.log("Botón de menú clickeado");
        $('#main-menu').toggleClass('active');
    });
});
