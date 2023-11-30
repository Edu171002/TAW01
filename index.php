<?php //poner donde queramos
session_start();
// cambiar por el texto echo var_dump($_SESSION);
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1, maximum-scale=1"/>
    <title>HTTP://COFFEE - Tu Destino para Café Gourmet en Línea</title>
    <link rel="stylesheet" type="text/css" href="styles\styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="description" content="Descubre el auténtico sabor del café en línea con HTTP:// COFFEE. Ofrecemos una selección excepcional de café gourmet. ¡Experimenta el aroma y el sabor del café de calidad hoy!">
    <meta name="keywords" content="café gourmet, comprar café en línea, café en grano, café molido, cafe descafeinado, tienda de café en línea, HTTP:// COFFEE, café fresco">
    <meta name="author" content="HTTP://COFFEE">
    <meta name="language" content="Español">
    <meta name="robots" content="index, follow">
</head>
<body>
    <!-- Sidebar navigation -->
    <div class="side-nav focusable">
        <a href="javascript:void(0)" class="close-btn focusable" onclick="closeSideNav()">&times;</a>
        <a href="index.html">Inicio</a>
        <a href="#contact-form">Contacto</a>
        <a href="aboutus.html">Acerca de nosotros</a>
        <a href="Cafeespecialidad.html">Cafe de especialidad</a>
        <a href="Cafedescafeinado.html">Cafe descafeinado</a>
    </div>
    
    <!-- Header with logo and burger menu -->
    <header>
        <div class="logo">
            <a href="index.html"><img src="imagenes/logo.png" alt="Logo"></a>
        </div>
        <div class="burger-menu" onclick="openSideNav()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div >
            <a href="checkout.html"><i class="fa fa-shopping-cart" style="font-size:24px;color:whitesmoke"></i>
            </a>
        </div>
    </header>

    <div id="main">
        <!-- Gallery of rotating images -->
     <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade button-container">
                <img src="imagenes\Granos-de-Cafe.jpg" alt="Granos de cafe siendo tostados" style="width:100%">
                <h1 class="caption">Cafe de especialidad para los amantes del cafe.</h1>
                <a href="Cafeespecialidad.html"><b alt="Button" style="cursor: pointer">Ir a</b></a>
                </div>
            </div>
        
            <div class="mySlides fade  button-container">
                <img src="./imagenes/Sacos-de-Cafe.jpg" alt="Sacos de cafe" style="width:100%">
                <h1 class="caption">Cafe descafeinado para los que no quieran la cafeina pero si quieran el sabor.</h1>
                <a href="Cafedescafeinado.html"><b  alt="Button" style="cursor: pointer">Ir a</b></a>
                </div>
            </div>
            
            <!-- Next and previous buttons -->
            <a class="prev focusable" onclick="plusSlides(-1)">&#10094;</a> <!-- &# significa símbolos. -->
            <a class="next focusable" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        
        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>


        <!-- Matrix of products (3x2) -->
        <div class="product-grid">
            <?php
                include('conexBD.php');
                $query="select * from productos";
                $resultado=mysqli_query($db,$query);
                $num=mysqli_num_rows($resultado);

                for($i=0;$i<$num;$i++){
                    $row=mysqli_fetch_array($resultado);
                    $array_imagen=explode('@',$row['imagen']);
                    echo '<div class="product-square">';
                        echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
                        echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
                        echo '<p class="product-description">'.$row['descripcion'].'</p>';        
                    echo '</div>';
                }
            ?>
        </div>
        <!-- Formulary -->
        <a name="contact-form"></a>
        <form class="contact-form focusable" >
            <h2>Contact Us</h2>
            <input type="text " placeholder="Name">
            <input type="email " placeholder="Email">
            <textarea placeholder="Message"></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Footer -->
    <footer id="footer"><p>&copy; 2023 HTTP://COFFEE - anamaria.espeso@estudiantes.uva.es - ivan.herrero.alonso@estudiantes.uva.es - eduardo.martinez.juarez@estudiantes.uva.es</p>
    </footer>

    <script src="javascripts/script.js"></script>
</body>
</html>

