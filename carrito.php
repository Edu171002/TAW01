<link rel="stylesheet" type="text/css" href="styles\styles.css">
<?php
session_start();
include('conexBD.php');

$total = 0;

?>

<!DOCTYPE html>
<html>
<head>
  <title>Inicio de sesión</title>
</head>
<body>
  <?php 
    include 'header.php';
    
    ?> 

    <table class="shoppingcart-table" id="shoppingcart-table">
    <thead style="text-align: left">
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

    if(isset($_SESSION['carrito'])){  //Cuando se vacía el carro desde el propio carro se cumple incorrectamente, revisar+
      
      $carroVacio = true;

      foreach ($_SESSION['carrito'] as $id_producto=>$cantidad ) {
        $carroVacio = false;
        ?><script>document.getElementById('shoppingcart-table').style.opacity=1;</script><?php
        $query='select * from productos where id_producto ='.$id_producto;
        $result=mysqli_query($db,$query);
        $row=mysqli_fetch_array($result);
          $subtotal = $cantidad * $row['precio'];
            $total += $subtotal;
      ?>
          <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo $cantidad; ?></td>
                <td><?php echo $subtotal; ?></td>
                <td><button onclick="window.location.href='borrarDelCarrito.php?id_producto=<?php echo $id_producto; ?>'">Quitar del carrito</button></td>
          </tr>
      <?php
      $_SESSION['precio_total']=$total;
      
      }
      echo  '</tbody>';
      echo  '</table>';


      if($carroVacio){
        ?>
        <h2>El carrito está vacío</h2>
        <script>document.getElementById('shoppingcart-table').style.opacity=0;</script>
        <?php
      } else{
        ?>
        <p>Total: <?php echo $total;?></p>
        <a href="checkout.php">Finalizar compra</a>
        <?php
      }

    } else{
      ?>
      <h2>El carrito está vacío</h2>
      <script>document.getElementById('shoppingcart-table').style.opacity=0;</script>
      <?php
    }
    ?>

    
    <?php 
      include 'footer.php';
      ?>

      <script src="javascripts/script.js"></script>
</body>
</html>