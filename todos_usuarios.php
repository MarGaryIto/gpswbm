<?php
  include ("php/conexion.php");

  $conexion = mysql_connect($puerto,$usuario,$contrasena);
  mysql_select_db($db_name);

  $query = "SELECT U.nombre,U.email,U.contrasena,TU.tipo_usuario,U.id_usuario
  FROM usuarios U, tipos_usuarios TU
  WHERE TU.id_tipo_usuario = U.fk_tipo_usuarios";
  $result = mysql_query($query);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Registro</title>
    <link rel="icon" type="image/ico" href="images/logo.ico" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  </head>
  <body>
    <nav role="navigation" class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="todos_usuarios.php" class="navbar-brand">GPS-Warning BM</a>
      </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="todos_usuarios.php">Inicio</a></li>
            <li><a href="agregar_usuario.php">Agregar Usuario</a></li>
            <li><a href="acerca_de.php">Acerca de</a></li>
          </ul>
        <form class="navbar-form navbar-right" action="busca_usuario.php" role="search">
          <input type="text" name="parametro" id="parametro" class="form-control" placeholder="Buscar">
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
      </div>            
      <div class="jumbotron text-center">
        <h1>GPS Warning - BM</h1>
        <img src="images/logo.png" class="img-rounded" alt="Cinque Terre" width="100" height=auto>
        <p>Estas son todas las cuentas registradas.</p> 
      </div>
      <div class="container">
        <div class="row">
          <?php
            while ( $registro = mysql_fetch_array($result)) {
          ?>
          <div class="col-sm-4">
            <div class="panel panel-default">
              <button onclick="window.location.href='usuario.php?id=<?php echo $registro[4];?>'" class="btn btn-default btn-block">
                <h3><?php echo $registro[0]?></h3>
              </button>
              <p>email: <?php echo $registro[1]?></p>
              <p>contrasena: <?php echo $registro[2]?></p>
              <p>tipo: <?php echo $registro[3]?></p>
            </div>
          </div>
          <?php
            }
          ?>       
        </div>
      </div>
    </nav>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="//assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/ie10-viewport-bug-workaround.js"></script>
  <script src="js/ie-emulation-modes-warning.js"></script>
</html>