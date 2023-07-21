<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['id_usuario']);
$nombre=$conexion->real_escape_string($_POST['nombre']);
$apellido=$conexion->real_escape_string($_POST['apellido']);
$edad=$conexion->real_escape_string($_POST['edad']);
$correo=$conexion->real_escape_string($_POST['correo']);
$contraseña=$conexion->real_escape_string($_POST['contraseña']);
$tipo=$conexion->real_escape_string($_POST['tipo_usuario']);

$sql="UPDATE packetdrive.user SET nombre='$nombre', apellidos='$apellido', edad=$edad,correo='$correo',contraseña='$contraseña',tipo_usuario='$tipo' WHERE id_usuario=$id ";
if($conexion->query($sql)){
    $_SESSION['color'].="success";
    $_SESSION['msg'].="Usuario Actualizado";
    
}else{
    $_SESSION['color'].="danger";
    $_SESSION['msg'].="Error al actualizar usuario";
}

header('Location: interfaz_admin.php');





?>