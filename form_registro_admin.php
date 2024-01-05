 
<html>
  
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
    
    <p><a href="admin_site.php">Volver</a></p>
    <br><br>
    <div class="form-container">
      <form action="#" method="post">
        <div class="row">
          <div class="col-50">
            <h3 style="text-align: center">Formulario de registro</h3>
              <div class="large_form">
                <div class="large_form-grid">
                  <div class="form">
                    <label for="nombre"><i class=""></i> Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" maxlength="60">
                  </div>
                  <div class="form">
                    <label for="apellidos"><i class=""></i> Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" maxlength="60">
                  </div>
                  <div class="form">
                    <label for="email"><i class=""></i> Email</label>
                    <input type="text" id="email" name="email" placeholder="estudiante@example.com" maxlength="100">
                  </div>
                  <div class="form">
                    <label for="telefono"><i class=""></i> Telefono</label>
                    <input type="text" id="telefono" name="telefono" placeholder="612345678" maxlength="15">
                  </div>
                  <div class="form">
                    <label for="direccion"><i class=""></i> Direccion</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Calle aleatoria numero 1" maxlength="100">
                  </div>
                  <div class="form">
                    <label for="ciudad"><i class=""></i> Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad" maxlength="100">
                  </div>
                  <div class="form">
                    <label for="password"><i class=""></i>Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" maxlength="20">
                  </div>
                  <div class="form">  
                    <label for="fecha_nac"><i class=""></i> Fecha de nacimiento</label>
                    <input type="text" id="fecha_nac" name="fecha_nac" placeholder="Selecciona una fecha" maxlength="12">
                  </div>
                  <div class="form">  
                    <label for="privilegio"><i class=""></i>Privilegio</label>
                    <input type="tinyint" id="privilegio" name="privilegio" placeholder="1 o 2" maxlength="1">
                  </div>
                </div>
                <div class="form"> 
                  <input type="submit" value="Enviar" class="button" name="Enviar">
                </div>
            </div>
          </div>
        </div>
      </form>
</div>
<?php
@ $nombre = $_POST['nombre'];
@ $apellidos = $_POST['apellidos'];
@ $email = $_POST['email'];
@ $telefono = $_POST['telefono'];
@ $direccion = $_POST['direccion'];
@ $ciudad = $_POST['ciudad'];
@ $password = $_POST['password'];
@ $fecha_nac = $_POST['fecha_nac'];
@ $privilegio = $_POST['privilegio'];

$nombre=trim($nombre);
$apellidos=trim($apellidos);
$email=trim($email);
$telefono=trim($telefono);
$direccion=trim($direccion);
$ciudad=trim($ciudad);
$password=trim($password);
$fecha_nac=trim($fecha_nac);
$privilegio=trim($privilegio);



//prepro fecha...

$nombre=addslashes($nombre);
$apellidos=addslashes($apellidos);
$email=addslashes($email);
$telefono=addslashes($telefono);
$direccion=addslashes($direccion);
$ciudad=addslashes($ciudad);
$password=addslashes($password);
$fecha_nac=addslashes($fecha_nac);
$privilegio=addslashes($privilegio);

if(isset($_POST['Enviar'])){

  include("conexBD.php");

  if(!$email || !$nombre){
    echo "<script>alert('faltan datos');history.back();</script>";
    exit;
  }

  $query1="select * from Usuarios where email ='".$email."'";
  $resultado1=mysqli_query($db,$query1);
  $num=mysqli_num_rows($resultado1);
  if($num>0)
  echo "<script>alert('Ese email ya esta en uso.');history.back();</script>";
  else{
  $query="insert into Usuarios values ('".$email."','".$password."','".$nombre."','".$apellidos."','".$telefono."','".$direccion."','".$ciudad."','".$fecha_nac."','".$privilegio."')";
  echo "<br>".$query."<br>";
  $resultado=mysqli_query($db,$query);
  if($resultado){
      echo "<script>alert('Registro realizado con éxito');window.location.href='admin_site.php';</script>";
      }
  else   {
    $error = mysqli_error($db);
    echo "<script>alert('ERROR de SQL: ".$error."');</script>";
  }
      }
  mysqli_close($db);
}

?>
    
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
   
    
   <br>
   <br>

    </body>
    </html>