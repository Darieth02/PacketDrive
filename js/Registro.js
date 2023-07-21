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



    expPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,15}$/;
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

    if (correo.value.length == 0 || contraseña.value.length == 0) {
        swal("Error", "No dejes espacios vacios", "error");
        return false;
    } else {

        let datos = new FormData();
        datos.append("emaill", correo.value);
        datos.append("passwordl", contraseña.value);

        fetch('php/validar.php', {
            method: 'POST',
            body: datos
        }).then(response => response.json())
            .then(({ success, tipo, message }) => {
                if (success === 1) {
                    if (tipo === 2) {
                        swal("Correcto", "Admin ingresado", "success");
                        location.href = 'admins/interfaz_admin.php';
                    } else {
                        swal("Correcto", "Usuario ingresado", "success");
                        location.href = 'clientes/interfazcliente.php';
                    }
                } else {
                    swal("Error", message, "error");
                }
            })
            .catch(error => {
                swal("Error", "Contraseña o correo no valida", "error");
            });
    }
});



$('#contraseña').click(function () {
    $('#requisitos-contraseña').show();
});

$('#contraseña').on('input', function () {
    var contraseña = $(this).val();

    if (/[a-z]/.test(contraseña)) {
        $('#requisito-1').addClass('cumplido');
    } else {
        $('#requisito-1').removeClass('cumplido');
    }

    if (/[A-Z]/.test(contraseña)) {
        $('#requisito-2').addClass('cumplido');
    } else {
        $('#requisito-2').removeClass('cumplido');
    }

    if (/\d/.test(contraseña)) {
        $('#requisito-3').addClass('cumplido');
    } else {
        $('#requisito-3').removeClass('cumplido');
    }

    if (contraseña.length >= 8 && contraseña.length <= 15) {
        $('#requisito-4').addClass('cumplido');
    } else {
        $('#requisito-4').removeClass('cumplido');
    }
});


$('#toggle-contraseña').click(function () {
    var contraseñaInput = $('#contraseña');
    var passwordlInput = $('#passwordl');

    var icono = $(this).find('i');

    if (contraseñaInput.attr('type') === 'password' || passwordlInput.attr('type') === 'password') {
        contraseñaInput.attr('type', 'text');
        passwordlInput.attr('type', 'text');

        icono.removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
        contraseñaInput.attr('type', 'password');
        passwordlInput.attr('type', 'password');

        icono.removeClass('fa-eye').addClass('fa-eye-slash');
    }
});
