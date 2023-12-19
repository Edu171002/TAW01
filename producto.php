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
 
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Compra Cafe Primo Passo | HTTP://COFFEE</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/producto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   

    <script src="javascripts/script.js" defer></script>
</head>
<body>
    <div class="wrapper">
    <!-- Sidebar navigation -->
    <div class="side-nav">
        <a href="javascript:void(0)" class="close-btn" onclick="closeSideNav()">&times;</a>
        <a href="index.html">Inicio</a>
        <a href="index.html#contact-form">Contacto</a>
        <a href="aboutus.html">Acerca de nosotros</a>
        <a href="Cafeespecialidad.html">Cafe de especialidad</a>
        <a href="Cafedescafeinado.html">Cafe descafeinado</a>
    </div>

    <!-- Header with logo and burger menu -->
    <header>
        <div class="logo">
            <a href="index.html"><img src="./imagenes/logo.png" alt="Logo"></a>
        </div>
        <div class="burger-menu" onclick="openSideNav()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div >
            <!--Esto hay que probarlo en un servidor
            <a id="cargarDatos"><i class="fa fa-shopping-cart"        style="font-size:24px;color:whitesmoke"></i></a>
            <div id="resultado"></div>

            <script src="script.js"></script>
            -->
            <a href="../checkout.html"><i class="fa fa-shopping-cart" style="font-size:24px;color:whitesmoke"></i>
            </a>
        </div>
    </header>

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
                

                    echo '<div class="mySlides fade">';
                    
                        echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'.$row['nombre'].'" style="width: 100%;">';
                    echo '</div>';

                    echo '<div class="mySlides fade">';
                    
                        echo '<img class="product-img" src="'.$array_imagen[1].'" alt="'.$row['nombre'].'" style="width: 100%;">';
                    echo '</div>';

                    echo '<a class="prev" onclick="plusSlides(-1)"> &#10094; </a>'; 
                    echo '<a class="next" onclick="plusSlides(1)"> &#10095; </a>';
            

            
       

                    echo '<div class="row">';
                
                        echo '<img class="miniatura" src="'.$array_imagen[0].'" alt="'.$row['nombre'].'" onclick="currentSlide(1)">';
                        echo '<img class="miniatura" src="'.$array_imagen[1].'" alt="'.$row['nombre'].'" onclick="currentSlide(2)">';
                
                    echo '</div> ';
                echo '</div>';
            echo '</div>';
            echo '<div class="product-details">';
                echo '<div >';
                echo '<br><br>';
                echo '<h2>'.$row['nombre'].'</h2>';
                echo '<p>'.$row['descripcion'].'</p>';
                echo '<p>Precio:'.$row['precio'].'</p>';
                
                echo '<button action="get" class="comprar">Añadir a la cesta</button>';
                if(isset($_GET['action']) && $_GET['action']=="add"){ 
		 
                    $id=intval($_GET['id_producto']); 
                     
                    if(isset($_SESSION['cart'][$id])){ 
                         
                        $_SESSION['cart'][$id]['quantity']++; 
                         
                    }else{ 
                         
                        $sql_s="SELECT * FROM products 
            WHERE id_product={$id}"; 
                        $query_s=mysql_query($sql_s); 
                        if(mysql_num_rows($query_s)!=0){ 
                            $row_s=mysql_fetch_array($query_s); 
                             
                            $_SESSION['cart'][$row_s['id_product']]=array( 
                                    "quantity" => 1, 
                                    "price" => $row_s['price'] 
                                ); 
                             
                             
                        }else{ 
                             
                            $message="This product id it's invalid!"; 
                             
                        } 
                         
                    } 
                     
                } 
            echo '</div> ';
        echo '</div>';
    echo '</div>';
 ?>
                
<footer id="footer">
    <p>&copy; 2023 HTTP://COFFEE - anamaria.espeso@estudiantes.uva.es - ivan.herrero.alonso@estudiantes.uva.es - eduardo.martinez.juarez@estudiantes.uva.es</p>
</footer>

<script src="../javascripts/script.js"></script>
</body>
</html>
