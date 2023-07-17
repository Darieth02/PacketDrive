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
        <a href="interfazcliente.php" >Información</a>
        <a href="#" class="active">Nuevo Envío</a>
        <a href="#">Ver Envíos</a>
        <a href="#">Historial de Envíos</a>
        <a href="cerrarsesion.php" class="btn btn-primary" ><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesion</a>

      </div>
      <div class="col-sm-9 content">
      <div class="container mt-4">
            <h2>Información de Persona</h2>
        <form action="agregar_envio.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="remitente">Nombre de Remitente:</label>
            <input type="text" class="form-control" name="remitente" id="remitente" placeholder="Ingrese el nombre del remitente">
            </div>
            <div class="form-group">
            <label for="receptor">Nombre de Receptor:</label>
            <input type="text" class="form-control" name="receptor" id="receptor" placeholder="Ingrese el nombre del receptor">
            </div>
            <div class="form-group">
            <label for="descripcion">Descripción de Envío:</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese una descripción breve del envío">
            </div>
            <div class="form-group">
            <label for="peso">Peso del Envío:</label>
            <input type="text" class="form-control" name="peso" id="peso" placeholder="Ingrese el peso del envío">
            </div>
            <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio del envio">
            </div>

            <h2>Dirección</h2>
            <div id="map"></div>
            <div class="form-group">
            <label for="calle">Calle:</label>
            <input type="text" class="form-control" name="calle" id="calle" placeholder="Ingrese el nombre de la calle">
            </div>
            <div class="form-group">
            <label for="numero">Número Interior y Exterior:</label>
            <input type="text" class="form-control" name="numero" id="numero" placeholder="Ingrese el número interior y exterior">
            </div>
            <div class="form-group">
            <label for="colonia">Colonia:</label>
            <input type="text" class="form-control" name="colonia" id="colonia" placeholder="Ingrese el nombre de la colonia">
            </div>
            <div class="form-group">
            <label for="municipio">Municipio o Ciudad:</label>
            <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Ingrese el municipio o ciudad">
            </div>
            <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" name="estado" id="estado" placeholder="Ingrese el estado">
            </div>
            <div class="form-group">
            <label for="pais">País:</label>
            <input type="text" class="form-control" name="pais" id="pais" placeholder="Ingrese el país">
            </div>
            <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" placeholder="Ingrese el código postal">
            </div>
            <div class="form-group">
            <label for="descripcion_dom">Descripción de domicilio:</label>
            <input type="text" class="form-control" name="descripcion_dom" id="descripcion_dom" placeholder="Ingresa una descripcion del domicilio">
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjd05ahoKca5GTvfYy4MSAQkGQ2lcmG_w&libraries=places&callback=initMap" async defer></script>
<script src="../js/getmapa.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>