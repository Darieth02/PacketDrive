<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
	//conexión a la BD
 	include 'conexion.php';
	$conexion=conectar();
	session_start();
	//Pasamos los datos desde el controlador a variables PHP
	$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);  //usamos este método php para evitar inyección sql a la bd
	$apellidos = mysqli_real_escape_string($conexion,$_POST['apellidos']);  //usamos este método php para evitar inyección sql a la bd
	$edad = mysqli_real_escape_string($conexion,$_POST['edad']);  //usamos este método php para evitar inyección sql a la bd
	$correo = mysqli_real_escape_string($conexion,$_POST['correo']);  //usamos este método php para evitar inyección sql a la bd
	$contraseña = mysqli_real_escape_string($conexion,$_POST['contraseña']);  //usamos este método php para evitar inyección sql a la bd

	

	

		
		//realizamos una consulta para saber si el correo ya esta registrado en la BD
		$select = "SELECT * FROM user WHERE correo='$correo'";
		$res_Select = mysqli_query($conexion,$select);
		//si el correo no está registrado lo insertamos en la base de datos y regresamos 1
		if(mysqli_num_rows($res_Select) == 0){
			//Guardamos en una variable la consulta a la BD para insertar datos
			$insertar = "INSERT INTO user (nombre,apellidos,edad,correo, contraseña,tipo_usuario) VALUES('$nombre','$apellidos','$edad','$correo','$contraseña','usuario')";
			//ejecutamos la consulta y el resultado de la inserción lo guardamos en una variable
			echo mysqli_query($conexion, $insertar);
			//Si fallo la inserción avisamos al usuario, de lo contrario avisamos que el registro fue exitoso
			
			
		}else{ //si el correl ya estaba registrado en la BD regresamos 0
		echo '0';
			
		}
	
	
    
   
	

 //cerrar la conexión
 mysqli_close($conexion);
?>
