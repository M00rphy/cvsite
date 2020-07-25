<?php
 
  session_start();
  include("conection.php");
  validar();
  $expediente =$_REQUEST['expediente'];
  
  
  $sql = "UPDATE `expedientes` SET
      
      `estatus` ='Juridico'





     WHERE  `expedientes`.`expediente` = '$expediente' ";

        if ($con->query($sql) === TRUE) {
            
        } else {
            echo "Error updating record: " . $con->error;
        }


  $sql2 = "UPDATE `relacionadosexpediente` SET
      
      `estatus` ='Juridico'





     WHERE  `relacionadosexpediente`.`expediente` = '$expediente' ";

        if ($con->query($sql2) === TRUE) {
            header("location: eVentas.php");
        } else {
            echo "Error updating record: " . $con->error;
        }
  
 ?>