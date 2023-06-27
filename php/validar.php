<?php
include '../app/config/conexion.php';
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
       // $result_id=mysqli_query($conexion,$query_id);
        //$row_id=mysqli_fetch_assoc($result_id);
        //$id=$row_id['id_usuario'];

    $_SESSION['tipo_usuario']=$tipo;
    //$_SESSION['id_usuario']=$id;

    /* $tipo="SELECT tipo FROM forcedragon.usuarios WHERE email='$email' AND password='$password'";
    if($tipo=="admin"){
    $query ="SELECT * FROM forcedragon.usuarios WHERE email ='$email' AND password='$password'";
    $result = mysqli_query($conexion,$query);
    echo json_enconde(array('success'===10));
    }else if($tipo=="usuario"){
    $query ="SELECT * FROM forcedragon.usuarios WHERE email ='$email' AND password='$password'";
    $result = mysqli_query($conexion,$query);
    echo json_encode(array('success'=>1));
    }else{
    }*/

    $query = "SELECT * FROM packetdrive.user WHERE correo ='$correo' AND contraseña='$pass'";
    $sql = "SELECT id_usuario FROM packetdrive.user WHERE correo='$correo' AND contraseña='$pass' LIMIT 1";
    $resultado = $conexion->query($sql);
    
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        $cliente_id= $resultado->fetch_assoc();
        $_SESSION['cliente_id'] = $cliente_id; // Reemplaza $cliente_id con el valor correspondiente
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