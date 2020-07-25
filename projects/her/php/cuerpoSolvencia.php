<?php
$btnEliminar = '';
$usuario = $_SESSION['usuario'];
$expediente = $_REQUEST['expediente'];
$tipoUsuario = $_SESSION['tipo'];
$consultaP = "SELECT * FROM expedientes WHERE expediente='$expediente' AND estatus != 'Eliminado' ";
$resultadoP = mysqli_query($con, $consultaP);
$rowP = mysqli_fetch_array($resultadoP);
$renta = $rowP[11];
$mantenimiento = $rowP[12];
$estatusV = $rowP[34];
$ingresosComprobables = $rowP[33];
$rentaMensualMant = $renta + $mantenimiento;
$ingresoRenta = $ingresosComprobables * .30;

// guardar en la tabla ingresosComprobables, estatusV e ingresoRenta

switch ($tipoUsuario) {
    case 'Usuario':
        $regresar = "usuario.php";
        break;
    case 'Corredor':
        $regresar = "corredor.php";

        break;
    case 'Eventas':
        $regresar = "eVentas.php";
        $desactivar = 'style= "display:inline"';

        break;
    case 'Administrador':
        $regresar = "administrador.php";
        $desactivar = 'style= "display:none"';
        break;

    case 'Cobranza':
        $regresar = "cobranza.php";
        $desactivar = 'style= "display:none"';
        break;

    default:
        # code...
        break;
}
?>
<div class="container">
    <div class="card">
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">


                <form action="enviarExpediente.php" method="POST">
                    <table width="100%">
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="ingresosComprobables" class="col-form-label col-form-label-sm">Total
                                        de
                                        ingresos comprobable</label>
                                    <input class="form-control form-control-sm" type="number" class="form-control"
                                        id="ingresosComprobables" placeholder="#####" name="ingresosComprobables"
                                        onchange="ingresoDeRenta()">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="rentaMensualMante" class="col-form-label col-form-label-sm">Total de
                                        la
                                        renta
                                        mensual con mantenimiento</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="rentaMensualMante" placeholder="Renta con mantenimiento"
                                        name="rentaMensualMante" value="<?php echo $rentaMensualMant ?>" readonly>
                                </div>

                            </td>
                        </tr>
                    </table>

                    <table width="100%">
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="ingresoRenta" class="col-form-label col-form-label-sm">Ingreso
                                        destinado
                                        a renta</label>
                                    <input class="form-control form-control-sm" type="Number" class="form-control"
                                        id="ingresoRenta" placeholder="Ingreso destinado a renta" name="ingresoRenta"
                                        readonly>
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="estatusV" class="col-form-label col-form-label-sm">Estatus de
                                        solvencia</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="estatusV" placeholder="Estatus" name="estatusV" readonly>
                                </div>
                                <script src="../js/ingresorentaold.js"></script>
                            </td>

                        </tr>


                    </table>
                    <div class="col-12" align="right">
                        <a href="<?php echo $regresar ?>" class="btn btn-success">Regresar</a>
                        <input <?php echo $desactivar ?> type="submit" value="Guardar" class="btn btn-success">
                    </div>
                </form>

            </div>
        </div>