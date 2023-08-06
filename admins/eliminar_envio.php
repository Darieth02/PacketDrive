<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['id']);


$sql="DELETE FROM envios WHERE id_envio=$id ";
if($conexion->query($sql)){
    $_SESSION['color']="success";
    $_SESSION['msg']="Envio Eliminado";
}else{
    $_SESSION['color']="danger";
    $_SESSION['msg']="Error al eliminar envio";
}

header('Location: envios_interfaz.php');







?>