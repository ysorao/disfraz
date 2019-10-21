<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
        function datos(id) {
            var params = {
                "id": id
            };
            $.ajax({
                data: params, //datos que se envian a traves de ajax
                url: 'votar.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function() {
                    $("#resultado").html("Gracias por tu voto");
                },
                success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#acciones").html(response);

                }
            });

        }
    </script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Orlando</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown link
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="alert alert-primary m-2" role="alert">
        Tus creditos disponibles: 0
    </div>
    <div  id="resultado">

    </div>

    <div class="row m-3">
      <?php

      require('conexion.php');

      $sql = mysqli_query($conexion, "SELECT * FROM participantes");

      while ($fila = mysqli_fetch_array($sql)) {

        echo '
        <div class="row m-3">
          <div class="card m-2" style="width: 18rem;">
            <img src="'.$fila['foto'].'" class="card-img-top" alt="Orlando Medina">
            <div class="card-body">
              <h5 class="card-title text-center">'.$fila['nombre_disfraz'].'</h5>
              <p class="card-text text-center">'.$fila['nombre'].'</p>

               <button class="btn btn-success btn-block"  href="javascript:;" onclick="datos($("#id").val();return false;"  >Votar</button>
            </div>
          </div>
        </div>';

      }

       ?>


    </div>



    <!-- <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">Bootstrap</strong>
        <small class="text-muted">just now</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        See? Just like this.
      </div>
    </div> -->

  </body>
</html>
