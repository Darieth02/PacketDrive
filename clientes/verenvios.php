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
    $id= $_SESSION['id_usuario'];
    $sql = "SELECT * FROM envios WHERE id_usuario = '$id'";
    $result = $conexion->query($sql);




    



?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver envios</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/cliente.css">
    <style>
    /* Agrega aquí tu CSS personalizado */
    /* Reset CSS */
    body,
    h1,
    h2,
    h3,
    p,
    ul,
    li {
        margin: 0;
        padding: 0;
    }

    /* Header */
    .header {
        background-color: #fc0;
        color: #333;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .logo img {
        max-width: 60px;
        margin-right: 1rem;
    }

    .main-menu ul {
        list-style: none;
        display: flex;
        gap: 1rem;
    }

    .main-menu a {
        text-decoration: none;
        color: #333;
        display: flex;
        align-items: center;
    }

    .main-menu a:hover {
        color: white;
    }

    /* Container */
    .container-fluid {
        padding: 2rem;
    }

    /* Sidebar */
    .sidebar {
        background-color: #f3f3f3;
        padding: 1rem;
    }

    /* Content */
    .content {
        padding: 1rem;
    }
  </style>
</head>
<body>
      <header class="header">
        <div class="logo">
          <h1>PacketDrive</h1>
          <small>La velocidad que impulsa tu vida</small>
        </div>
        <nav class="main-menu" id="main-menu">
          <ul>
          <li><a href="interfazlciente.php"><i class="fas fa-user"></i> Información</a></li>
            <li><a href="newenvio.php"><i class="fas fa-plus-circle"></i> Nuevo Envío</a></li>
            <li><a href="verenvios.php"><i class="fas fa-list"></i> Ver Envíos</a></li>
            <li><a href="cerrarsesion.php""><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
          </ul>
        </nav>
      </header>
            <div class="col-sm-9">
                <h2>Información de Envíos</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID de envío</th>
                            <th>Remitente</th>
                            <th>Receptor</th>
                            <th>Descripción de envío</th>
                            <th>Peso</th>
                            <th>Precio</th>
                            <th>Calle</th>
                            <th>Número</th>
                            <th>Colonia</th>
                            <th>Municipio</th>
                            <th>Estado</th>
                            <th>País</th>
                            <th>Código Postal</th>
                            <th>Número de seguimiento</th>
                            <th>Descripción de domicilio</th>
                            <th>Fecha envio</th>
                            <th>Estatus del envio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<>";
                            echo "<td>" . $row['id_envio'] . "</td>";
                            echo "<td>" . $row['remitente'] . "</td>";
                            echo "<td>" . $row['receptor'] . "</td>";
                            echo "<td>" . $row['descripcion_envio'] . "</td>";
                            echo "<td>" . $row['peso'] . "</td>";
                            echo "<td>" . $row['precio'] . "</td>";
                            echo "<td>" . $row['calle'] . "</td>";
                            echo "<td>" . $row['numero'] . "</td>";
                            echo "<td>" . $row['colonia'] . "</td>";
                            echo "<td>" . $row['municipio'] . "</td>";
                            echo "<td>" . $row['estado'] . "</td>";
                            echo "<td>" . $row['pais'] . "</td>";
                            echo "<td>" . $row['cp'] . "</td>";
                            echo "<td>" . $row['seguimiento'] . "</td>";
                            echo "<td>" . $row['descripcion_dom'] . "</td>";
                            echo "<td>" . $row['fecha_envio'] . "</td>";
                            echo "<td>" . $row['estado_envio'] . "</td>";
                            echo "<td><a href='generar_guia.php?id_envio=" . $row['id_envio'] . "' class='btn btn-primary btn-sm'>Generar Guía</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        
</body>
</html>
