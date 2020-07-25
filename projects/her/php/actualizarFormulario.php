 <?php

    session_start();
    include("conection.php");
    validar();
    $usuario = $_POST['usuario'];
    $expediente = $_POST['expediente'];
    $calleA = $_POST['calleA'];
    $exteriorA = $_POST['exteriorA'];
    $interiorA = $_POST['interiorA'];
    $coloniaA = $_POST['coloniaA'];
    $alcaldiaA = $_POST['alcaldiaA'];
    $cpA = $_POST['cpA'];
    $ciudadA = $_POST['ciudadA'];
    $terminado = '1';

    $sql = "UPDATE `formulariosfisicos` SET
      
      `calleA` ='$calleA', 
      `numeroExteriorA` ='$exteriorA' ,
      `numeroInteriorA` ='$interiorA' ,
      `coloniaA` ='$coloniaA',
      `alcaldiaA` ='$alcaldiaA',
      `cpA` ='$cpA',
      `ciudadA` ='$ciudadA',
      `f2t` ='$terminado'





     WHERE `formulariosfisicos`.`usuario` = '$usuario' AND `formulariosfisicos`.`expediente` = '$expediente' ";

    if ($con->query($sql) === TRUE) {
        header("location: usuario.php");
    } else {
        echo "Error updating record: " . $con->error;
    }


    ?>