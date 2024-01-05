<?php
include('conexBD.php');

// Obtener el email del usuario a modificar
$email = $_GET['email'];

$selectQuery="SELECT nombre, apellidos, telefono, direccion, ciudad, pass, fecha_nac, privilegio FROM usuarios WHERE email='$email'";
$selectResult=mysqli_query($db, $selectQuery);

if ($selectResult) {
  $row = mysqli_fetch_array($selectResult);

  $nombre = $row['nombre'];
  $apellidos = $row['apellidos'];
  $telefono = $row['telefono'];
  $direccion = $row['direccion'];
  $ciudad = $row['ciudad'];
  $pass = $row['pass'];
  $fecha_nac = $row['fecha_nac'];
  $privilegio = $row['privilegio'];

} else {
  echo "Error al recuperar los datos: " . mysqli_error($db);
}


?>
<form action="#" method="post">
          
          <div class="row">
            <div class="col-50">
              <p><a href="mostrar_usuarios.php">Volver</a></p>
              <h3>Modificacion usuario</h3>
              <label for="nombre"><i class="fa fa-user"></i> Nombre</label>
              <input type="text" id="fname" name="nombre" value="<?php echo $nombre; ?>" maxlength="60" required>

              <label for="apellidos"><i class="fa fa-user"></i>Apellidos</label>
              <input type="text" id="fname" name="apellidos" value="<?php echo $apellidos; ?>" maxlength="60" required>


              <label for="telefono"><i class="fa fa-envelope"></i>telefono</label>
              <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" maxlength="15" required>

              <label for="direccion"><i class="fa fa-envelope"></i>Direccion</label>
              <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>" maxlength="100" required>

              <label for="ciudad"><i class="fa fa-envelope"></i>ciudad</label>
              <input type="text" id="ciudad" name="ciudad" value="<?php echo $ciudad; ?>" maxlength="100" required>

              <label for="pass"><i class="fa fa-address-card-o"></i> Contraseña</label>
              <input type="pass" id="pass" name="pass" value="<?php echo $pass; ?>" maxlength="20" required>
              
              <label for="fecha_nac"><i class="fa fa-institution"></i>Fecha de nacimiento</label>
              <input type="text" id="fecha_nac" name="fecha_nac" value="<?php echo $fecha_nac; ?>" maxlength="12" required>

              <label for="privilegio"><i class="fa fa-institution"></i>Tipo de usuario</label>
              <input type="tinyint" id="privilegioc" name="privilegio" value="<?php echo $privilegio; ?>" maxlength="1" required>
  
          <input type="submit" value="Aplicar" class="btn" name="Aplicar">
        </form><br>
      
<?php


@ $nombre = $_POST['nombre'];
@ $apellidos = $_POST['apellidos'];

@ $telefono = $_POST['telefono'];
@ $direccion = $_POST['direccion'];
@ $ciudad = $_POST['ciudad'];
@ $pass = $_POST['pass'];
@ $fecha_nac = $_POST['fecha_nac'];
@ $privilegio = $_POST['privilegio'];

$nombre=trim($nombre);
$apellidos=trim($apellidos);
$email=trim($email);
$telefono=trim($telefono);
$direccion=trim($direccion);
$ciudad=trim($ciudad);
$pass=trim($pass);
$fecha_nac=trim($fecha_nac);
$privilegio=trim($privilegio);

if(isset($_POST['Aplicar'])){
  // Actualizar usuario en la base de datos
  $query = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', ciudad='$ciudad', pass='$pass', fecha_nac='$fecha_nac', privilegio='$privilegio' WHERE email='$email'";
  $resultado = mysqli_query($db, $query);

  if ($resultado) {
    echo "<script>alert('Usuario modificado con éxito');window.location.href='mostrar_usuarios.php';</script>";
      
  } else {
      echo "<script>alert('ERROR DE SQL: ".mysqli_error($db)."');</script>";
  }
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>
