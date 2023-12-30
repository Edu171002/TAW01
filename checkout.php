
<?php
session_start();
include('conexBD.php');

$usuario=$_SESSION['email'];
$carrito=$_SESSION['carrito'];
$total=$_SESSION['precio_total'];
$fecha_actual=date('Y-m-d H:i:s');



$query1="INSERT INTO `pedidos`(`id_pedido`, `email`, `fecha_hora`, `coste_total`) VALUES (null,'".$usuario."','".$fecha_actual."',".$total.")";
echo $query1;

$res=mysqli_query($db,$query1);

$query11="select * from pedidos where email='". $usuario ."' and fecha_hora = '". $fecha_actual . "' and coste_total = ". $total;
$resultado1=mysqli_query($db, $query11);

$row1=mysqli_fetch_array($resultado1);//donde se saca el id_pedido
var_dump($res);
foreach ($_SESSION['carrito'] as $id_producto=>$cantidad ) {
    $query='select * from productos where id_producto ='.$id_producto;
    $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
    $subtotal = $cantidad * $row['precio'];
    $query2="insert into pedido_productos (id_pedido,id_producto,cantidad,precio) values(".$row1['id_pedido'].",".$id_producto.",".$cantidad.",".$subtotal.")";
    $resultado2=mysqli_query($db,$query2);
}

unset($_SESSION['carrito'] );
header("Location: index.php");
?>

