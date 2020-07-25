<?php
session_start();
include("conection.php");
validar();
$expediente = $_REQUEST['expediente'];
$usuario = $_REQUEST['usuario'];


$consultaP = "SELECT * FROM contratos WHERE  expediente = '$expediente' AND usuario = '$usuario' ";
$resultadoP = mysqli_query($con, $consultaP);
$rowP = mysqli_fetch_array($resultadoP);

$contrato = $rowP[3];

?>
<?php echo $contrato ?>