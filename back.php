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
