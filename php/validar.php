<?php
include 'conexion.php';
$conexion = conectar();


if (isset($_POST['emaill']) && !empty($_POST['emaill']) && isset($_POST['passwordl']) && !empty($_POST['passwordl'])) {
    $correo = $_POST['emaill'];
    $pass = $_POST['passwordl'];
    session_start();

    //$query_id="SELECT id_usuario FROM packetdrive.user WHERE correo='$correo' AND contraseña='$pass'"
    $query_tipo = "SELECT tipo_usuario FROM packetdrive.user WHERE correo='$correo' AND contraseña='$pass'";
        $result_tipo = mysqli_query($conexion, $query_tipo);
        $row = mysqli_fetch_assoc($result_tipo);
        $tipo = $row['tipo_usuario'];
    
    
      

    $_SESSION['tipo_usuario']=$tipo;
   
    $query = "SELECT * FROM packetdrive.user WHERE correo ='$correo' AND contraseña='$pass'";    
    $result = mysqli_query($conexion, $query);
    $row_u = mysqli_fetch_assoc($result);
    $id= $row_u['id_usuario'];

    $_SESSION['id_usuario']=$id;


    if (mysqli_num_rows($result) > 0) {
        if ($tipo == "admin") {
            $response = array(
                'success' => 1,
                'tipo' => 2
            );

        
            echo json_encode($response);
            
        } else {

            $response = array(
                'success' => 1,
                'tipo' => 3
            );
        
            echo json_encode($response);
        }

    } else {
        echo json_encode(array('success' => 0));
    }

}
?>