<link rel="stylesheet" type="text/css" href="styles\styles.css">

<?php
// Iniciar sesión
session_start();
 
// Conexión a la base de datos
include('conexBD.php');
 
$errors = [];
// Si se ha enviado el formulario
if (@isset($_POST['login_button'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass = mysqli_real_escape_string($db, $_POST['password']);
 
  // Comprobar si el nombre de usuario es válido
  $query = "SELECT * FROM usuarios WHERE email='$email' and pass='$pass'";
  $resultado = mysqli_query($db, $query);
 
  if (mysqli_num_rows($resultado) == 1) {
    // Nombre de usuario válido, verificar contraseña
    
      $row=mysqli_fetch_array($resultado);
      // Inicio de sesión válido
      $_SESSION['email']=$email;
      $_SESSION['privilegio']=$row['privilegio'];
      header ("Location: index.php");
    } else {
    // Nombre de usuario inválido
    echo "<script>alert('Nombre de usuario/contraseña inválidos');history.back();</script>";
  }
}

  mysqli_close($db);

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

    <div class="search-container">
        <form action="" method="POST">
            <div class="search">
                <label for="keywords"><i></i> Palabras clave</label>
                <input type="text" id="keywords" name="keywords" size="30" maxlength="30">
                
                <input type="submit" name="search" id="search" value="Buscar" class="button">
                <a href="busqueda_avanzada.php" style="color: #B87C48; font-size: 10pt">Búsqueda avanzada</a>
            </div> 
        </form>
    </div>

    <?php
    //Si se ha pulsado el botón de buscar
    if (isset($_POST['search'])) {
        //Recogemos las claves enviadas
        $keywords = $_POST['keywords'];

        //Conectamos con la base de datos en la que vamos a buscar
        include('conexBD.php');
        

        $query = "SELECT id_producto, nombre, descripcion, precio, imagen 
                    FROM productos
                    WHERE (nombre LIKE '%" . $keywords . "%'
                    OR descripcion LIKE '%" . $keywords . "%')
                    ORDER BY nombre";

        $resultado = mysqli_query($db, $query);
        $num=mysqli_num_rows($resultado);

        if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
            echo' <div class="product-grid">';
            for($i=0;$i<$num;$i++){
                $row=mysqli_fetch_array($resultado);
                $array_imagen=explode('@',$row['imagen']);
                echo '<div class="product-square">';
                    echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
                    echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
                    echo '<p class="product-description">'.$row['descripcion'].'</p>';        
                echo '</div>';
            }
            echo '</div>';
        } else echo '<h2 style="text-align: center">No se encuentran resultados con los criterios de búsqueda.</h2>';
        
        }
    else {
    //Si no se ha utilizado el botón de búsqueda desde la última carga 
    echo '<h2 style="text-align: center">Introduce palabras clave en el cuadro de búsqueda.</h2>';
    }

    ?>

    <?php 
        include 'footer.php';
        ?>

        <script src="javascripts/script.js"></script>
</body>
</html>