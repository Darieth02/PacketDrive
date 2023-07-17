<?php
session_start();

require '../php/conexion.php';
$conexion = conectar();

$id  = $conexion->real_escape_string($_SESSION['id_usuario']);
$contrasena =$conexion->real_escape_string($_POST['contradada']);

// Guardar el valor de $id y $contrasena en el archivo de registro
$contenido = "ID de usuario: " . $id . "\n";
$contenido .= "Contraseña recibida: " . $contrasena . "\n";


// Obtener la contraseña almacenada en la base de datos
$sql = "SELECT contraseña FROM packetdrive.user WHERE id_usuario = $id";
$resultado = $conexion->query($sql);


if ($resultado->num_rows == 1) {
    $fila = $resultado->fetch_assoc();
    $contrasenaAlmacenada = $fila['contraseña'];
    $contenido.="SQL: ".$contrasenaAlmacenada;


    // Verificar si la contraseña ingresada coincide con la contraseña almacenada
    if ($contrasenaAlmacenada==$contrasena) {
        $contenido .= "Resultado: La contraseña coincide\n";

        echo "ok"; // La contraseña coincide
    } else {
        $contenido .= "Resultado: La contraseña NO coincide\n";

        echo "error"; // La contraseña no coincide
    }
} else {
    $contenido .= "Resultado: No se encontró al usuario o hay múltiples usuarios con el mismo ID\n";

    echo "error"; // No se encontró al usuario o hay múltiples usuarios con el mismo ID
}
// Guardar la información en el archivo de registro
file_put_contents('log.txt', $contenido, FILE_APPEND);
?>
