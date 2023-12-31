<?php 
	session_start(); 
	require("conexBD.php"); 
	if(isset($_GET['page'])){ 
		 
		$pages=array("products", "cart"); 
		 
		if(in_array($_GET['page'], $pages)) { 
			 
			$_page=$_GET['page']; 
			 
		}else{ 
			 
			$_page="products"; 
			 
		} 
		 
	}else{ 
		 
		$_page="products"; 
		 
	} 
    include 'header.php';
 ?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Compra Cafe Primo Passo | HTTP://COFFEE</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/producto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    <?php
        include('conexBD.php');
        $id_producto=$_GET['id_producto'];
        $query="select * from productos where id_producto=".$id_producto;
        $resultado=mysqli_query($db,$query);
        $num=mysqli_num_rows($resultado);

        $row=mysqli_fetch_array($resultado);
        $array_imagen=explode('@',$row['imagen']);
    
        echo '<div id="main">';
            echo '<div class="column">';
                echo '<div class="gallery" style="align-content: left;">';
                

                    echo '<div class="row">';
                
                        echo '<img class="miniatura" src="'.$array_imagen[0].'" alt="'.$row['nombre'].'" onclick="currentSlide(1)">';
                        echo '<img class="miniatura" src="'.$array_imagen[1].'" alt="'.$row['nombre'].'" onclick="currentSlide(2)">';
                
                    echo '</div> ';
                echo '</div>';
            echo '</div>';
            echo '<div class="product-details">';
                
                echo '<h2>'.$row['nombre'].'</h2>';
                echo '<p>'.$row['descripcion'].'</p>';
                echo '<p>Precio:'.$row['precio'].'</p>';
                echo '<button><a href="agregarAlCarrito.php?id_producto=' . $id_producto . '">Añadir a la cesta</a></button>';
                
            
        echo '</div>';
    echo '</div>';

    //include "footer.php";
 ?>
                


<script src="../javascripts/script.js"></script>
</body>
</html>
