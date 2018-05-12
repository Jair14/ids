<?php @session_start();
if (isset($_SESSION['user'])) {
  header('location: admon.php');
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </head>
  <body class="#bdbdbd grey lighten-1">
    <div class="container">
      <div class="input-field col s12 center">
        <br>
        <br>
        <img src="../images/logo.png" width="200px">
        <br>
        <br>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content">
              <span class="card-title center">LOGIN</span>
              <form class="formulario" action="validar.php" method="POST">
                <div class="input-field">
                   <i class="material-icons prefix">account_circle</i>
                  <input type="text" name="usuario" id="usuario" required autocomplete="off" autofocus>
                  <label for="usuario">Usuario</label>
                </div>
                <div class="input-field">
                   <i class="material-icons prefix">vpn_key</i>
                  <input type="password" name="contra" id="contra" required autocomplete="off">
                  <label for="contra">Password</label>
                </div>
                <center>
                <button class="btn waves-effect waves-light" type="submit" name="enviar" id = "entrar">Entrar
                  <i class="material-icons right">send</i>
                </button>
              </center>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
