<?php

    require '../php/conexion.php';
    $conexion=conectar();


    //seguridad de sessiones

    session_start();
    error_reporting(0);

    $varsesion = $_SESSION['tipo_usuario'];
    if($varsesion==null || $varsesion=='' || $varsesion!='usuario'){
        echo "no tienes autorizacion debes iniciar sesion primero ";?> <a href="../index.php" class="btn btn-primary">Regresar </a><?php
        die();
    }



    



?>  
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interfaz Cliente</title>
  <link rel="stylesheet" href="../css/cliente.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
  <div class="container-fluid">
    <div class
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 sidebar">
        <h2>Menú</h2>
        <a href="interfazlciente.php" class="active">Información</a>
        <a href="newenvio.php">Nuevo Envío</a>
        <a href="verenvios.php">Ver Envíos</a>
        <a href="cerrarsesion.php" class="btn btn-primary" ><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesion</a>

      </div>
      <div class="col-sm-9 content">
        <?php
              $id= $_SESSION['id_usuario'];
              if($id==null || $id==''){
                echo "No se puede mostrar informacion por que no existe";
              }else{
                $sqlUsuario="SELECT * FROM packetdrive.user WHERE id_usuario='$id'";
                $usuario = $conexion->query($sqlUsuario);
                $row_usuario=$usuario->fetch_assoc();
                
                $nombreUsuario = $row_usuario['nombre']; // Obtener el nombre del usuario desde la base de datos
                echo '<div class="welcome-message">Bienvenido: ' . $nombreUsuario . '</div>';
                
              }

            

        
        ?>
         <h2>Información de la Cuenta</h2>
        <form>
            <div class="form-group">
                        <label for="id_usuario">ID:</label>
                        <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $row_usuario['id_usuario']; ?>">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row_usuario['nombre']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row_usuario['apellidos']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $row_usuario['edad']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $row_usuario['correo']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $row_usuario['contraseña']; ?>" readonly>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary" id="btnModificarCliente" data-toggle="modal" data-target="#editamodalcliente">Modificar</button>
              <button type="button" class="btn btn-danger" id="btnEliminarCuenta" data-toggle="modal" data-target="#confirmarEliminacionModal">Eliminar cuenta</button>

            </div>
           
        </form>

        
       
      </div>
    </div>
  </div>
  <!-- Modal para editar -->
  <div class="modal fade" id="editamodalcliente" tabindex="-1" role="dialog" aria-labelledby="editamodalclienteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editamodalclienteLabel">Editar Información del Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar la información -->
                <form id="formEditarCliente">
                    <!-- Aquí los campos del formulario para editar la información del cliente -->
                    <div class="form-group">
                        <label for="modal_nombre">Nombre:</label>
                        <input type="text" class="form-control" id="modal_nombre" name="modal_nombre">
                    </div>
                    <div class="form-group">
                        <label for="modal_apellido">Apellido:</label>
                        <input type="text" class="form-control" id="modal_apellido" name="modal_apellido">
                    </div>
                    <div class="form-group">
                        <label for="modal_edad">Edad:</label>
                        <input type="text" class="form-control" id="modal_edad" name="modal_edad">
                    </div>
                    <div class="form-group">
                        <label for="modal_correo">Correo:</label>
                        <input type="text" class="form-control" id="modal_correo" name="modal_correo">
                    </div>
                    <div class="form-group">
                        <label for="modal_contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="modal_contrasena" name="modal_contrasena">
                    </div>
                    <input type="hidden" id="modal_id_usuario" name="modal_id_usuario">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarCambios">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
    <!-- Modal de confirmación de eliminación -->

<div class="modal fade" id="confirmarEliminacionModal" tabindex="-1" role="dialog" aria-labelledby="confirmarEliminacionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarEliminacionModalLabel">Confirmar eliminación de cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Para eliminar su cuenta, ingrese su contraseña y haga clic en "Eliminar".</p>
                    <input type="password" class="form-control" id="confirmar_contrasena" placeholder="Ingrese su contraseña">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="btnConfirmarEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Scripts de JavaScript -->
  <script>
    $(document).ready(function() {
        // Manejar el clic en el botón "Modificar"
        $("#btnModificarCliente").on("click", function() {
            // Obtener la información del cliente desde el formulario existente
            var id_cliente = $("#id_usuario").val();
            var nombre = $("#nombre").val();
            var apellido = $("#apellido").val();
            var edad = $("#edad").val();
            var correo = $("#correo").val();
            var contraseña = $("#contrasena").val();

            // Cargar la información del cliente en el formulario del modal
            $("#modal_id_usuario").val(id_cliente);
            $("#modal_nombre").val(nombre);
            $("#modal_apellido").val(apellido);
            $("#modal_edad").val(edad);
            $("#modal_correo").val(correo);
            $("#modal_contrasena").val(contraseña);

            // Abrir el modal al hacer clic en el botón "Modificar"
            $("#editamodalcliente").modal("show");
        });

        // Manejar el clic en el botón "Guardar cambios" dentro del modal
        $("#btnGuardarCambios").on("click", function() {
            // Obtener los datos actualizados del formulario del modal
            var id_cliente = $("#modal_id_usuario").val();
            var nombre = $("#modal_nombre").val();
            var apellido = $("#modal_apellido").val();
            var edad = $("#modal_edad").val();
            var correo = $("#modal_correo").val();
            var contraseña = $("#modal_contrasena").val();

            // Realizar una solicitud AJAX para enviar los datos al servidor (actualizacliente.php)
            $.ajax({
                type: "POST",
                url: "actualizacliente.php", // Ruta al archivo PHP para actualizar el cliente en el servidor
                data: {
                    modal_id_usuario: id_cliente,
                    modal_nombre: nombre,
                    modal_apellido: apellido,
                    modal_edad: edad,
                    modal_correo: correo,
                    modal_contrasena: contraseña
                },
                success: function(response) {
                    // Manejar la respuesta del servidor después de la actualización, si es necesario
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Manejar un error si ocurre al actualizar el cliente en el servidor
                    console.error(error);
                }
            });

            // Cerrar el modal después de guardar los cambios
            $("#editamodalcliente").modal("hide");
        });

        $("#btnConfirmarEliminar").on("click", function() {
        var contrasenaConfirmacion = $("#confirmar_contrasena").val();
        console.log(contrasenaConfirmacion);

        // Realizar una solicitud AJAX para verificar la contraseña en "verificar_contraseña.php"
        $.ajax({
            type: "POST",
            url: "verificar_contrasena.php", // Ruta al archivo PHP para verificar la contraseña
            data: {

                contradada: contrasenaConfirmacion
            },
            success: function(response) {
                // Si la contraseña coincide, redirige a "eliminacliente.php" para eliminar la cuenta
                if (response.trim() === "ok") {
                    window.location.href = "eliminacliente.php";
                } else {
                    // Si la contraseña no coincide, muestra un mensaje de error
                    alert("La contraseña no es correcta. Inténtelo nuevamente.");
                }
            },
            error: function(xhr, status, error) {
                // Manejar un error si ocurre durante la verificación de la contraseña
                console.error(error);
            }
        });

        // Cerrar el modal de confirmación
        $("#confirmarModal").modal("hide");
    });
    });
    
</script>




  
</body>
</html>