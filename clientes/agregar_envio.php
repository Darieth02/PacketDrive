<?php

session_start();

require '../php/conexion.php';
$conexion=conectar();

$id=$_SESSION['id_usuario'];

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
$cp=$conexion->real_escape_string($_POST['codigo_postal']);
$descripcion_dom=$conexion->real_escape_string($_POST['descripcion_dom']);
$letraInicial = chr(mt_rand(65, 90)); // Genera una letra aleatoria ASCII mayúscula (A-Z)
$numeros = str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT); // Genera 7 dígitos numéricos
$letrasFinales = chr(mt_rand(65, 90)) . chr(mt_rand(65, 90)); // Genera dos letras aleatorias ASCII mayúsculas (A-Z)

$seguimiento = $letraInicial . $numeros . $letrasFinales;

$sql="INSERT INTO packetdrive.envios (remitente, receptor, descripcion_envio, peso, precio, calle , numero , colonia, municipio, estado, pais, cp, seguimiento, descripcion_dom, id_usuario ) VALUES ('$remitente','$receptor','$descripcion','$peso','$precio','$calle',$numero,'$colonia','$municipio','$estado','$pais','$cp','$seguimiento','$descripcion_dom',$id)";
if($conexion->query($sql)){

  //  $_SESSION['color'].="success";
    //$_SESSION['msg'].="Producto Guardado";

    
}else{
    //$_SESSION['color'].="danger";
    //$_SESSION['msg'].="Error al guardar imagen";
}

header('Location: newenvio.php');







?>