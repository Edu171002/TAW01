<?php
@ $nombre = $_POST['nombre'];
@ $apellidos = $_POST['apellidos'];
@ $email = $_POST['email'];
@ $password = $_POST['password'];
@ $fecha_nac = $_POST['fecha_nac'];

$nombre=trim($nombre);
$nombre=trim($nombre);
$nombre=trim($nombre);
$nombre=trim($nombre);
$nombre=trim($nombre);

if(!$email || !$nombre){
    echo "<script>alert('faltan datos');history.back();</script>";
    exit;
}

//prepro fecha...

$nombre=addslashes($nombre);
$nombre=addslashes($nombre);
$nombre=addslashes($nombre);
$nombre=addslashes($nombre);
$nombre=addslashes($nombre);

$telefono='123';
$direccion='dir';
$ciudad="va";

include("conexBD.php");

$query="insert into Usuarios values ('".$email."','".$password."','".$nombre."','".$apellidos."','".$telefono."','".$direccion."','".$ciudad."','".$fecha_nac."',2)";
echo "<br>".$query."<br>";
$resultado=mysqli_query($db,$query);
if($resultado)
    echo "OK";
else   
    echo "NO";

mysqli_close($db);
?>
