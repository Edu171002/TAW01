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

<html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Formulario de Registro</title>
      <!-- Incluye jQuery y jQuery UI -->
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
       <link rel="stylesheet" type="text/css" href="styles\styles.css">
      
    </head>
    <body>
    
    <?php 
    include 'header.php'; //Al añadir aquí la cabecera aparecen iconos junto a los label del formulario
    ?> 

    <link rel="stylesheet" type="text/css" href="styles\styles.css">


    <div class="advsearch-container">
        <div class="large_form">
            <form action="" method="post">
                <div class="large_form-grid">
                    <div class="form">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="keyword" name="nombre">
                    </div><div class="form">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" id="keyword" name="descripcion">
                    </div><div class="form">
                        <label for="precioMin">Precio desde:</label>
                        <input type="number" id="precioMin" name="precioMin" min="0">
                        <label for="precioMax">hasta:</label>
                        <input type="number" id="precioMax" name="precioMax" min="0">
                    </div><div class="form">
                        <label for="pesoMin">Peso desde:</label>
                        <input type="number" id="pesoMin" name="pesoMin" min="0">
                        <label for="pesoMax">hasta:</label>
                        <input type="number" id="pesoMax" name="pesoMax" min="0">
                    </div><div class="form">
                        <label for="cafeina">Cafeina:</label>
                        <select id="cafeina" name="cafeina">
                        <option value="cafeinado">Cafeinado</option>
                        <option value="descafeinado">Descafeinado</option>
                        </select>
                    </div><div class="form">
                        <br><input type="submit" id="search" name="search" class="button">
                    </div>
                </div>  
            </form> 
        </div>
    </div>

    <?php
    //Si se ha pulsado el botón de buscar
    if (isset($_POST['search'])) {
        //Recogemos las claves enviadas
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precioMin = $_POST['precioMin'];
        $precioMax = $_POST['precioMax'];
        $pesoMin = $_POST['pesoMin'];
        $pesoMax = $_POST['pesoMax'];
        $cafeina = $_POST['cafeina'];


        //Conectamos con la base de datos en la que vamos a buscar
        //Poner esta siguiente linea con una @ delante y un if después comprobando y dando mensaje, en un fichero separado, del que haceis un include aquí y donde sea
        include('conexBD.php');

        if (strlen($cafeina)>10)    //Si la cadena es más larga de 10 caracteres es porque se ha seleccionado "descafeinado"
        $query = "SELECT * FROM productos
                    WHERE nombre LIKE '%" .$nombre. "%'
                    AND descripcion LIKE '%descafeinado%'";

        else
        $query = "SELECT * FROM productos
                    WHERE nombre LIKE '%" .$nombre. "%'
                    AND descripcion NOT LIKE '%descafeinado%'";

        
        if($precioMax)
            $query .= " AND precio <= " . $precioMax;
        if($precioMin)
            $query .= " AND precio >= " . $precioMin;
        if($pesoMax)
            $query .= " AND peso <= " . $pesoMax;
        if($pesoMin)
            $query .= " AND peso >= " . $pesoMin;
    
            
        $query.= " ORDER BY nombre";

        $resultado = mysqli_query($db, $query);

        
            echo '<ul>';
            echo' <div class="product-grid">';
        
            
                $num=mysqli_num_rows($resultado);

                if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {

                    for($i=0;$i<$num;$i++){
                        $row=mysqli_fetch_array($resultado);
                        $array_imagen=explode('@',$row['imagen']);
                        echo '<div class="product-square">';
                            echo '<img class="product-img" src="'.$array_imagen[0].'" alt="'. $row['nombre'] .'">';
                            echo '<a href="producto.php?id_producto='. $row['id_producto'] .'"><h4  class="product-name focusable">'.$row['nombre'].'</h4></a>';
                            echo '<p class="product-description">'.$row['descripcion'].'</p>';        
                        echo '</div>';
                    }
                } else echo '</div></ul><h2 style="text-align: center">No se encuentran resultados con los criterios de búsqueda.</h2>';
        echo '</div>';
        echo '</ul>';
        }
        else {
        //Si no hay registros encontrados
        echo '<h2 style="text-align: center">Introduce palabras clave en el cuadro de búsqueda.</h2>';
        }

    ?>
    <script src="javascripts/script.js"></script>
    
    <?php 
    include 'footer.php';
    ?>

    </body>
</html>