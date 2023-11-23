<?php

include('conexBD.php');
$query="select * from usuarios";
$resultado=mysqli_query($db,$query);
$num=mysqli_num_rows($resultado);

echo "Num:..." . $num;

echo "<table border='1'>";
echo "<tr>";
echo "<td>Nombre</td><td>Apellidos</td><td>Email</td><td>Telefono</td><td>Modificar</td><td>Eliminar</td>";
echo "</tr>";

for($i=0;$i<$num;$i++){
    $row=mysqli_fetch_array($resultado);
    echo "<tr>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['apellidos'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['telefono'] . "</td>";
    echo "<td> <a href='modificar_usuario.php?email=" . $row['email'] . "'>Modificar </a></td>";
    echo "<td> <a href='eliminar_usuario.php?email=" . $row['email'] . "'>Eliminar </a></td>";
    echo "</tr>";

}

echo "</table>";
?>