<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$conexion->real_escape_string($_POST['id_envio']);
$remitente=$conexion->real_escape_string($_POST['remitente']);
$receptor=$conexion->real_escape_string($_POST['receptor']);
$descripcion=$conexion->real_escape_string($_POST['descripcion']);
$peso=$conexion->real_escape_string($_POST['peso']);
$precio=$conexion->real_escape_string($_POST['precio']);
$calle=$conexion->real_escape_string($_POST['calle']);
$numero=$conexion->real_escape_string($_POST['numero']);
$colonia=$conexion->real_escape_string($_POST['colonia']);
$municipio=$conexion->real_escape_string($_POST['municipio']);
$estado=$conexion->real_escape_string($_POST['estado']);
$pais=$conexion->real_escape_string($_POST['pais']);
$codigo=$conexion->real_escape_string($_POST['codigo_postal']);
$fecha=$conexion->real_escape_string($_POST['fecha']);
$estatus=$conexion->real_escape_string($_POST['estatus']);
$seguimiento=$conexion->real_escape_string($_POST['seguimiento']);
$descripciondom=$conexion->real_escape_string($_POST['descripcion_dom']);


$sql = "UPDATE envios SET remitente='$remitente', receptor='$receptor', descripcion_envio='$descripcion', peso='$peso', precio='$precio', calle='$calle', numero='$numero', colonia='$colonia', municipio='$municipio', estado='$estado', pais='$pais', cp='$codigo', descripcion_dom='$descripciondom',fecha_envio='$fecha',estado_envio='$estatus' WHERE id_envio=$id";
if($conexion->query($sql)){
    $_SESSION['color'].="success";
    $_SESSION['msg'].="Envio Actualizado";
    
}else{
    $_SESSION['color'].="danger";
    $_SESSION['msg'].="Error al actualizar envio";
}

header('Location: envios_interfaz.php');





?>