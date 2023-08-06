<?php
session_start();

require '../php/conexion.php';
$conexion = conectar();

$id = $conexion->real_escape_string($_SESSION['id_usuario']); // Suponiendo que tienes una sesión para almacenar el ID del usuario

// Eliminar el registro del cliente de la base de datos
$sql = "DELETE FROM user WHERE id_usuario = $id";

if ($conexion->query($sql)) {
    // Eliminación de cuenta completada con éxito.
    // Redirige a la página de inicio de sesión o a una página de confirmación.
    header("Location: ../index.php");
    exit;
} else {
    // Error al eliminar la cuenta del cliente, redirige a la página de interfaz del cliente con un mensaje de error
    $_SESSION['color']="danger";

    $_SESSION['msg'] = "Error al eliminar la cuenta. Inténtalo nuevamente.";
    header("Location: interfazcliente.php");
    exit;
}
?>
