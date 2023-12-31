 
<html>
  
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
    <br><br> <br><br>
    <div class="form-container">
      <form action="registro_admin.php" method="post">
        <div class="row">
          <div class="col-50">
            <h3 style="text-align: center">Formulario de registro</h3>
              <div class="large_form">
                <div class="large_form-grid">
                  <div class="form">
                    <label for="nombre"><i class=""></i> Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Estudiante">
                  </div>
                  <div class="form">
                    <label for="apellidos"><i class=""></i> Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Estudiante">
                  </div>
                  <div class="form">
                    <label for="email"><i class=""></i> Email</label>
                    <input type="text" id="email" name="email" placeholder="estudiante@example.com">
                  </div>
                  <div class="form">
                    <label for="telefono"><i class=""></i> Telefono</label>
                    <input type="text" id="telefono" name="telefono" placeholder="1234567">
                  </div>
                  <div class="form">
                    <label for="direccion"><i class=""></i> Direccion</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Calle aleatoria numero 1">
                  </div>
                  <div class="form">
                    <label for="ciudad"><i class=""></i> Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad">
                  </div>
                  <div class="form">
                    <label for="password"><i class=""></i>Password</label>
                    <input type="password" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form">  
                    <label for="fecha_nac"><i class=""></i> Fecha de nacimiento</label>
                    <input type="text" id="fecha_nac" name="fecha_nac" placeholder="Selecciona una fecha">
                  </div>
                  <div class="form">  
                    <label for="privilegio"><i class=""></i>Privilegio</label>
                    <input type="tinyint" id="privilegio" name="privilegio" placeholder="1 o 2">
                  </div>
                </div>
                <div class="form"> 
                  <input type="submit" value="Enviar" class="button" >
                </div>
            </div>
          </div>
        </div>
      </form>
</div>
    
    <script>
      // Inicializa el DatePicker para el campo de fecha
      $(document).ready(function(){
        $('#fecha_nac').datepicker({
          dateFormat: 'yy-mm-dd',
          changeMonth: true,
          changeYear: true
        });
      });
    </script>
   
    
   <br>
   <br>

    </body>
    </html>