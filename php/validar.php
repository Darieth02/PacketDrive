<?php
include 'conexion.php';
$conexion = conectar();

$response = array();

if (isset($_POST['emaill']) && !empty($_POST['emaill']) && isset($_POST['passwordl']) && !empty($_POST['passwordl'])) {
    $correo = $_POST['emaill'];
    $pass = $_POST['passwordl'];
    session_start();

    $query_tipo = "SELECT tipo_usuario FROM packetdrive.user WHERE correo='$correo' AND contraseña='$pass'";
    $result_tipo = mysqli_query($conexion, $query_tipo);
    $row = mysqli_fetch_assoc($result_tipo);
    $tipo = $row['tipo_usuario'];

    $_SESSION['tipo_usuario'] = $tipo;

    $query = "SELECT * FROM packetdrive.user WHERE correo ='$correo' AND contraseña='$pass'";
    $result = mysqli_query($conexion, $query);
    $row_u = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $id = $row_u['id_usuario'];
        $_SESSION['id_usuario'] = $id;

        if ($tipo == "admin") {
            $response['success'] = 1;
            $response['tipo'] = 2;
        } else {
            $response['success'] = 1;
            $response['tipo'] = 3;
        }
    } else {
        $response['success'] = 3;
        $response['message'] = "Email o contraseña incorrectos";
    }
} else {
    $response['success'] = 0;
    $response['message'] = "Por favor, completa todos los campos";
}

echo json_encode($response);
?>
