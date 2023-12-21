<?php
include('conexBD.php');


$id_producto = $_GET['id_producto'];

// Eliminar usuario de la base de datos
$query = "DELETE FROM productos WHERE id_producto='$id_producto'";
$resultado = mysqli_query($db, $query);

if ($resultado) {
    echo "Producto eliminado correctamente.";
} else {
    echo "Error al eliminar Producto: " . mysqli_error($db);
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>
