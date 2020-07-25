<?php

$idTipoParticipacion = $_REQUEST['idTipoParticipacion'];
$expedienteP = $_REQUEST['expedienteP'];
$usuario = $_REQUEST['usuario'];


switch ($idTipoParticipacion) {
    case '1':
        $activador = "";
        $tabla = '';
        $cuerpoActa = '';
        $cuerpoS = '<a href="comprobante.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
              <br>Comprobantes de Solvencia';
        $cuerpoRemp = '';
        break;

    case '2':
        $activador = "";
        $tabla = '';
        $cuerpoS = '<a href="comprobante.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
              <br>Comprobantes de Solvencia';
        $cuerpoActa = '<a href="administradorActa.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Acta Constitutiva';
        $cuerpoRemp = '<a href="administradorPoder.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Poder del Representante Legal';
        break;

    case '5':
        $activador = "";
        $tabla = '';
        $cuerpoS = '<a href="administradorComprobantesF.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
              <br>Inmueble en garantia';
        $cuerpoActa = '';
        $cuerpoRemp = '';
        break;

    case '6':
        $activador = "";
        $tabla = '';
        $cuerpoS = '<a href="administradorComprobantesF.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/comprobante.png" width="30%"></a>
              <br>Inmueble en garantia';
        $cuerpoActa = '<a href="administradorActa.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Acta Constitutiva';
        $cuerpoRemp = '<a href="administradorPoder.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Poder del Representante Legal';
        break;

    default:
        $activador = "visibility:hidden";
        $tabla = 'style="display: none"';
        $cuerpoActa = '';
        $cuerpoRemp = '';
        break;
}

$consultaFormato = "SELECT * FROM formatoinv WHERE usuario='$usuario' AND expediente ='$expedienteP' ";
$resultadoFormato = mysqli_query($con, $consultaFormato);
$cantidadF = mysqli_num_rows($resultadoFormato);
if ($cantidadF < 1) {
    $cuerpoF = '<a href="formatoInvestigacion.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Formato de Investigación';
} else {
    $cuerpoF = '<p style="color: green">Formato de Investigacion Aceptado</p>';
}

$cuerpoComp = '<a href="administradorComDomicilio.php?expedienteP=' . $expedienteP . '&usuario=' . $usuario . '&idTipoParticipacion=' . $idTipoParticipacion . '"><img src="../img/investigacion.png" width="22%"></a><br>Comprobante de Domicilio';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table width="100%">
                <tr>
                    <td align="center">
                        <div data-toggle="modal" data-target="#ModalJ">
                            <img src="../img/identificacion.png" width="30%">
                            <br>Subir Identificacion Oficial
                        </div>
                    </td>
                    <td <?php echo $tabla ?> align="center">
                        <div style="<?php echo $activador ?>">
                            <?php
                            echo $cuerpoS;
                            ?>
                        </div>
                    </td>
                    <td width="<?php echo $porcentajec ?>" align="center">
                        <?php echo $cuerpoF ?>
                    </td>

                    <td align="center">


                        <?php echo $cuerpoComp ?>


                    </td>
                    <td align="center">


                        <?php echo $cuerpoActa ?>


                    </td>
                    <td align="center">


                        <?php echo $cuerpoRemp ?>


                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>


<div class="container">

    <div class="row">

        <div class="col-12" align="right">

            <a href="usuario.php" class="btn btn-warning">Regresar</a>

        </div>


    </div>

</div>


<?php

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

          		<td colspan="4">Subir Documento</td>

          	</tr>



          	<tr>



          	<form action="../controladores/subirIdentificacion.php" method="POST" enctype="multipart/form-data">

          		<td>Tipo de Identificación</td>

          		<td>

          		<select name="tipoIdentificacion">

          			<option selected></option>

          			<option value="IFE">IFE</option>

          			<option value="INE">INE</option>

          			<option value="Credencial del IMSS">Credencial del IMSS</option>

          			<option value="Credencial del INAPAM">Credencial del INAPAM</option>

          			<option value="Pasaporte">Pasaporte</option>

          			<option value="Cedula Profesional">Cedula Profesional</option>

	          		</select>

	          	</td>

	          		<td>Vigencia</td>

	          		<td><input type="date" name="vigencia"></td>

	          	</tr>

	          </table>

	          <table>

	          	<tr>

	          		<td>

                Los formatos Aceptados son ".jpg" o ".png"

	          		<input type="file" name="nuevaFoto"  required="" style="font-size: .7em">

	                <input type="submit" value="Enviar" class="btn btn-primary" >

	            	</td>

	          	</tr>



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



		<a class="btn btn-success" href="' . $rutaI . '">Descargar</a>

		<a class="btn btn-success" href="borrarIdentificacion.php?idI=' . $idI . '">Eliminar</a>





        <div class="modal-footer">



          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>

        </div>



      </div>

    </div>

  </div>';
}

echo $cuerpo;


?>


<!-- Termina el modal -->