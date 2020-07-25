<?php

$idTipoParticipacion = $_REQUEST['idTipoParticipacion'];
$expedienteP = $_REQUEST['expediente'];
$usuario = $_REQUEST['usuario'];

$tipoUsuario = $_SESSION['tipo'];

switch ($tipoUsuario) {
    case 'Usuario':
        $regresar = "usuario.php";
        break;
    case 'Corredor':
        $regresar = "corredor.php";
        $cuerpoActaConst = '<a href="administradorActa.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Acta Constitutiva';
        break;
    case 'Eventas':
        $regresar = "eVentas.php";

        break;
    case 'Administrador':
        $regresar = "administrador.php";

        break;
    case 'Cobranza':
        $regresar = "cobranza.php";

        break;
    case 'Abogado':
        $regresar = "juridico.php";

        break;


    default:
        # code...
        break;
}

switch ($idTipoParticipacion) {

    /*
     * Switch de comprobantes de solvencia, acta constitutiva, inmueble en garantia y poder del representante legal

     * Arrendador fisico - 1
     *      Identificacion, Comprobantes de solvencia
     * Arrendador moral -  2
     *      Identificacion, Comprobantes de solvencia, Acta Constitutiva, Poder del Representante Legal
     * Arrendatario fisico -  3
     *
     * Arrendatario moral -  4
     *
     * Fiador fisico -  5
     *      Identificacion, Comprobantes de solvencia
     * Fiador moral -  6
     *  Identificacion, Inmuebe en Garantia, Acta Constitutiva, Poder del Representante Legal
    *
    * */

    case '1':
        $activador = "";
        $porcentajea = "30%";
        $porcentajeb = "30%";
        $porcentajec = "30%";
        if ($tipoUsuario == 'Eventas') {
            $cuerpoSolv = '<a href="comprobantesEV.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
          <br>Comprobantes de Solvencia';
        } else {
            $cuerpoSolv = '<a href="comprobantes.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
          <br>Comprobantes de Solvencia';
        }
        $cuerpoPoderRep = '';
        break;

    case '2':
        $activador = "";
        $porcentajea = "30%";
        $porcentajeb = "30%";
        $porcentajec = "30%";
        if ($tipoUsuario == 'Eventas') {
            $cuerpoSolv = '<a href="comprobantesEV.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
          <br>Comprobantes de Solvencia';
        } else {
            $cuerpoSolv = '<a href="comprobante.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
          <br>Comprobantes de Solvencia';
        }
        $cuerpoActaConst = '<a href="administradorActa.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Acta Constitutiva';
        $cuerpoPoderRep = '<a href="administradorPoder.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Poder del Representante Legal';
        break;

    case '5':
        $activador = "";
        $porcentajea = "30%";
        $porcentajeb = "30%";
        $porcentajec = "30%";
        if ($tipoUsuario == 'Eventas') {
            $cuerpoSolv = '<a href="comprobantesEV.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
          <br>Comprobantes de Solvencia';
        } else {
            $cuerpoSolv = '<a href="comprobante.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
          <br>Comprobantes de Solvencia';
        }
        $cuerpoPoderRep = '';
        break;

    case '6':
        $activador = "";
        $porcentajea = "30%";
        $porcentajeb = "30%";
        $porcentajec = "30%";
        $cuerpoSolv = '<a href="administradorComprobantesF.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
          <br>Inmueble en garantia';
        $cuerpoActaConst = '<a href="administradorActa.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Acta Constitutiva';
        $cuerpoPoderRep = '<a href="administradorPoder.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Poder del Representante Legal';
        break;


    default:
        $activador = "visibility:hidden";
        $porcentajea = "45%";
        $porcentajeb = "10%";
        $porcentajec = "45%";
        $cuerpoPoderRep = '';
        break;
}

