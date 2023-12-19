<link rel="stylesheet" type="text/css" href="styles\styles.css">

<?php
// Iniciar sesión
session_start();
 
// Conexión a la base de datos
include('conexBD.php');
 
$errors = [];
// Si se ha enviado el formulario
if (@isset($_POST['login_button'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass = mysqli_real_escape_string($db, $_POST['password']);
 
  // Comprobar si el nombre de usuario es válido
  $query = "SELECT * FROM usuarios WHERE email='$email' and pass='$pass'";
  $resultado = mysqli_query($db, $query);
 
  if (mysqli_num_rows($resultado) == 1) {
    // Nombre de usuario válido, verificar contraseña
    
      $row=mysqli_fetch_array($resultado);
      // Inicio de sesión válido
      $_SESSION['email']=$email;
      $_SESSION['privilegio']=$row['privilegio'];
      header ("Location: index.php");
    } else {
    // Nombre de usuario inválido
    echo "<script>alert('Nombre de usuario/contraseña inválidos');history.back();</script>";
  }
}

  mysqli_close($db);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Inicio de sesión</title>
</head>
<body>
  <div class="form">
    <div class="d-flex min-vh-100">
      <div class="row d-flex flex-grow-1 justify-content-center align-items-center">
        <div class="col-md-4 form login-form">
        <form action="login.php" method="POST" autocomplete="off">
            <h2 class="text-center">Inicio de sesión</h2>
              
              <?php
              if (count($errors) > 0) {
                echo "<div class='alert alert-danger' role='alert'>";
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                echo "</div>";
              }
              ?>
              
              <div class="form">
                  <input type="text" name="email" class="form" placeholder="Correo electrónico" required>
              </div>
              <div class="form">
                  <input type="password" name="password" class="form" placeholder="Contraseña" required>
              </div>
              <div class="form">
                  <input type="submit" name="login_button" class="form boton" value="Acceder">
              </div>
          </form>
        </div>
      </div>
      <a href="form_registro.html">Registro</a>
      <a href="logout.php">Logout</a>


    </div>
  </div>  
</body>
</html>