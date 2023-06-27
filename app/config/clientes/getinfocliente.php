<?php 

require '../conexion.php';
    $conexion=conectar();


    
$id=$conexion->real_escape_string($_POST['id']);

$sql="SELECT * FROM packetdrive.user WHERE id=$id LIMIT 1";
$resultado=$conexion->query($sql);
$rows = $resultado->num_rows;

$cliente =[];

if($rows>0){
    $producto =$cliente->fetch_array();
}

echo json_encode($cliente, JSON_UNESCAPED_UNICODE);


?>