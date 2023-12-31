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
  <title>Formulario Envios</title>
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
          <li><a href="interfazcliente.php"><i class="fas fa-user"></i> Información</a></li>
            <li><a href="newenvio.php"><i class="fas fa-plus-circle"></i> Nuevo Envío</a></li>
            <li><a href="verenvios.php"><i class="fas fa-list"></i> Ver Envíos</a></li>
            <li><a href="cerrarsesion.php""><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
          </ul>
        </nav>
      </header>
    </div>
      <div class="col-sm-9 content">
        <div class="container-form">
        <?php if(isset($_SESSION['msg']) && isset($_SESSION['color'])){?>
            <div class="alert alert-<?= $_SESSION['color'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['color']);
                unset($_SESSION['msg']);
                } ?>
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
              <input type="text" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio del envio" readonly>
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
              <input type="text" class="form-control" name="descripcion_dom" id="descripcion_dom" placeholder="Ingresa una descripción del domicilio">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjd05ahoKca5GTvfYy4MSAQkGQ2lcmG_w&libraries=places&callback=initMap" async defer></script>  <script src="../js/getmapa.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
        $(document).ready(function() {
            $('#pais').on('input', function() {
                var paisIngresado = $(this).val();

                // Realizar la petición para obtener el precio de envío por país
                $.getJSON('../precios.json', function(data) {
                    // Buscar el país ingresado en el JSON y obtener el precio de envío en dólares
                    var precioEnvioUSD = null;
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].pais.toLowerCase() === paisIngresado.toLowerCase()) {
                            precioEnvioUSD = data[i].precio_envio;
                            break;
                        }
                    }

                    // Verificar si se encontró el precio en dólares para el país ingresado
                    if (precioEnvioUSD !== null) {
                        // Calcular el precio de envío en pesos mexicanos con el valor de conversión
                        var factorConversion = 17.9;
                        var precioEnvioMXN = precioEnvioUSD * factorConversion;

                        // Actualizar el valor del input de precio con el precio en pesos mexicanos
                        $('#precio').val(precioEnvioMXN.toFixed(2));
                    } else {
                        // Si el país no se encontró en el JSON, mostrar un mensaje de error en el input de precio
                        $('#precio').val('País no encontrado');
                    }
                });
            });
        });
    </script>

</body>
</html>