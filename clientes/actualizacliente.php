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
    /*$_SESSION['color'].="success";
    $_SESSION['msg'].="Producto Actualizado";
    if($_FILES['imagen']['error'] == UPLOAD_ERR_OK){
        $permitidos = array("image/jpg", "image/jpeg");
        if(in_array($_FILES['imagen']['type'],$permitidos)){
            $dir ="img";

            $info_img=pathinfo($_FILES['imagen']['name']);
            $info_img['extension'];

            $imagen=$dir .'/'.$id.'.jpg';

            if(!file_exists($dir)){
                mkdir($dir,0777);
            }

            if(move_uploaded_file($_FILES['imagen']['tmp_name'],$imagen)){
                $_SESSION['color'].="danger";
                $_SESSION['msg'].="<br>Error al guardar imagen";
            }




        }else{
            $_SESSION['color'].="danger";
            $_SESSION['msg'].="<br>Formato de imagen no permitido";
        }
    }*/
}else{
    /*$_SESSION['color'].="danger";
    $_SESSION['msg'].="Error al actualizar producto";*/
}

header('Location: interfazcliente.php');







?>