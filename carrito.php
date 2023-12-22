<?php
session_start();
include('conexBD.php');

$total = 0;

if(isset($_SESSION['carrito'])){  //Cuando se vacía el carro desde el propio carro se cumple incorrectamente, revisar
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
  $_SESSION['precio_total']=$total;

  echo  '</tbody>';
  echo  '</table>';
  echo  '<p>Total: <?php echo $total;?></p>';
  echo  '<a href="checkout.php">Finalizar compra</a>';
  }
} else{
  echo  '<p>El carrito está vacío</p>';
}
?>