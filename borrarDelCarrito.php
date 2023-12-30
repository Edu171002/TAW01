<?php
session_start();
$id_producto=$_GET['id_producto'];


unset($_SESSION['carrito'][$id_producto]);
header('location:carrito.php');
?>