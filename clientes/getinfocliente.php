<?php 

require '../php/conexion.php';
    $conexion=conectar();


    
$id=$conexion->real_escape_string($_POST['id_usuario']);

$sql="SELECT * FROM user WHERE id_usuario=$id LIMIT 1";
$resultado=$conexion->query($sql);
$rows = $resultado->num_rows;

$usuario =[];

if($rows>0){
    $usuario =$resultado->fetch_array();
}

echo json_encode($usuario, JSON_UNESCAPED_UNICODE);


?>