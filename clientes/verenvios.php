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
    $sql = "SELECT id_envio, remitente , receptor, descripcion_envio, peso, precio, calle, numero, colonia, municipio, estado, pais, cp, seguimiento, descripcion_dom FROM envios WHERE id_usuario = '$id'";
    $result = $conexion->query($sql);




    



?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver envios</title>
    <link rel="stylesheet" href="../css/cliente.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
                <h2>Menú</h2>
                <a href="interfazcliente.php">Información</a>
                <a href="newenvio.php">Nuevo Envío</a>
                <a href="#" class="active">Ver Envíos</a>
                <a href="#">Historial de Envíos</a>
                <a href="cerrarsesion.php" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesion</a>
            </div>
            <div class="col-sm-9">
                <h2>Información de Envíos</h2>
                <table class="table table-bordered">
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
                            echo "<td><a href='generar_guia.php?id_envio=" . $row['id_envio'] . "' class='btn btn-primary btn-sm'>Generar Guía</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
