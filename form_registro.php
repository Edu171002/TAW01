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

<html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Formulario de Registro</title>
      <!-- Incluye jQuery y jQuery UI -->
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
       <link rel="stylesheet" type="text/css" href="styles\styles.css">
      
    </head>
    <body>
    
    <?php 
    include 'header.php'; //Al añadir aquí la cabecera aparecen iconos junto a los label del formulario
    ?> 

    <div class="form-container">
      <form action="registro.php" method="post">
        <div class="row">
          <div class="col-50">
            <h3 style="text-align: center">Formulario de registro</h3>
              <div class="large_form">
                <div class="large_form-grid">
                  <div class="form">
                    <label for="nombre"><i class="fa fa-user"></i> Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Estudiante">
                  </div>
                  <div class="form">
                    <label for="apellidos"><i class="fa fa-user"></i> Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Estudiante">
                  </div>
                  <div class="form">
                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    <input type="text" id="email" name="email" placeholder="estudiante@example.com">
                  </div>
                  <div class="form">
                    <label for="telefono"><i class="fa fa-envelope"></i> Teléfono</label>
                    <input type="text" id="telefono" name="telefono" placeholder="1234567">
                  </div>
                  <div class="form">
                    <label for="direccion"><i class="fa fa-envelope"></i> Dirección</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Calle aleatoria numero 1">
                  </div>
                  <div class="form">
                    <label for="ciudad"><i class="fa fa-envelope"></i> Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad">
                  </div>
                  <div class="form">
                    <label for="password"><i class="fa fa-address-card-o"></i> Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                  </div>
                  <div class="form">  
                    <label for="fecha_nac"><i class="fa fa-institution"></i> Fecha de nacimiento</label>
                    <input type="text" id="fecha_nac" name="fecha_nac" placeholder="Selecciona una fecha">
                  </div>
                </div>
                <div class="form"> 
                  <input type="submit" value="Enviar" class="button" >
                </div>
            </div>
          </div>
        </div>
      </form>
</div>
    
    <script>
      // Inicializa el DatePicker para el campo de fecha
      $(document).ready(function(){
        $('#fecha_nac').datepicker({
          dateFormat: 'yy-mm-dd',
          changeMonth: true,
          changeYear: true
        });
      });
    </script>
    <script src="javascripts/script.js"></script>
    
    <?php 
    include 'footer.php';
    ?>

    </body>
    </html>