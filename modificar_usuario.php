<?php


// Obtener el email del usuario a modificar
$email = $_GET['email'];


?>
<form action="#" method="post">
          
          <div class="row">
            <div class="col-50">
              <h3>Modificacion usuario</h3>
              <label for="nombre"><i class="fa fa-user"></i> Nombre</label>
              <input type="text" id="fname" name="nombre" placeholder="Estudiante">

              <label for="apellidos"><i class="fa fa-user"></i>Apellidos</label>
              <input type="text" id="fname" name="apellidos" placeholder="Estudiante">


              <label for="telefono"><i class="fa fa-envelope"></i>telefono</label>
              <input type="text" id="telefono" name="telefono" placeholder="1234567">

              <label for="direccion"><i class="fa fa-envelope"></i>Direccion</label>
              <input type="text" id="direccion" name="direccion" placeholder="Calle aleatoria numero 1">

              <label for="ciudad"><i class="fa fa-envelope"></i>ciudad</label>
              <input type="text" id="ciudad" name="ciudad" placeholder="ciudad">

              <label for="pass"><i class="fa fa-address-card-o"></i> Contraseña</label>
              <input type="pass" id="pass" name="pass" placeholder="Contraseña">
              
              <label for="fecha_nac"><i class="fa fa-institution"></i>Fecha de nacimiento</label>
              <input type="text" id="fecha_nac" name="fecha_nac" placeholder="2000-12-12">

              <label for="privilegio"><i class="fa fa-institution"></i>Tipo de usuario</label>
              <input type="tinyint" id="privilegioc" name="privilegio" placeholder="1 o 2">
  
          <input type="submit" value="Enviar" class="btn">
        </form>
      
<?php
include('conexBD.php');

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


// Actualizar usuario en la base de datos
$query = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', ciudad='$ciudad', pass='$pass', fecha_nac='$fecha_nac', privilegio='$privilegio' WHERE email='$email'";
$resultado = mysqli_query($db, $query);

if ($resultado) {
    echo "Usuario actualizado correctamente.";
} else {
    echo "Error al actualizar usuario: " . mysqli_error($db);
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>
