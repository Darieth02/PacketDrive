
<!doctype html>
<html lang="en">

<head>
  <title>Login & Register </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/register.css" />


  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

</head>

<body class="d-flex align-items-center">
  <header>
    <!-- place navbar here -->
  </header>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
    
      <form action="#">
        <h1>Crear Cuenta</h1>
       
        
        <input type="text" id="nombre" placeholder="Nombre" />
        <input type="text" id="apellidos" placeholder="Apellidos" />
        <input type="text" id="edad" placeholder="Edad" />
        <input type="email" id="correo" placeholder="Correo" />
        
        <div class="password-container">
          <input type="password" id="contraseña" placeholder="Contraseña" />
          <a href="#" id="toggle-contraseña"><i class="fas fa-eye-slash"></i></a>
        </div>       
         <div id="requisitos-contraseña" style="display: none;">
          <p id="requisito-1">La contraseña debe contener al menos una letra minúscula</p>
          <p id="requisito-2">La contraseña debe contener al menos una letra mayúscula</p>
          <p id="requisito-3">La contraseña debe contener al menos un dígito</p>
          <p id="requisito-4">La contraseña debe tener entre 8 y 15 caracteres</p>
        </div>
        <button id="registrar">Registrarte</button>
        
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form id="form" method="POST">
        <h1>Iniciar Sesion</h1>
        
        <input name="emaill" id="emaill" type="email" placeholder="Email" />
        <div class="password-container">
          <input type="password" name="passwordl" id="passwordl" placeholder="Password" />
          <a href="#" id="toggle-contraseña"><i class="fas fa-eye-slash"></i></a>
        </div>
        <a href="/ForceDragon/php/recuperarcontraseña.php">Olvidaste tu contrasena?</a>

        <button id="iniciar">Sign In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Bienvenido de Nuevo!</h1>
          <p>Si ya tienes una cuenta, inicia sesion en ella</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>PacketDrive</h1>
          <p>LA VELOCIDAD QUE IMPULSA TUS ENVIOS</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
  <!--<div class="container">
    <div class="row justify-content-center" style="margin:20px;">
      <div class="col-lg-6 col-md-8 login-box">
        <div class="col-lg-12 login-title">
        Registrate Ahora
        </div>
        <div class="col-lg-12 login-form">
          <form>
            <div class="form-group">
              <label class="form-control-label">Usuario</label>
              <input type="text" id="usuario" class="form-control">
            </div>
            <div class="form-group">
              <label class="form-control-label">Email</label>
              <input type="text" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label class="form-control-label">Numero Telefono</label>
              <input type="text" id="telefono" class="form-control">
            </div>
                <div class="form-group">
                  <label class="form-control-label">Password</label>
                  <input type="password" id="password" class="form-control">
                </div>
                <div class="note">
                  <label>¿Ya tienes una cuenta?</label>
                  <label><a href="/ForceDragon/php/login.php">Ingresar</a></label>
                </div>
                <div class="col-12 login-btm login-button justify-content-center d-flex">
                  <button type="submit" id="registrar" class="btn btn-outline-primary">Register</button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>-->
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->


</body>

<script src="js/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/Registro.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
  integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/ForceDragon/js/Registro.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"> </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script> -->



</html>