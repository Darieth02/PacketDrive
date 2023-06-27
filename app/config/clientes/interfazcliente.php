<?php

    require '../conexion.php';
    $conexion=conectar();


    //seguridad de sessiones

    session_start();
    error_reporting(0);

    $varsesion = $_SESSION['tipo_usuario'];
    if($varsesion==null || $varsesion=='' || $varsesion!='usuario'){
        echo "no tienes autorizacion debes iniciar sesion primero ";?> <a href="../../../Register.php" class="btn btn-primary">Regresar </a><?php
        die();
    }



    



?>  
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Lateral</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .sidebar {
      background-color: #f8f9fa;
      height: 100vh;
    }
    .sidebar a {
      display: block;
      padding: 10px;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #e9ecef;
    }
    .active {
      background-color: #e9ecef;
    }
    .content {
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 sidebar">
        <h2>Menú</h2>
        <a href="#" class="active">Información</a>
        <a href="#">Nuevo Envío</a>
        <a href="#">Ver Envíos</a>
        <a href="#">Historial de Envíos</a>
      </div>
      <div class="col-sm-9 content">
        <h2>Información de la Cuenta</h2>
        <?php
        session_start();

        // Verificar si el cliente ha iniciado sesión
        if (isset($_SESSION['id_usuario'])) {
          require '../conexion.php';
          $conexion = conectar();

          $id = $_SESSION['id_usuario'];

          $sql = "SELECT * FROM packetdrive.user WHERE id=$id LIMIT 1";
          $resultado = $conexion->query($sql);
          $rows = $resultado->num_rows;

          if ($rows > 0) {
            $cliente = $resultado->fetch_assoc();
            ?>
            <p>Nombre: <?php echo $cliente['nombre']; ?></p>
            <p>Email: <?php echo $cliente['email']; ?></p>
            <!-- Agrega aquí los demás campos que deseas mostrar -->
            <?php
          } else {
            echo "No se encontró la información del cliente.";
          }
        } else {
          echo "El cliente no ha iniciado sesión.";
        }
        ?>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>