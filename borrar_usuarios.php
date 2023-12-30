<?php
include('conexBD.php');

// Obtener el email del usuario a eliminar
$email = $_GET['email'];

// Eliminar usuario de la base de datos
$query = "DELETE FROM usuarios WHERE email='$email'";
$resultado = mysqli_query($db, $query);

if ($resultado) {
    echo "Usuario eliminado correctamente.";
} else {
    echo "Error al eliminar usuario: " . mysqli_error($db);
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>
