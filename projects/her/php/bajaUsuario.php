<?php
 
  session_start();
  include("conection.php");
  validar();

  $usuarioC = $_REQUEST['usuarioC'];
  $estado ="Baja";

   $sql = "UPDATE `usuarios` SET
      
      
      `estatus` ='$estado'





     WHERE `usuarios`.`usuario` = '$usuarioC'  ";

        if ($con->query($sql) === TRUE) {
            header("location: administrador.php");
        } else {
            echo "Error updating record: " . $con->error;
        }
  

  ?>