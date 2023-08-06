<?php
// Debes tener en cuenta que este código es solo una representación del archivo y que es posible que necesites ajustarlo a tu base de datos y estructura real.

require '../php/conexion.php';
$conexion = conectar();

// Seguridad de sesiones
session_start();
error_reporting(0);

$varsesion = $_SESSION['tipo_usuario'];
if ($varsesion == null || $varsesion == '' || $varsesion != 'admin') {
    echo "No tienes autorización, debes iniciar sesión primero ";
    ?><a href="../index.php" class="btn btn-primary">Regresar </a><?php
    die();
}

// Obtener todos los usuarios (excepto administradores)
$sqlEnvios = "SELECT e.*, u.nombre AS nombre_usuario, u.apellidos AS apellidos_usuario FROM envios AS e INNER JOIN user AS u ON e.id_usuario = u.id_usuario";
$envios = $conexion->query($sqlEnvios);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Administrador</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
                <h2>Menú</h2>
                <a href="interfaz_admin.php">Bienvenido, Administrador</a>
                <a href="interfaz_admin.php">Usuarios</a>
                <a href="envios_interfaz.php" class="active">Envíos</a>
                <a href="cerrarsesionadmin.php" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
            </div>
            <div class="col-sm-9 content">
                <h2>Envios Totales</h2>
                <?php if(isset($_SESSION['msg']) && isset($_SESSION['color'])){?>
            <div class="alert alert-<?= $_SESSION['color'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['color']);
                unset($_SESSION['msg']);
                } ?>
                <div class="form-group">
                    <h4>Buscar envios</h4>
                    <input type="text" class="form-control" id="buscarEnvios" placeholder="Buscar por seguimiento, nombre o apellido">
                </div>
                <table id="tablaEnvios" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Remitente</th>
                            <th>Receptor</th>
                            <th>Descripcion Envio</th>
                            <th>Peso</th>
                            <th>Precio</th>
                            <th>Calle</th>
                            <th>Número</th>
                            <th>Colonia</th>
                            <th>Municipio</th>
                            <th>Estado</th>
                            <th>Pais</th>
                            <th>Código Postal</th>
                            <th>Número de seguimiento</th>
                            <th>Descripción de domicilio</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_envio = $envios->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_envio['id_envio']; ?></td>
                                <td><?php echo $row_envio['remitente']; ?></td>
                                <td><?php echo $row_envio['receptor']; ?></td>
                                <td><?php echo $row_envio['descripcion_envio']; ?></td>
                                <td><?php echo $row_envio['peso']; ?></td>
                                <td><?php echo $row_envio['precio']; ?></td>
                                <td><?php echo $row_envio['calle']; ?></td>
                                <td><?php echo $row_envio['numero']; ?></td>
                                <td><?php echo $row_envio['colonia']; ?></td>
                                <td><?php echo $row_envio['municipio']; ?></td>
                                <td><?php echo $row_envio['estado']; ?></td>
                                <td><?php echo $row_envio['pais']; ?></td>
                                <td><?php echo $row_envio['cp']; ?></td>
                                <td><?php echo $row_envio['seguimiento']; ?></td>
                                <td><?php echo $row_envio['descripcion_dom']; ?></td>
                                <td><?php echo $row_envio['fecha_envio']; ?></td>
                                <td><?php echo $row_envio['estado_envio']; ?></td>
                                <td><?php echo $row_envio['nombre_usuario'] . ' ' . $row_envio['apellidos_usuario']; ?></td>

                                
                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-id="<?=$row_envio['id_envio'];?>" data-bs-target="#editaEnvioModal"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                    <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-id="<?=$row_envio['id_envio'];?>" data-bs-target="#eliminaEnvioModal" ><i class="fa-solid fa-trash"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'editaEnvioModal.php'; ?>
    <?php include 'eliminaEnvioModal.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
    <script>
    let editaEnvioModal=document.getElementById('editaEnvioModal')
    let eliminaEnvioModal=document.getElementById('eliminaEnvioModal')

    

    editaEnvioModal.addEventListener('hide.bs.modal',event =>{
        editaEnvioModal.querySelector('.modal-body #remitente').value=""
        editaEnvioModal.querySelector('.modal-body #receptor').value=""
        editaEnvioModal.querySelector('.modal-body #descripcion').value=""
        editaEnvioModal.querySelector('.modal-body #peso').value=""
        editaEnvioModal.querySelector('.modal-body #precio').value=""
        editaEnvioModal.querySelector('.modal-body #calle').value=""
        editaEnvioModal.querySelector('.modal-body #numero').value=""
        editaEnvioModal.querySelector('.modal-body #colonia').value=""
        editaEnvioModal.querySelector('.modal-body #municipio').value=""
        editaEnvioModal.querySelector('.modal-body #estado').value=""
        editaEnvioModal.querySelector('.modal-body #pais').value=""
        editaEnvioModal.querySelector('.modal-body #codigo_postal').value=""
        editaEnvioModal.querySelector('.modal-body #fecha').value=""
        editaEnvioModal.querySelector('.modal-body #estatus').value=""
        editaEnvioModal.querySelector('.modal-body #seguimiento').value=""
        editaEnvioModal.querySelector('.modal-body #descripcion_dom').value=""
    })

    editaEnvioModal.addEventListener('shown.bs.modal', event => {
        let button=event.relatedTarget
        let id=button.getAttribute('data-bs-id')

        let inputId=editaEnvioModal.querySelector('.modal-body #id_envio')
        let inputRemitente=editaEnvioModal.querySelector('.modal-body #remitente')
        let inputReceptor=editaEnvioModal.querySelector('.modal-body #receptor')
        let inputDescripcion=editaEnvioModal.querySelector('.modal-body #descripcion')
        let inputPeso=editaEnvioModal.querySelector('.modal-body #peso')
        let inputPrecio=editaEnvioModal.querySelector('.modal-body #precio')
        let inputCalle=editaEnvioModal.querySelector('.modal-body #calle')
        let inputNumero=editaEnvioModal.querySelector('.modal-body #numero')
        let inputColonia=editaEnvioModal.querySelector('.modal-body #colonia')
        let inputMunicipio=editaEnvioModal.querySelector('.modal-body #municipio')
        let inputEstado=editaEnvioModal.querySelector('.modal-body #estado')
        let inputPais=editaEnvioModal.querySelector('.modal-body #pais')
        let inputCodigo=editaEnvioModal.querySelector('.modal-body #codigo_postal')
        let inputFecha=editaEnvioModal.querySelector('.modal-body #fecha')
        let inputEstatus=editaEnvioModal.querySelector('.modal-body #estatus')
        let inputSeguimiento=editaEnvioModal.querySelector('.modal-body #seguimiento')
        let inputDescripcionDom=editaEnvioModal.querySelector('.modal-body #descripcion_dom')

        let url ="getEnvios.php"
        let formData=new FormData()
        formData.append('id_envio',id)

        fetch(url,{
            method:"POST",
            body:formData
        }).then(response => response.json())
        .then(data => {
            inputId.value= data.id_envio
            inputRemitente.value= data.remitente
            inputReceptor.value= data.receptor
            inputDescripcion.value= data.descripcion_envio
            inputPeso.value= data.peso
            inputPrecio.value= data.precio
            inputCalle.value= data.calle
            inputNumero.value= data.numero
            inputColonia.value= data.colonia
            inputMunicipio.value= data.municipio
            inputEstado.value= data.estado
            inputPais.value= data.pais
            inputCodigo.value= data.cp
            inputFecha.value= data.fecha_envio
            inputEstatus.value= data.estado_envio
            inputSeguimiento.value= data.seguimiento
            inputDescripcionDom.value= data.descripcion_dom
        }).catch(err => console.log(err))

    })


    eliminaEnvioModal.addEventListener('shown.bs.modal',event =>{
        let button=event.relatedTarget
        let id=button.getAttribute('data-bs-id')

        eliminaEnvioModal.querySelector('.modal-footer #id').value = id

    })

    $(document).ready(function() {
    // Función para filtrar la tabla
    function filtrarTabla() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("buscarEnvios");
      filter = input.value.toUpperCase();
      table = document.getElementById("tablaEnvios");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        tdSeguimiento = tr[i].getElementsByTagName("td")[13]; // Índice de la columna del número de seguimiento (comenzando desde 0)
        tdIdUsuario = tr[i].getElementsByTagName("td")[15]; // Índice de la columna del ID de usuario (comenzando desde 0)
        if (tdSeguimiento || tdIdUsuario) {
          txtSeguimiento = tdSeguimiento.textContent || tdSeguimiento.innerText;
          txtIdUsuario = tdIdUsuario.textContent || tdIdUsuario.innerText;
          if (txtSeguimiento.toUpperCase().indexOf(filter) > -1 || txtIdUsuario.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    // Llamamos a la función cuando se escribe en el campo de búsqueda
    $("#buscarEnvios").on("keyup", function() {
      filtrarTabla();
    });

    // También podemos llamar a la función al cargar la página para que la tabla se filtre desde el inicio
    filtrarTabla();
  });
</script>
<script src="../js/bootstrap.min.js"></script>
</body>

</html>

