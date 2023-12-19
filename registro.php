<?php 
session_start();
?>
<form action="registro.php" method="post">
          
                  <div class="row">
                    <div class="col-50">
                      <h3>Dirección de facturación</h3>
                      <label for="nombre"><i class="fa fa-user"></i> Nombre</label>
                      <input type="text" id="fname" name="nombre" placeholder="Estudiante">

                      <label for="apellidos"><i class="fa fa-user"></i>Apellidos</label>
                      <input type="text" id="fname" name="apellidos" placeholder="Estudiante">

                      <label for="email"><i class="fa fa-envelope"></i>Email</label>
                      <input type="text" id="email" name="email" placeholder="estudiante@example.com">

                      <label for="telefono"><i class="fa fa-envelope"></i>telefono</label>
                      <input type="text" id="telefono" name="telefono" placeholder="1234567">

                      <label for="direccion"><i class="fa fa-envelope"></i>Direccion</label>
                      <input type="text" id="direccion" name="direccion" placeholder="Calle aleatoria numero 1">

                      <label for="ciudad"><i class="fa fa-envelope"></i>ciudad</label>
                      <input type="text" id="ciudad" name="ciudad" placeholder="ciudad">

                      <label for="password"><i class="fa fa-address-card-o"></i> Contraseña</label>
                      <input type="password" id="password" name="password" placeholder="Contraseña">
                      
                      <label for="fecha_nac"><i class="fa fa-institution"></i>Fecha de nacimiento</label>
                      <input type="text" id="fecha_nac" name="fecha_nac" placeholder="2000-12-12">
          
                  <input type="submit" value="Enviar" class="btn">
                </form>
<?php
@ $nombre = $_POST['nombre'];
@ $apellidos = $_POST['apellidos'];
@ $email = $_POST['email'];
@ $telefono = $_POST['telefono'];
@ $direccion = $_POST['direccion'];
@ $ciudad = $_POST['ciudad'];
@ $password = $_POST['password'];
@ $fecha_nac = $_POST['fecha_nac'];

$nombre=trim($nombre);
$apellidos=trim($apellidos);
$email=trim($email);
$telefono=trim($telefono);
$direccion=trim($direccion);
$ciudad=trim($ciudad);
$password=trim($password);
$fecha_nac=trim($fecha_nac);

if(!$email || !$nombre){
    echo "<script>alert('faltan datos');history.back();</script>";
    exit;
}

//prepro fecha...

$nombre=addslashes($nombre);
$apellidos=addslashes($apellidos);
$email=addslashes($email);
$telefono=addslashes($telefono);
$direccion=addslashes($direccion);
$ciudad=addslashes($ciudad);
$password=addslashes($password);
$fecha_nac=addslashes($fecha_nac);


include("conexBD.php");
$query1="select * from Usuarios where email ='".$email."'";
$resultado1=mysqli_query($db,$query1);
$num=mysqli_num_rows($resultado1);
if($num>0)
echo "<script>alert('Ese email ya esta en uso.');history.back();</script>";
else{
$query="insert into Usuarios values ('".$email."','".$password."','".$nombre."','".$apellidos."','".$telefono."','".$direccion."','".$ciudad."','".$fecha_nac."',2)";
echo "<br>".$query."<br>";
$resultado=mysqli_query($db,$query);
if($resultado){
$_SESSION['email']=$email;
$_SESSION['privilegio']=2;
header ("Location: index.php");
     }
else   
echo "<script>alert('No se ha podido hacer el registro.');history.back();</script>";
    }
mysqli_close($db);


?>