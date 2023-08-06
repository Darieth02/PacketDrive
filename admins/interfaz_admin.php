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
$sqlUsuarios = "SELECT * FROM user WHERE tipo_usuario != 'admin'";
$usuarios = $conexion->query($sqlUsuarios);
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
                <a href="interfaz_admin.php" class="active">Bienvenido, Administrador</a>
                <a href="usuarios.php">Usuarios</a>
                <a href="envios_interfaz.php">Envíos</a>
                <a href="cerrarsesionadmin.php" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
            </div>
            <div class="col-sm-9 content">
                <h2>Usuarios Registrados</h2>
                <input type="text" class="form-control" id="buscarUsuarios" placeholder="Buscar por nombre, id, correo">

                <?php if(isset($_SESSION['msg']) && isset($_SESSION['color'])){?>
            <div class="alert alert-<?= $_SESSION['color'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['color']);
                unset($_SESSION['msg']);
                } ?>
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo Registro</a>

                <table id="tablaUsuarios" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_usuario = $usuarios->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_usuario['id_usuario']; ?></td>
                                <td><?php echo $row_usuario['nombre']; ?></td>
                                <td><?php echo $row_usuario['apellidos']; ?></td>
                                <td><?php echo $row_usuario['edad']; ?></td>
                                <td><?php echo $row_usuario['correo']; ?></td>
                                <td><?php echo $row_usuario['contraseña']; ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-id="<?=$row_usuario['id_usuario'];?>" data-bs-target="#editaModal"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                    <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-id="<?=$row_usuario['id_usuario'];?>" data-bs-target="#eliminaModal" ><i class="fa-solid fa-trash"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'nuevoModal.php'; ?>
    <?php include 'editaModal.php'; ?>
    <?php include 'eliminaModal.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
    <script>
    let nuevoModal=document.getElementById('nuevoModal')
    let editaModal=document.getElementById('editaModal')
    let eliminaModal=document.getElementById('eliminaModal')

    nuevoModal.addEventListener('shown.bs.modal',event =>{
        nuevoModal.querySelector('.modal-body #nombre').focus()
        
        
    })

    nuevoModal.addEventListener('hide.bs.modal',event =>{
        nuevoModal.querySelector('.modal-body #nombre').value=""
        nuevoModal.querySelector('.modal-body #apellido').value=""
        nuevoModal.querySelector('.modal-body #edad').value=""
        nuevoModal.querySelector('.modal-body #correo').value=""
        nuevoModal.querySelector('.modal-body #contraseña').value=""
        nuevoModal.querySelector('.modal-body #tipo_usuario').value=""
        
    })

    editaModal.addEventListener('hide.bs.modal',event =>{
        editaModal.querySelector('.modal-body #nombre').value=""
        editaModal.querySelector('.modal-body #apellido').value=""
        editaModal.querySelector('.modal-body #edad').value=""
        editaModal.querySelector('.modal-body #correo').value=""
        editaModal.querySelector('.modal-body #contraseña').value=""
        editaModal.querySelector('.modal-body #tipo_usuario').value=""
    })

    editaModal.addEventListener('shown.bs.modal', event => {
        let button=event.relatedTarget
        let id=button.getAttribute('data-bs-id')

        let inputId=editaModal.querySelector('.modal-body #id_usuario')
        let inputNombre=editaModal.querySelector('.modal-body #nombre')
        let inputApellido=editaModal.querySelector('.modal-body #apellido')
        let inputEdad=editaModal.querySelector('.modal-body #edad')
        let inputCorreo=editaModal.querySelector('.modal-body #correo')
        let inputContraseña=editaModal.querySelector('.modal-body #contraseña')
        let inputTipo=editaModal.querySelector('.modal-body #tipo_usuario')

        let url ="getUsuario.php"
        let formData=new FormData()
        formData.append('id_usuario',id)

        fetch(url,{
            method:"POST",
            body:formData
        }).then(response => response.json())
        .then(data => {
            inputId.value= data.id_usuario
            inputNombre.value= data.nombre
            inputApellido.value= data.apellidos
            inputEdad.value= data.edad
            inputCorreo.value= data.correo
            inputContraseña.value= data.contraseña
            inputTipo.value= data.tipo_usuario
        }).catch(err => console.log(err))

    })


    eliminaModal.addEventListener('shown.bs.modal',event =>{
        let button=event.relatedTarget
        let id=button.getAttribute('data-bs-id')

        eliminaModal.querySelector('.modal-footer #id').value = id

    })
    $(document).ready(function() {
  // Función para filtrar la tabla
  function filtrarTabla() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("buscarUsuarios"); // Cambiar el ID al del campo de búsqueda de usuarios
    filter = input.value.toUpperCase();
    table = document.getElementById("tablaUsuarios"); // Cambiar el ID al de la tabla de usuarios
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      tdID = tr[i].getElementsByTagName("td")[0];
      tdNombre = tr[i].getElementsByTagName("td")[1];
      tdCorreo = tr[i].getElementsByTagName("td")[4];

      if (tdID || tdNombre || tdCorreo) {
        txtID = tdID.textContent || tdID.innerText;
        txtNombre = tdNombre.textContent || tdNombre.innerText;
        txtCorreo = tdCorreo.textContent || tdCorreo.innerText;

        if (
          txtID.toUpperCase().indexOf(filter) > -1 ||
          txtNombre.toUpperCase().indexOf(filter) > -1 ||
          txtCorreo.toUpperCase().indexOf(filter) > -1
        ) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  // Llamamos a la función cuando se escribe en el campo de búsqueda
  $("#buscarUsuarios").on("keyup", function() {
    filtrarTabla();
  });

  // También podemos llamar a la función al cargar la página para que la tabla se filtre desde el inicio
  filtrarTabla();
});


</script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>

