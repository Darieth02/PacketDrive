<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['modal_id_usuario']);
$nombre=$conexion->real_escape_string($_POST['modal_nombre']);
$apellido=$conexion->real_escape_string($_POST['modal_apellido']);
$edad=$conexion->real_escape_string($_POST['modal_edad']);
$correo=$conexion->real_escape_string($_POST['modal_correo']);
$contraseña=$conexion->real_escape_string($_POST['modal_contrasena']);

$sql="UPDATE packetdrive.user SET nombre='$nombre',apellidos='$apellido', edad='$edad',correo='$correo',contraseña='$contraseña'  WHERE id_usuario=$id ";
if($conexion->query($sql)){
    $_SESSION['color'].="success";
    $_SESSION['msg'].="Producto Actualizado";
    
}else{
    $_SESSION['color'].="danger";
    $_SESSION['msg'].="Error al actualizar cuenta";
}

header('Location: interfazcliente.php');







?>