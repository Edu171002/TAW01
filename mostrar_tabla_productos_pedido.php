<link rel="stylesheet" type="text/css" href="styles\styles.css">

<?php

include('conexBD.php');
$query="select * from pedidos";
$resultado=mysqli_query($db,$query);
$num=mysqli_num_rows($resultado);

echo '<p><a href="admin_site.php">Volver</a></p>';
echo "Nuúmero de pedidos: " . $num;

echo "<table border='1'>";
echo "<tr>";
echo "<td>id_pedido</td><td>usuario</td><td>precio</td>";
echo "</tr>";

for($i=0;$i<$num;$i++){
    $row=mysqli_fetch_array($resultado);
    echo "<tr>";
    echo "<td>" . $row['id_pedido'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['coste_total'] . "</td>";
    
    echo "</tr>";

}

echo "</table>";
?>