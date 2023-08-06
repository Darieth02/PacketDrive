<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$nombre=$conexion->real_escape_string($_POST['nombre']);
$apellido=$conexion->real_escape_string($_POST['apellido']);
$edad=$conexion->real_escape_string($_POST['edad']);
$correo=$conexion->real_escape_string($_POST['correo']);
$contraseña=$conexion->real_escape_string($_POST['contraseña']);
$tipo=$conexion->real_escape_string($_POST['tipo_usuario']);

$sql="INSERT INTO user (nombre,apellidos,edad,correo,contraseña,tipo_usuario) VALUES ('$nombre','$apellido',$edad,'$correo','$contraseña','$tipo')";
if($conexion->query($sql)){
    $id=$conexion->insert_id;

    $_SESSION['color'].="success";
    $_SESSION['msg'].="Usuario Creado";


}else{
    $_SESSION['color'].="danger";
    $_SESSION['msg'].="Error al crear usuario";
}

header('Location: interfaz_admin.php');







?>