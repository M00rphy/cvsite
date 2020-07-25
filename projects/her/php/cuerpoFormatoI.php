<?php

$expedienteP = $_REQUEST['expedienteP'];
$usuario = $_REQUEST['usuario'];
$idTipoParticipacion = $_REQUEST['idTipoParticipacion'];
$formInv = '';
$formInvComp = '';
$tipoUsuarioB = $_SESSION['tipo'];

switch ($tipoUsuarioB) {
    case 'Usuario':
        $formInv = '<p>
        DECLARO BAJO PROTESTA DE DECIR VERDAD, QUE LOS DATOS QUE EN ESTE DOCUMENTO SE EXPRESAN SON VERIDICOS Y
        AUTORIZO A LA EMPRESA LEGAL INTEGRAL ARRENDAMIENTO S.C., PARA COMPROBAR Y VERIFICAR LOS MISMOS EN SU
        OPORTUNIDAD, LOS CUALES SERVIRÁN PARA REALIZAR EL TRAMITE Y AUTORIZACIÓN DEL CONTRATO DE ARRENDAMIENTO
        QUE ESTOY SOLICITANDO.</p>
    
    <p>
        <?php echo $completo; ?>, desde este momento manifiesta que la información y datos personales
proporcionados por arrendatarios, fiadores y arrendadores, no podrá proporcionarlas a terceros, ya que
esta información es para la tramitación, autorización y llenado de contratos de arrendamiento, así como
para la defensa de los arrendadores en caso de incumplimiento de las obligaciones de los arrendatarios o
de sus fiadores, en los contratos o en sus condiciones. Por lo que <?php echo $completo; ?>, se
compromete a tenerlos bajo su resguardo quedándole estrictamente prohibido difundirlos por cualquier
medio.</p>

CONFORME:';
$formInvComp = '<a
    href="guardarFormatoInv.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"
    class="btn btn-success">Al dar clic Acepto los terminos descritos</a>';
$regresar = "usuario.php";
break;

case 'Corredor':
$regresar = "corredor.php";
$formInv = '<p>
    AUN NO SE HA LLENADO EL FORMATO.</p>';
$formInvComp = '';
break;

case 'Eventas':
$regresar = "eVentas.php";
$formInv = '<p>
    AUN NO SE HA LLENADO EL FORMATO.</p>';
$formInvComp = '';
break;

case 'Administrador':
$regresar = "administrador.php";
$formInv = '<p>
    AUN NO SE HA LLENADO EL FORMATO.</p>';
$formInvComp = '';
break;


default:
$formInv = '<p>
    DECLARO BAJO PROTESTA DE DECIR VERDAD, QUE LOS DATOS QUE EN ESTE DOCUMENTO SE EXPRESAN SON VERIDICOS Y
    AUTORIZO A LA EMPRESA LEGAL INTEGRAL ARRENDAMIENTO S.C., PARA COMPROBAR Y VERIFICAR LOS MISMOS EN SU
    OPORTUNIDAD, LOS CUALES SERVIRÁN PARA REALIZAR EL TRAMITE Y AUTORIZACIÓN DEL CONTRATO DE ARRENDAMIENTO
    QUE ESTOY SOLICITANDO.</p>

<p>
    <?php echo $completo; ?>, desde este momento manifiesta que la información y datos personales
    proporcionados por arrendatarios, fiadores y arrendadores, no podrá proporcionarlas a terceros, ya que
    esta información es para la tramitación, autorización y llenado de contratos de arrendamiento, así como
    para la defensa de los arrendadores en caso de incumplimiento de las obligaciones de los arrendatarios o
    de sus fiadores, en los contratos o en sus condiciones. Por lo que <?php echo $completo; ?>, se
    compromete a tenerlos bajo su resguardo quedándole estrictamente prohibido difundirlos por cualquier
    medio.</p>

CONFORME:';
$formInvComp = 'href="guardarFormatoInv.php?expedienteP=<' . $expedienteP . '&usuario=' . $usuario
    . '&idTipoParticipacion=' . $idTipoParticipacion . '' ; $regresar="usuario.php" ; break; } ?>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <center>
                    <h3 style="color: #2F777E">Formato de Investigación</h3>
                </center>

                <?php echo $formInv; ?>
                <br>

                <?php echo $formInvComp; ?>

            </div>
        </div>
    </div>









    <div class="container">
        <div class="row">
            <div class="col-12" align="right">
                <a href="<?php echo $regresar ?>" class="btn btn-warning">Regresar</a>


            </div>

        </div>

    </div>