<?php
session_start();
$id_producto=$_GET['id_producto'];

if($_SESSION['carrito'][$id_producto]){
    $_SESSION['carrito'][$id_producto]++;}
else{
    $_SESSION['carrito'][$id_producto]=1;}

header('location:index.php');
?>