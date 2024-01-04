<?php
include('conexBD.php');

// Obtener el email del usuario a eliminar
$email = $_GET['email'];

// Eliminar usuario de la base de datos
$query = "DELETE FROM usuarios WHERE email='$email'";
$resultado = mysqli_query($db, $query);

if ($resultado) {
    echo "<script>alert('Usuario eliminado con éxito');window.location.href='mostrar_usuarios.php';</script>";
      
} else {
      echo "<script>alert('ERROR DE SQL: ".mysqli_error($db)."');window.location.href='mostrar_usuarios.php';</script>";
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>
