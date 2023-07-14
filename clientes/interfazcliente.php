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
  <title>Menú Lateral</title>
  <link rel="stylesheet" href="../css/cliente.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 sidebar">
        <h2>Menú</h2>
        <a href="#" class="active">Información</a>
        <a href="newenvio.php">Nuevo Envío</a>
        <a href="#">Ver Envíos</a>
        <a href="#">Historial de Envíos</a>
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
                
              }

            

        
        ?>
         <h2>Información de la Cuenta</h2>
        <form>
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
        </form>


        
       
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>