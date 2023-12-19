<link rel="stylesheet" type="text/css" href="styles\styles.css">

<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="keyword" name="nombre">
    <br>
    <label for="descripcion">Descripción:</label>
    <input type="text" id="keyword" name="descripcion">
    <br>
    <label for="precioMin">Precio desde:</label>
    <input type="number" id="precioMin" name="precioMin" min="0">
    <label for="precioMax">hasta:</label>
    <input type="number" id="precioMax" name="precioMax" min="0">
    <br>
    <label for="pesoMin">Peso desde:</label>
    <input type="number" id="pesoMin" name="pesoMin" min="0">
    <label for="pesoMax">hasta:</label>
    <input type="number" id="pesoMax" name="pesoMax" min="0">
    <br>
    <label for="cafeina">Cafeina:</label>
    <select id="cafeina" name="cafeina">
      <option value="cafeinado">Cafeinado</option>
      <option value="descafeinado">Descafeinado</option>
    </select>
    <br>

    <button type="submit" name="search">Buscar</button>
  </form>

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

    $query = "SELECT * FROM productos
                WHERE nombre LIKE '%" . $nombre . "%'
                AND descripcion LIKE '%" . $descripcion . "%'
                AND descripcion LIKE '%" . $cafeina . "%'";
    if($precioMax)
        $query .= " AND precio <= " . $precioMax;
    if($precioMin)
        $query .= " AND precio >= " . $precioMin;
    // if($pesoMax)
    //     $query .= " AND peso <= " . $pesoMax;
    // if($pesoMin)
    //     $query .= " AND peso >= " . $pesoMin;
//añadir una columna llamada peso
        
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
            }
    echo '</div>';
     }
    else {
     //Si no hay registros encontrados
       echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
     }

?>