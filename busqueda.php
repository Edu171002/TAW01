<form action="" method="POST">
Palabras clave
<input type="text" id="keywords" name="keywords" size="30" maxlength="30">
<input type="submit" name="search" id="search" value="Buscar">
</form>
<?php
//Si se ha pulsado el botón de buscar
if (isset($_POST['search'])) {
    //Recogemos las claves enviadas
    $keywords = $_POST['keywords'];

    //Conectamos con la base de datos en la que vamos a buscar
    $db = mysqli_connect('localhost', 'root', 'mysql', 'cafe');
    

    $query = "SELECT id_producto, nombre, descripcion, precio, imagen 
                FROM productos
                WHERE (nombre LIKE '%" . $keywords . "%'
                OR descripcion LIKE '%" . $keywords . "%')
                ORDER BY nombre";

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
            }
    echo '</div>';
     }
    else {
     //Si no hay registros encontrados
       echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
     }

?>