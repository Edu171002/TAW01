<?php

include('conexBD.php');
$query="select * from productos";
$resultado=mysqli_query($db,$query);
$num=mysqli_num_rows($resultado);

echo "Num:..." . $num;

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
    // echo "<td> <a href='modificar_usuario.php?email=" . $row['email'] . "'>Modificar </a></td>";
    // echo "<td> <a href='eliminar_usuario.php?email=" . $row['email'] . "'>Eliminar </a></td>";
    echo "</tr>";

}

echo "</table>";
?>