<?php 
session_start();

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