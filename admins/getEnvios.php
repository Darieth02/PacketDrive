<?php 

require '../php/conexion.php';
    $conexion=conectar();


    
$id=$conexion->real_escape_string($_POST['id_envio']);

$sql="SELECT * FROM envios WHERE id_envio=$id LIMIT 1";
$resultado=$conexion->query($sql);
$rows = $resultado->num_rows;

$envio =[];

if($rows>0){
    $envio =$resultado->fetch_array();
}

echo json_encode($envio, JSON_UNESCAPED_UNICODE);


?>