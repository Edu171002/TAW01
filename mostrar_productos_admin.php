<link rel="stylesheet" type="text/css" href="styles\styles.css">

<?php

include('conexBD.php');
$query="select * from productos";
$resultado=mysqli_query($db,$query);
$num=mysqli_num_rows($resultado);

echo '<p><a href="admin_site.php">Volver</a></p>';
echo "Número de productos:" . $num;

echo "<table border='1'>";
echo "<tr>";
echo "<td>id_productos</td><td>nombre</td><td>descripcion</td><td>precio</td><td>categoria</td><td>Modificar</td><td>Eliminar</td>";
echo "</tr>";

for($i=0;$i<$num;$i++){
    $row=mysqli_fetch_array($resultado);
    echo "<tr>";
    echo "<td>" . $row['id_producto'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['descripcion'] . "</td>";
    echo "<td>" . $row['precio'] . "</td>";
    echo "<td>" . $row['categoria'] . "</td>";
    echo "<td> <a href='modificar_producto.php?id_producto=" . $row['id_producto']. "'>Modificar </a></td>";
    echo "<td> <a href='borrar_producto.php?id_producto=" . $row['id_producto']. "'>Eliminar </a></td>";
    echo "</tr>";

}

echo "</table>";
?>