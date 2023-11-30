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
$privilegio=addslashes($privilegio);

include("conexBD.php");

$query="insert into Usuarios values ('".$email."','".$password."','".$nombre."','".$apellidos."','".$telefono."','".$direccion."','".$ciudad."','".$fecha_nac."','"$privilegio"')";
echo "<br>".$query."<br>";
$resultado=mysqli_query($db,$query);
if($resultado)
    echo "OK";
else   
    echo "NO";

mysqli_close($db);
?>
