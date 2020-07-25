<?php
$tipoUsuario = $_SESSION['tipo'];
$expedienteP = $_REQUEST['expediente'];
switch ($tipoUsuario) {
    case 'Usuario':
        $regresar = "usuario.php";
        break;
    case 'Corredor':
        $regresar = "corredor.php";
        break;
    case 'Eventas':
        $regresar = "eVentas.php";
        $desactivar = '';
        break;
    case 'Administrador':
        $regresar = "administrador.php";
        $desactivar = 'style="display: none"';
        break;
    default:
        # code...
        break;
}
$consultaDatos = "SELECT * FROM expedientes WHERE idRelacion = '$expedienteP' ";

$resultadoDatos = mysqli_query($con, $consultaDatos);

$registroD = mysqli_fetch_array($resultadoDatos);

$idRelacion = $registroD[1];
$tipoI = $registroD[2];
$calle = $registroD[3];
$exterior = $registroD[4];
$interior = $registroD[5];
$colonia = $registroD[6];
$alcaldia = $registroD[7];
$cp = $registroD[8];
$ciudad = $registroD[9];
$uso = $registroD[10];
$renta = $registroD[11];
$cuota = $registroD[12];
$cobertura = $registroD[13];
$vigenciaInicio = $registroD[14];
$vigenciaFinal = $registroD[15];
$montoI = $registroD[23];
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <center>
                <h3>Informacion General</h3>
            </center>
            <table class="table table-striped">
                <tr>
                    <td><b>Id Expediente :</b> <?php echo $idRelacion ?></td>
                    <td><b>Tipo de Inmueble :</b> <?php echo $tipoI ?></td>
                    <td><b>Uso :</b> <?php echo $uso ?></td>
                    <td><b>Cobertura :</b> <?php echo $cobertura ?></td>
                </tr>
                <tr>
                    <form action="actualizarAdenda.php" method="POST">
                        <td><b>Renta :</b><br>$<input type="number" name="renta" value="<?php echo $renta ?>">.00</td>
                        <td><b>Mantenimiento :</b><br>$<input type="number" name="cuota"
                                                              value="<?php echo $cuota ?>">.00
                        </td>
                        <td><b>Vigencia Inicio :</b><br><input type="date" name="vigenciaInicio"
                                                               value="<?php echo $vigenciaInicio ?>"></td>
                        <td><b>Vigencia Final :</b><br><input type="date" name="vigenciaFinal"
                                                              value="<?php echo $vigenciaFinal ?>"></td>
                </tr>
                <tr>
                    <td><b>Calle :</b> <?php echo $calle ?></td>
                    <td><b>Num Exterior :</b> <?php echo $exterior ?></td>
                    <td><b>Num Interior :</b> <?php echo $interior ?></td>
                    <td><b>Colonia :</b> <?php echo $colonia ?></td>
                </tr>
                <tr>
                    <td><b>Alcaldia :</b> <?php echo $alcaldia ?></td>
                    <td><b>C.P. :</b> <?php echo $cp ?></td>
                    <td><b>Ciudad :</b> <?php echo $ciudad ?></td>
                    <td></td>
                </tr>
            </table>
            <input style="display: none" type="text" name="expediente" value="<?php echo $idRelacion ?>">
            <input type="submit" class="btn btn-primary" value="Actualizar">
            </form>
        </div>
    </div>
</div>
<div class="container" <?php echo $desactivar ?>>
    <div class="row">
        <div class="col-12">

        </div>

    </div>

</div>
<a href="<?php echo $regresar ?>" class="btn btn-success">Regresar</a>