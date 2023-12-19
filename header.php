<?php
?>
<title>HTTP://COFFEE - Tu Destino para Café Gourmet en Línea</title>
    <link rel="stylesheet" type="text/css" href="styles\styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div >
            <a href="busqueda.php"><span style='font-size:25px;'>&#128269;</span>
            </a>
        </div>
        <div >
            <a href="login.php"><span style='font-size:25px;'>&#128100;</span>
            </a>
        </div>
         
        <?php
        
    if ( $_SESSION['privilegio'] == "1") {
        echo '<div><a href="admin_site.php"><i style="font-size:24px;color:whitesmoke"> Admin </i></a></div>';
    }
?>
    </header>