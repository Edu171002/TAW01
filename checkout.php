
<?php
session_start();
include('conexBD.php');

$usuario=$_SESSION['email'];
$carrito=$_SESSION['carrito'];
$total=$_SESSION['precio_total'];
$fecha_actual=date('Y-m-d H:i:s');



$query1="INSERT INTO `pedidos`(`id_pedido`, `email`, `fecha_hora`, `coste_total`) VALUES ("$id_pedido","$usuario"','"$fecha_actual"','"$total"')";
echo $query1;

$res=mysqli_query($db,$query1);

$query11="select * from pedidos where email  is $usuario and fecha_hora is $fecha_actual and coste_total is $total";
$resultado1=mysqli_query($db, $query11);

$row1=mysqli_fetch_array($resultado1);//donde se saca el id_pedido
var_dump($res);
foreach ($_SESSION['carrito'] as $id_producto=>$cantidad ) {
    $query='select * from productos where id_producto ='.$id_producto;
    $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
    $subtotal = $cantidad * $row['precio'];
    $query2="insert into pedidos_productos (id_pedido,id_producto,cantidad,precio) values(".$row1['id_pedido'].",".$carrito['id_producto'].",".$carrito['cantidad'].",".$subtotal.")";
    $resultado2=mysqli_query($db,$query2);
    $row2=mysqli_fetch_array($resultado2);

?>

 <tr>
           <td><?php echo $row2['id_pedido']; ?></td>
           <td><?php echo $row2['id_producto']; ?></td>
           <td><?php echo $row2['cantidad']; ?></td>
           <td><?php echo $row2['precio']; ?></td>
          
           
      </tr> 
<?php
}
?>