//Consulta Formato de Investigacion
$consultaFormato = "SELECT * FROM formatoinv WHERE usuario='$usuario' AND expediente ='$expedienteP' ";
$resultadoFormato = mysqli_query($con, $consultaFormato);
$cantidadF = mysqli_num_rows($resultadoFormato);
if ($cantidadF < 1) {
    $cuerpoFormInv = '<a href="formatoInvestigacion.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Formato de Investigación';
} else {
    $cuerpoFormInv = '<p style="color: green">Formato de Investigacion Aceptado</p>';
}
$cuerpoComp = '<a href="administradorComDomicilio.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Comprobante de Domicilio';

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table width="100%">
                <tr>
                    <td width="<?php echo $porcentajea ?>" align="center">
                        <div data-toggle="modal" data-target="#ModalJ">
                            <img src="../img/identificacion.png" width="30%">
                            <br>Subir Identificacion Oficial
                        </div>
                    </td>
                    <td width="<?php echo $porcentajeb ?>" align="center">
                        <div style="<?php echo $activador ?>">
                            <?php
                            echo $cuerpoSolv;
                            ?>
                        </div>
                    </td>
                    <td width="<?php echo $porcentajec ?>" align="center">
                        <?php echo $cuerpoFormInv ?>
                    </td>
                    <td align="center">
                        <?php echo $cuerpoComp ?>

                    </td>
                    <td align="center">
                        <?php echo $cuerpoActaConst ?>
                    </td>
                    <td align="center">
                        <?php echo $cuerpoPoderRep ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12" align="right">
            <a href="<?php echo $regresar ?>" class="btn btn-success">Regresar</a>
        </div>

    </div>
</div>


<?php

//Consulta identificaciones
$consultaIdentificacion = "SELECT * FROM identificaciones WHERE usuario='$usuario' ";
$resultadoIdentificacion = mysqli_query($con, $consultaIdentificacion);
$cantidadI = mysqli_num_rows($resultadoIdentificacion);
$registroI = mysqli_fetch_array($resultadoIdentificacion);
$rutaI = $registroI[3];
$idI = $registroI[0];

if ($cantidadI < 1) {
    $cuerpo = '<div class="modal " id="ModalJ" >
    <div class="modal-dialog" >
        <div class="modal-content" style=" width: 850px">


            <div class="modal-header" align="right">
                Identificaciónes aceptadas
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">

                <table width="100%">
                    <tr>
                        <th width="40%">Tipo de Identificación</td>
                        <th width="60%">Dependencia</td>
                    </tr>
                    <tr>
                        <td>Credencial para votar (IFE)</td>
                        <td>Instituto Federal Electoral</td>
                    </tr>
                    <tr>
                        <td>Credencial para votar (INE)</td>
                        <td>Instituto Nacional Electoral</td>
                    </tr>
                    <tr>
                        <td>Credencial del IMSS</td>
                        <td>Instituto Mexicano del Seguro Social</td>
                    </tr>
                    <tr>
                        <td>Credencial del INAPAM</td>
                        <td>Instituto Nacional Para Atencion de Adultos Mayores</td>
                    </tr>
                    <tr>
                        <td>Pasaporte</td>
                        <td>Secretaria de Gobernacion</td>
                    </tr>
                    <tr>
                        <td>Cedula Profesional</td>
                        <td>Secretaria de Educacion Publica</td>
                    </tr>

                </table>

                <hr>

                <table width="100%" >
                    <tr>
                        <td colspan="4">Estatus</td>
                    </tr>

                    <tr>


                        <td style="font-weight: bold;">El usuario no cuenta con este documento</td>

                </table>

                </form>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>';
} else {
    $cuerpo = '<div class="modal " id="ModalJ" >
    <div class="modal-dialog" >
        <div class="modal-content" style=" width: 850px">


            <div class="modal-header" align="right">
                Identificaciónes aceptadas
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">

                <table width="100%">
                    <tr>
                        <th width="40%">Tipo de Identificación</td>
                        <th width="60%">Dependencia</td>
                    </tr>
                    <tr>
                        <td>Credencial para votar (IFE)</td>
                        <td>Instituto Federal Electoral</td>
                    </tr>
                    <tr>
                        <td>Credencial para votar (INE)</td>
                        <td>Instituto Nacional Electoral</td>
                    </tr>
                    <tr>
                        <td>Credencial del IMSS</td>
                        <td>Instituto Mexicano del Seguro Social</td>
                    </tr>
                    <tr>
                        <td>Credencial del INAPAM</td>
                        <td>Instituto Nacional Para Atencion de Adultos Mayores</td>
                    </tr>
                    <tr>
                        <td>Pasaporte</td>
                        <td>Secretaria de Gobernacion</td>
                    </tr>
                    <tr>
                        <td>Cedula Profesional</td>
                        <td>Secretaria de Educacion Publica</td>
                    </tr>

                </table>

                <hr>
                Ya cuentas con una identificacion en el sistema.

                <a class="btn btn-success" href="' . $rutaI . '">Mostrar</a>



                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>';
}
echo $cuerpo;
?>


<dir style="font-weight: bold;"></dir>


<!-- Termina el modal -->