<?php
include('conexBD.php');


$id_producto = $_GET['id_producto'];

// Eliminar producto de la base de datos
$query = "DELETE FROM productos WHERE id_producto='$id_producto'";
$resultado = mysqli_query($db, $query);

if ($resultado) {
    echo "<script>alert('Producto eliminado con éxito');window.location.href='mostrar_productos_admin.php';</script>";
      
} else {
      echo "<script>alert('ERROR DE SQL: ".mysqli_error($db)."');window.location.href='mostrar_productos_admin.php';</script>";
}

// Cierra la conexión si es necesario
mysqli_close($db);
?>
