const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

$('#registrar').click(function (event) {
    event.preventDefault();

    var correo, nombre, apellidos, edad, contraseña, expPass, ExpEmail;


    correo = $('#correo').val();
    nombre = $('#nombre').val();
    apellidos = $('#apellidos').val();
    edad = document.getElementById("edad").value;
    contraseña = $('#contraseña').val();



    expPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?8])([A-Za-z\d$@$!%?&]|[^ ]){8,15}$/;
    ExpEmail = /^[\w.-]+@[a-zA-Z_-]+?(?:\.[a-zA-Z]{2,6})+$/;

    if (correo.length == 0 || edad == 0 || contraseña.length == 0 || nombre.length == 0 || apellidos.length == 0) {
        swal("Error", "No dejes campos vacios", "error");
        return false;
    } else if (nombre > 30 && nombre.length < 5) {
        swal("Error", "Nombre no valido", "error");
        return false;
    } else if (apellidos > 30 && apellidos.length < 5) {
        swal("Error", "Apellidos no valido", "error");
        return false;
    } else if (!ExpEmail.test(correo) && correo.length > 40) {
        swal("Error", "Correo no valido", "error");
        return false;
    } else if (edad < 18) {
        swal("Error", "Debe ser mayor de edad", "error");
        return false;
    } else if (!expPass.test(contraseña)) {
        swal("Error", "Password debil", "error")
        return false;
    } else {
        $.ajax({
            url: "php/registro.php",
            type: "POST",
            data: { correo: correo, edad: edad, contraseña: contraseña, nombre: nombre, apellidos: apellidos },
            success: function (data) {
                console.log("Ajax success:", data);
                if (data == 1) {
                    swal("Exito", "Registro correcto", "success");
                } else {
                    swal("Error", "Registro fallido", "error");
                }
                $('input').val('');

            },
            error: function (xhr, status, error) {
                console.log("Ajax error:", status, error);
                swal("Error", "Ocurrió un error en la conexión", "error");
            }
        });
    }

});


$('#iniciar').click(function (event) {
    event.preventDefault();

    let correo = document.getElementById('emaill');
    let contraseña = document.getElementById('passwordl');

    data();

    function data() {
        let datos = new FormData();

        datos.append("emaill", correo.value);
        datos.append("passwordl", contraseña.value);
        fetch('php/validar.php', {
            method: 'POST',
            body: datos
        }).then(Response => Response.json())
            .then(({ success, tipo }) => {
                if (success === 1) {

                    if (tipo === 2) {
                        swal("Correcto", "Admin ingresado", "success");
                        //location.href = '/ForceDragon/app/config/productos/producto.php';
                    } else {
                        swal("Correcto", "Usuario ingresado", "success");
                        location.href = 'clientes/interfazcliente.php';
                    }

                } else {
                    swal("Error..", "Email o contraseña no valido", "error");
                }
            });
    }





});


