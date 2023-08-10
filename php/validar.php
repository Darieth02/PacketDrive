<?php
include 'conexion.php';
$conexion = conectar();

$response = array();

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $correo = $_POST['email'];
    $pass = $_POST['password'];
    session_start();


    $query_tipo = "SELECT tipo_usuario FROM user WHERE correo='$correo' AND contraseña='$pass'";
    $result_tipo = mysqli_query($conexion, $query_tipo);
    $row = mysqli_fetch_assoc($result_tipo);
    $tipo = $row['tipo_usuario'];

    $_SESSION['tipo_usuario'] = $tipo;

    $query = "SELECT * FROM user WHERE correo ='$correo' AND contraseña='$pass'";
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
}

echo json_encode($response);
?>
