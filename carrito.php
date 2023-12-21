<?php
session_start();
include('conexBD.php');
var_dump($_SESSION);

?>
<table>
  <thead>
     <tr>
        
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th> </th>    
    </tr>
  </thead>
  <tbody>
<?php
$total = 0;
foreach ($_SESSION['carrito'] as $id_producto=>$cantidad ) {
     $query='select * from productos where id_producto ='.$id_producto;
	 $result=mysqli_query($db,$query);
	 $row=mysqli_fetch_array($result);
     $subtotal = $cantidad * $row['precio'];
      $total += $subtotal;
?>
     <tr>
          <td><a href="producto.php?id_producto=<?php echo $producto['id_producto'];?>"></a></td>
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['precio']; ?></td>
          <td><?php echo $cantidad; ?></td>
          <td><?php echo $subtotal; ?></td>
          <td><button onclick="window.location.href='borrarDelCarrito.php?id_producto=<?php echo $id_producto; ?>'">Quitar del carrito</button></td>
     </tr>
<?php
}?>
  </tbody>
</table>
<p>Total: <?php echo $total;?></p>