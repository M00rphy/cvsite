<?php
 
  session_start();
  include("conection.php");
  validar();
  $expediente =$_POST['expediente'];
  $monto =$_POST['monto'];
  
  $sql = "UPDATE `expedientes` SET
      
      `costoInvestigacion` ='$monto'





     WHERE  `expedientes`.`idrelacion` = '$expediente' ";

        if ($con->query($sql) === TRUE) {
            header("location: eVentas.php");
        } else {
            echo "Error updating record: " . $con->error;
        }
  
 ?>