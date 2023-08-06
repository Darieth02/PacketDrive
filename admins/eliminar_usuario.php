<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['id']);


$sql="DELETE FROM user WHERE id_usuario=$id ";
if($conexion->query($sql)){
    $_SESSION['color']="success";
    $_SESSION['msg']="Usuario Eliminado";
}else{
    $_SESSION['color']="danger";
    $_SESSION['msg']="Error al eliminar usuario";
}

header('Location: interfaz_admin.php');







?>