<?php

$expedienteP = $_REQUEST['expediente'];
$usuario = $_REQUEST['usuario'];
$consultaEx = "SELECT * FROM relacionadosexpediente WHERE usuario='$usuario' AND expediente='$expedienteP' ";
$resultadoEx = mysqli_query($con, $consultaEx);
$registroEx = mysqli_fetch_array($resultadoEx);

$titulo = $registroEx[3];
$idTipoParticipacion = $registroEx[4];

$consultaFor = "SELECT * FROM formulariosfisicos WHERE usuario='$usuario' AND expediente='$expedienteP' ";
$resultadoFor = mysqli_query($con, $consultaFor);
$registroF = mysqli_fetch_array($resultadoFor);

$nacionalidad = $registroF[3];
$originario = $registroF[4];
$calle = $registroF[5];
$exterior = $registroF[6];
$interior = $registroF[7];
$colonia = $registroF[8];
$alcaldia = $registroF[9];
$cp = $registroF[10];
$ciudad = $registroF[11];
$tel1 = $registroF[12];
$tel2 = $registroF[13];
$correo = $registroF[14];
$rfc = $registroF[15];
$curp = $registroF[16];
$estadoCivil = $registroF[17];
$calleA = $registroF[18];
$exteriorA = $registroF[19];
$interiorA = $registroF[20];
$coloniaA = $registroF[21];
$alcaldiaA = $registroF[22];
$cpA = $registroF[23];
$ciudadA = $registroF[24];

$nombreR1 = $registroF[26];
$relacionR1 = $registroF[27];
$telefonoR1 = $registroF[28];
$correoR1 = $registroF[29];
$nombreR2 = $registroF[30];
$relacionR2 = $registroF[31];
$telefonoR2 = $registroF[32];
$correoR2 = $registroF[33];
$nombreR3 = $registroF[34];
$relacionR3 = $registroF[35];
$telefonoR3 = $registroF[36];
$correoR3 = $registroF[37];

$numeroCuenta = $registroF[39];
$numeroClabe = $registroF[40];
$nombreBanco = $registroF[41];
$poderes = $registroF[42];
$nombreRepresentante = $registroF[43];
$numeroRepresentante = $registroF[44];
$fechaRepresentante = $registroF[45];
$notarioNumero = $registroF[46];
$nombreLicenciado = $registroF[47];
$ciudadRepresentante = $registroF[48];
$nombreEmpresa = $registroF[49];
$puestoQueOcupa = $registroF[50];
$nombreJefeInme = $registroF[51];
$calleE = $registroF[52];
$exteriorE = $registroF[53];
$interiorE = $registroF[54];
$coloniaE = $registroF[55];
$alcaldiaE = $registroF[56];
$cpE = $registroF[57];
$ciudadE = $registroF[58];
$telE1 = $registroF[59];
$telE2 = $registroF[60];
$correoE = $registroF[61];
$regimen = $registroF[62];
$nombreC = $registroF[63];
$rfcC = $registroF[64];
$CURPC = $registroF[65];
$nombreEmpresaF = $registroF[66];
$sueldoF = $registroF[67];
$giro = $registroF[68];
$constSociedad = $registroF[69];
$numeroActa = $registroF[70];
$fechaActa = $registroF[71];
$licNumero = $registroF[72];
$numero = $registroF[73];
$volumen = $registroF[74];
$fojas = $registroF[75];
$libro = $registroF[76];
$folioIns = $registroF[77];
$numeroEmpleados = $registroF[78];
$numeroEscritura = $registroF[79];
$nomApoderado = $registroF[80];
$poderNumero = $registroF[81];
$nomNotario = $registroF[82];
$ciudadNotario = $registroF[83];

$parentezco = $registroF[85];
$registroPublico = $registroF[86];

?>
<center>Formularios de <?php echo $titulo ?></center>
<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                    Datos Personales
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">


                <table width="100%">
                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="nacionalidad" class="col-form-label col-form-label-sm">Nacionalidad</label>
                                <input disabled="" class="form-control form-control-sm" type="text" class="form-control"
                                       id="nacionalidad" placeholder="Escribe tu nacionalidad" name="nacionalidad"
                                       value="<?php echo $nacionalidad ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="originario" class="col-form-label col-form-label-sm">Originario de</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="originario" placeholder="Escribe de donde eres originario" name="originario"
                                       value="<?php echo $originario ?>" disabled="">
                            </div>

                        </td>
                    </tr>
                </table>

                <table width="100%">
                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="calle" class="col-form-label col-form-label-sm">Calle</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="calle"
                                       placeholder="Nombre de la calle" name="calle" value="<?php echo $calle ?>"
                                       disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="exterior" class="col-form-label col-form-label-sm">Numero Exterior</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="exterior" placeholder="####" name="exterior" value="<?php echo $exterior ?>"
                                       disabled="">
                            </div>

                        </td>

                        <td colspan="2">

                            <div class="form-group">
                                <label for="interior" class="col-form-label col-form-label-sm">Numero Interior</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="interior" placeholder="####" name="interior" value="<?php echo $interior ?>"
                                       disabled="">
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="colonia" class="col-form-label col-form-label-sm">Colonia</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="colonia" placeholder="Nombre de la Colonia" name="colonia"
                                       value="<?php echo $colonia ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="alcaldia" class="col-form-label col-form-label-sm">Alcaldia</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="alcaldia" placeholder="Nombre de la Alcaldia" name="alcaldia"
                                       value="<?php echo $alcaldia ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="cp" class="col-form-label col-form-label-sm">C.P</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="cp"
                                       placeholder="######" name="cp" value="<?php echo $cp ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="ciudad" class="col-form-label col-form-label-sm">Ciudad</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="ciudad"
                                       placeholder="Nombre de la Ciudad" name="ciudad" value="<?php echo $ciudad ?>"
                                       disabled="">
                            </div>

                        </td>
                    </tr>


                </table>


                <table width="100%">
                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="tel1" class="col-form-label col-form-label-sm">Telefono 1</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="tel1"
                                       placeholder="Telefono de contacto" name="tel1" value="<?php echo $tel1 ?>"
                                       disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="tel2" class="col-form-label col-form-label-sm">Telefono 2</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="tel2"
                                       placeholder="Telefono de contacto secundario" name="tel2"
                                       value="<?php echo $tel2 ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="correo" class="col-form-label col-form-label-sm">Correo Electronico</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="correo"
                                       placeholder="nnn@nnn.com" name="correo" value="<?php echo $correo ?>"
                                       disabled="">
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="rfc" class="col-form-label col-form-label-sm">RFC</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="rfc"
                                       placeholder="NNNN######&&&" name="rfc" value="<?php echo $rfc ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="CURP" class="col-form-label col-form-label-sm">CURP</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="CURP"
                                       placeholder="NNNN######NNNNNN##" name="curp" value="<?php echo $curp ?>"
                                       disabled="">
                            </div>

                        </td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="estadoCivil">Estado Civil</label>
                                </div>
                                <select class="custom-select" id="estadoCivil" name="estadoCivil" disabled="">
                                    <option selected><?php echo $estadoCivil ?> </option>
                                    <option value="Soltero">Soltero(a)</option>
                                    <option value="Casado">Casado(a)</option>
                                    <option value="Divorciado">Divorciado(a)</option>
                                    <option value="Union Libre">Unión Libre</option>
                                </select>
                            </div>
                        </td>

                    </tr>


                </table>
                <div class="col-12" align="right">

                </div>
                </form>

            </div>
        </div>
    </div>


    <!--a href="" class="disabled"></a>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <buttons class="btn btn-link collapsed " data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    Domicilio alterno para notificaciones
                    </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">


                <table width="100%">
                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="calleS" class="col-form-label col-form-label-sm">Calle</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="calleS"
                                    placeholder="Nombre de la calle" name="calleA" value="<?php echo $calleA ?>"
                                    disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="exteriorS" class="col-form-label col-form-label-sm">Numero Exterior</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                    id="exteriorS" placeholder="####" name="exteriorA" value="<?php echo $exteriorA ?>"
                                    disabled="">
                            </div>

                        </td>

                        <td colspan="2">

                            <div class="form-group">
                                <label for="interiorS" class="col-form-label col-form-label-sm">Numero Interior</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                    id="interiorS" placeholder="####" name="interiorA" value="<?php echo $interiorA ?>"
                                    disabled="">
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="coloniaS" class="col-form-label col-form-label-sm">Colonia</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                    id="coloniaS" placeholder="Nombre de la Colonia" name="coloniaA"
                                    value="<?php echo $coloniaA ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="alcaldiaS" class="col-form-label col-form-label-sm">Alcaldia</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                    id="alcaldiaS" placeholder="Nombre de la Alcaldia" name="alcaldiaA"
                                    value="<?php echo $alcaldiaA ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="cpS" class="col-form-label col-form-label-sm">C.P.</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="cpS"
                                    placeholder="######" name="cpA" value="<?php echo $cpA ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="ciudadS" class="col-form-label col-form-label-sm">Ciudad</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                    id="ciudadS" placeholder="Nombre de la Ciudad" name="ciudadA"
                                    value="<?php echo $ciudadA ?>" disabled="">
                            </div>

                        </td>
                    </tr>


                </table>

                <div class="col-12" align="right">

                </div>
                </form>








            </div>
        </div>
    </div-->


    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                    Referencias
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">


                <table width="100%">
                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="nombreR1" class="col-form-label col-form-label-sm">Nombre Completo</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="nombreR1" placeholder="Nombre completo " name="nombreR1"
                                       value="<?php echo $nombreR1 ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="relacionR1" class="col-form-label col-form-label-sm">Relacion</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="relacionR1" placeholder="Relacion" name="relacionR1"
                                       value="<?php echo $nombreR2 ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="telefonoR1" class="col-form-label col-form-label-sm">Telefono</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="telefonoR1" placeholder="##########" name="telefonoR1"
                                       value="<?php echo $telefonoR1 ?>" disabled="">
                            </div>

                        </td>
                        <td>

                            <div class="form-group">
                                <label for="correoR1" class="col-form-label col-form-label-sm">Correo</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="correoR1" placeholder="nnn@nnn.com" name="correoR1"
                                       value="<?php echo $correoR1 ?>" disabled="">
                            </div>

                        </td>
                    </tr>


                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="nombreR2" class="col-form-label col-form-label-sm">Nombre Completo</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="nombreR2" placeholder="Nombre completo " name="nombreR2"
                                       value="<?php echo $nombreR2 ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="relacionR2" class="col-form-label col-form-label-sm">Relacion</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="relacionR2" placeholder="Relacion" name="relacionR2"
                                       value="<?php echo $relacionR2 ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="telefonoR2" class="col-form-label col-form-label-sm">Telefono</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="telefonoR2" placeholder="##########" name="telefonoR2"
                                       value="<?php echo $telefonoR2 ?>" disabled="">
                            </div>

                        </td>
                        <td>

                            <div class="form-group">
                                <label for="correoR2" class="col-form-label col-form-label-sm">Correo</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="correoR2" placeholder="nnn@nnn.com" name="correoR2"
                                       value="<?php echo $correoR2 ?>" disabled="">
                            </div>

                        </td>
                    </tr>


                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="nombreR3" class="col-form-label col-form-label-sm">Nombre Completo</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="nombreR3" placeholder="Nombre completo " name="nombreR3"
                                       value="<?php echo $nombreR3 ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="relacionR3" class="col-form-label col-form-label-sm">Relacion</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="relacionR3" placeholder="Relacion" name="relacionR3"
                                       value="<?php echo $relacionR3 ?>" disabled="">
                            </div>

                        </td>

                        <td>

                            <div class="form-group">
                                <label for="telefonoR3" class="col-form-label col-form-label-sm">Telefono</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="telefonoR3" placeholder="##########" name="telefonoR3"
                                       value="<?php echo $telefonoR3 ?>" disabled="">
                            </div>

                        </td>
                        <td>

                            <div class="form-group">
                                <label for="correoR3" class="col-form-label col-form-label-sm">Correo</label>
                                <input class="form-control form-control-sm" type="text" class="form-control"
                                       id="correoR3" placeholder="nnn@nnn.com" name="correoR3"
                                       value="<?php echo $correoR3 ?>" disabled="">
                            </div>

                        </td>
                    </tr>


                </table>


                <div class="col-12" align="right">

                </div>


            </div>
        </div>
    </div>


    <?php

    switch ($idTipoParticipacion) {
        case '1':
            //Arrendatario Fisico
            $tcomplemento = 'Datos Laborables';
            $complemento = '<table width="100%">
		<tr>
			<td>
		<div class="form-group">
    	<label for="nombreEmpresa" class="col-form-label col-form-label-sm ">Nombre de la Empresa</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresa" placeholder="Escribe el nombre de la empresa " name="nombreEmpresa" value="' . $nombreEmpresa . '" disabled="">
  		</div>
			</td>
			<td>
		<div class="form-group">
    	<label for="puestoQueOcupa" class="col-form-label col-form-label-sm">Puesto que ocupa</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="puestoQueOcupa" placeholder="Jefe, Auxiliar, Encargado. " name="puestoQueOcupa" value="' . $puestoQueOcupa . '" disabled="">
  		</div>
			</td>
			<td>
		<div class="form-group">
    	<label for="nombreJefeInme" class="col-form-label col-form-label-sm">Nombre de su jefe inmediato</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="nombreJefeInme" placeholder="Escribe el nombre" name="nombreJefeInme" value="' . $nombreJefeInme . '" disabled="">
  		</div>
			</td>

		</tr>
		<td>

		<div class="form-group">
    	<label for="calleE" class="col-form-label col-form-label-sm">Calle</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="calleE" placeholder="Nombre de la calle" name="calleE" value="' . $calleE . '" disabled="">
  		</div>

  		</td>

  		<td >

  		<div class="form-group">
    	<label for="exteriorE" class="col-form-label col-form-label-sm">Numero Exterior</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="exteriorE" placeholder="####" name="exteriorE" value="' . $exteriorE . '" disabled="">
  		</div>

  		</td>

  		<td colspan="2">

  		<div class="form-group">
    	<label for="interiorE" class="col-form-label col-form-label-sm">Numero Interior</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="interiorE" placeholder="####" name="interiorE" value="' . $interiorE . '" disabled="">
  		</div>

  		</td>
		</tr>

		<tr>
		<td>

  		<div class="form-group">
    	<label for="coloniaE" class="col-form-label col-form-label-sm">Colonia</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="coloniaE" placeholder="Nombre de la Colonia" name="coloniaE" value="' . $coloniaE . '" disabled="">
  		</div>

  		</td>

  		<td>

  		<div class="form-group">
    	<label for="alcaldiaE" class="col-form-label col-form-label-sm">Alcaldia</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="alcaldiaE" placeholder="Nombre de la Alcaldia" name="alcaldiaE" value="' . $alcaldiaE . '" disabled="">
  		</div>

  		</td>

  		<td>

  		<div class="form-group">
    	<label for="cpE" class="col-form-label col-form-label-sm">C.P.</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="cpE" placeholder="######" name="cpE" value="' . $cpE . '" disabled="">
  		</div>

  		</td>

  		<td>

  		<div class="form-group">
    	<label for="ciudadE" class="col-form-label col-form-label-sm">Ciudad</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="ciudadE" placeholder="Nombre de la Ciudad" name="ciudadE" value="' . $ciudadE . '" disabled="">
  		</div>

  		</td>
		</tr>


		<tr>
		<td>

		<div class="form-group">
    	<label for="telE1" class="col-form-label col-form-label-sm">Telefono 1</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="telE1" placeholder="Telefono de contacto" name="telE1" value="' . $telE1 . '"  disabled="">
  		</div>

  		</td>

  		<td >

  		<div class="form-group">
    	<label for="telE2" class="col-form-label col-form-label-sm">Telefono 2</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="telE2" placeholder="Telefono de contacto secundario" name="telE2" value="' . $telE2 . '" disabled="">
  		</div>

  		</td>

  		<td>

  		<div class="form-group">
    	<label for="correoE" class="col-form-label col-form-label-sm">Correo Electronico</label>
    	<input class="form-control form-control-sm" type="text" class="form-control" id="correoE" placeholder="nnn@nnn.com" name="correoE" value="' . $correoE . '" disabled="">
  		</div>

  		</td>
		</tr>
	</table>';
            break;
        case '2':
            //Arrendatario Moral
            $tcomplemento = 'Datos arrendatario Moral';
            $complemento = '<tr>
        <td>
        <div class="form-group">
                    <label for="nombreEmpresa" class="col-form-label col-form-label-sm ">Nombre de la Empresa</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresa"
                        placeholder="Escribe el nombre de la empresa " name="nombreEmpresa" value="' . $nombreEmpresa . '" disabled="">
                </div>
        </td>
        <td>
            <div class="form-group">
                <label for="giro" class="col-form-label col-form-label-sm">Giro</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="giro"
                    placeholder="Administrativo, Industrial. " name="giro" value="' . $giro . '" disabled="">
            </div>
        </td>

        <td>

        <div class="form-group">
            <label for="rfc" class="col-form-label col-form-label-sm">RFC</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="rfc"
                placeholder="NNNN######&&&" name="rfc" value="' . $rfc . '" disabled="">
        </div>

    </td>


    </tr>
    </table>

    <table width="100%">
        <tr>
            <td>
                <div class="form-group">
                    <label for="constSociedad" class="col-form-label col-form-label-sm">Constitucion
                        de
                        la sociedad</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="constSociedad"
                        placeholder="Constitucion de la sociedad" name="constSociedad" value="' . $constSociedad . '" disabled="">
                </div>
            </td>

            <td>

                <div class="form-group">
                    <label for="numeroActa" class="col-form-label col-form-label-sm">Numero de
                        acta constitutiva</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="numeroActa"
                        placeholder="#######" name="numeroActa" value="' . $numeroActa . '" disabled="">
                </div>

            </td>

            <td>
                <div class="form-group">
                    <label for="fechaActa" class="col-form-label col-form-label-sm">De
                        fecha</label>
                    <input class="form-control form-control-sm" type="date" class="form-control" id="fechaActa"
                        name="fechaActa" value="' . $fechaActa . '" disabled="">
                </div>

            </td>

            <td colspan="2">

                <div class="form-group">
                    <label for="licNumero" class="col-form-label col-form-label-sm">Emitida por el
                        Licenciado
                        numero</label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="licNumero"
                        name="licNumero" placeholder="#######" value="' . $licNumero . '" disabled="">
                </div>
            </td>

        </tr>

        <tr>
            <td>

                <div class="form-group">
                    <label for="nombreLicenciado" class="col-form-label col-form-label-sm">Lic</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreLicenciado"
                        placeholder="Nombre del licenciado" name="nombreLicenciado" value="' . $nombreLicenciado . '" disabled="">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="ciudadRepresentante" class="col-form-label col-form-label-sm">De la
                        ciudad </label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="ciudadRepresentante"
                        placeholder="ciudad" name="ciudadRepresentante" value="' . $ciudadRepresentante . '" disabled="">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="numero" class="col-form-label col-form-label-sm">Num</label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="numero" name="numero"
                        placeholder="#######" value="' . $numero . '" disabled="">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="volumen" class="col-form-label col-form-label-sm">Volumen</label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="volumen"
                        name="volumen" placeholder="#######" value="' . $volumen . '" disabled="">
                </div>


            </td>

            <td>

                <div class="form-group">
                    <label for="fojas" class="col-form-label col-form-label-sm">Fojas</label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="fojas" name="fojas"
                        placeholder="#######" value="' . $fojas . '" disabled="">
                </div>

            </td>
        </tr>


    </table>



    <table width="100%">
        <tr>
            <td>

                <div class="form-group">
                    <label for="libro" class="col-form-label col-form-label-sm">Libro</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="libro"
                        placeholder="Libro" name="libro" value="' . $libro . '" disabled="">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="folioIns" class="col-form-label col-form-label-sm">Folio de
                        inscripcion en el registro publico de comercio:
                    </label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="folioIns"
                        name="folioIns" placeholder="#######" value="' . $folioIns . '" disabled="">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="numeroEmpleados" class="col-form-label col-form-label-sm">Numero de
                        empleados en la empresa:
                    </label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="numeroEmpleados"
                        name="numeroEmpleados" placeholder="#######" value="' . $numeroEmpleados . '" disabled="">
                </div>

            </td>
        </tr>

        <tr>
            <td>

                <div class="form-group">
                    <label for="nombreRepresentante" class="col-form-label col-form-label-sm">Nombre
                        del representante legal </label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreRepresentante"
                        placeholder="Nombre" name="nombreRepresentante" value="' . $nombreRepresentante . '" disabled="">
                </div>

            </td>

        </tr>


    </table>';
            break;

        case '3':
            //Arrendador Fisico
            $tcomplemento = 'Datos de Bancarios y Representante Legal';
            $complemento = '<table width="100%">
                <tr>
                    <td>

              <div class="form-group">
            <label for="numeroCuenta" class="col-form-label col-form-label-sm">Numero de cuenta bancaria</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="numeroCuenta" placeholder="####################" name="numeroCuenta" value="' . $numeroCuenta . '" disabled="">
              </div>

              </td>
              <td>

              <div class="form-group">
            <label for="numeroClabe" class="col-form-label col-form-label-sm">Numero de cuenta clabe</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="numeroClabe" placeholder="##################" name="numeroClabe" value="' . $numeroClabe . '" disabled="">
              </div>

              </td>
              <td>
            <div class="form-group">
            <label for="nombreBanco" class="col-form-label col-form-label-sm">Nombre del Banco</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="nombreBanco" placeholder="Nombre del banco " name="nombreBanco" value="' . $nombreBanco . '" disabled="">
              </div>
            </td>
            <td>


                </tr>

            </table>
            <hr>
            <h5>Datos del representante legal</h5>
            <table width="100%">
                <tr>
                    <td>
                    <div class="form-group">
                    <label for="nombreRepresentante" class="col-form-label col-form-label-sm">Nombre</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreRepresentante" placeholder="Nombre del representante " name="nombreRepresentante" value="' . $nombreRepresentante . '" disabled="">
                      </div>
                    </td>

            <div class="form-group">
            <label for="poderes" class="col-form-label col-form-label-sm">Poderes que ostenta</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="poderes" placeholder="Poderes " name="poderes" value="' . $poderes . '" disabled="">
              </div>
            </td>
            <td>

              <div class="form-group">
            <label for="numeroEscritura" class="col-form-label col-form-label-sm">Segun escritura numero</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="numeroEscritura" placeholder="#######" name="numeroEscritura" value="' . $numeroEscritura . '" disabled="">
              </div>

              </td>

              <td>

              <div class="form-group">
            <label for="fechaRepresentante" class="col-form-label col-form-label-sm">De fecha</label>
            <input class="form-control form-control-sm" type="date" class="form-control" id="fechaRepresentante"  name="fechaRepresentante" value="' . $fechaRepresentante . '" disabled="">
              </div>

              </td>

              <td>

              <div class="form-group">
            <label for="notarioNumero" class="col-form-label col-form-label-sm">Expedida por el notario numero</label>
            <input class="form-control form-control-sm" type="number" class="form-control" id="notarioNumero"  name="notarioNumero" placeholder="#######" value="' . $notarioNumero . '" disabled="">
              </div>

              </td>
                </tr>
                <tr>
                    <td colspan="2">

              <div class="form-group">
            <label for="nombreLicenciado" class="col-form-label col-form-label-sm">Nombre del Licenciado</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="nombreLicenciado" placeholder="Nombre del licenciado" name="nombreLicenciado" value="' . $nombreLicenciado . '" disabled="">
              </div>

              </td>
              <td colspan="2">

              <div class="form-group">
            <label for="ciudadRepresentante" class="col-form-label col-form-label-sm">De la ciudad </label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="ciudadRepresentante" placeholder="ciudad" name="ciudadRepresentante" value="' . $ciudadRepresentante . '" disabled="">
              </div>

              </td>
                </tr>
            </table>';
            break;

        case '4':
            //Arrendador Moral
            $tcomplemento = 'Datos arrendador Moral';
            $complemento = '
        <tr>
        <td>
        <div class="form-group">
                    <label for="nombreEmpresa" class="col-form-label col-form-label-sm ">Nombre de la Empresa</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresa"
                        placeholder="Escribe el nombre de la empresa " name="nombreEmpresa" value="' . $nombreEmpresa . '" disabled="">
                </div>
        </td>
        <td>
            <div class="form-group">
                <label for="giro" class="col-form-label col-form-label-sm">Giro</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="giro" placeholder="Administrativo, Industrial. " name="giro" value="' . $giro . '" disabled="">
            </div>
        </td>

    </tr>
</table>

<table width="100%">
    <tr>
        <td>
            <div class="form-group">
                <label for="constSociedad" class="col-form-label col-form-label-sm">Constitucion
                    de
                    la sociedad</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="constSociedad" placeholder="Constitucion de la sociedad"
                    name="constSociedad" value="' . $constSociedad . '" disabled="">
            </div>
        </td>

        <td>

            <div class="form-group">
                <label for="numeroEscritura" class="col-form-label col-form-label-sm">Numero de escritura</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="numeroEscritura" placeholder="#######" name="numeroEscritura" value="' . $numeroEscritura . '" disabled="">
            </div>

        </td>

        <td>
            <div class="form-group">
                <label for="fechaRepresentante" class="col-form-label col-form-label-sm">De
                    fecha</label>
                <input class="form-control form-control-sm" type="date" class="form-control"
                    id="fechaRepresentante" name="fechaRepresentante" value="' . $fechaRepresentante . '" disabled="">
            </div>

        </td>

        <td colspan="2">

            <div class="form-group">
                <label for="licNumero" class="col-form-label col-form-label-sm">Emitida por el
                    Licenciado
                    numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="licNumero" name="licNumero" placeholder="#######" value="' . $licNumero . '" disabled="">
            </div>
        </td>

    </tr>

    <tr>
        <td>

            <div class="form-group">
                <label for="nombreLicenciado"
                    class="col-form-label col-form-label-sm">Lic</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="nombreLicenciado" placeholder="Nombre del licenciado"
                    name="nombreLicenciado" value="' . $nombreLicenciado . '" disabled="">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="ciudadRepresentante" class="col-form-label col-form-label-sm">De la
                    ciudad </label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="ciudadRepresentante" placeholder="ciudad" name="ciudadRepresentante" value="' . $ciudadRepresentante . '" disabled="">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="folioIns" class="col-form-label col-form-label-sm">Con registro
                    publico de comercio numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="folioIns" name="folioIns" placeholder="#######" value="' . $folioIns . '" disabled="">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="nomApoderado" class="col-form-label col-form-label-sm">Nombre del
                    apoderado</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="nomApoderado" name="nomApoderado" placeholder="Nombre del apoderado" value="' . $nomApoderado . '" disabled="">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="poderes" class="col-form-label col-form-label-sm">Poderes con que se
                    ostenta</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="poderes" name="poderes" placeholder="Poderes" value="' . $poderes . '" disabled="">
            </div>

        </td>
    </tr>


</table>



<table width="100%">
    <tr>
        <td>

            <div class="form-group">
                <label for="poderNumero" class="col-form-label col-form-label-sm">Segun poder o
                    escritura numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="poderNumero" placeholder="#######"
                    name="poderNumero" value="' . $poderNumero . '" disabled="">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="notarioNumero" class="col-form-label col-form-label-sm">Emitida por
                    el notario numero
                </label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="notarioNumero" name="notarioNumero" placeholder="#######" value="' . $notarioNumero . '" disabled="">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="nomNotario" class="col-form-label col-form-label-sm">De nombre
                </label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="nomNotario" name="nomNotario" placeholder="Nombre del Licenciado" value="' . $nomNotario . '" disabled="">
            </div>

        </td>
    </tr>

    <tr>
        <td>

            <div class="form-group">
                <label for="ciudadNotario" class="col-form-label col-form-label-sm">De la
                    ciudad</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="ciudadNotario" placeholder="De la ciudad" name="ciudadNotario" value="' . $ciudadNotario . '" disabled="">
            </div>

        </td>

    </tr>


</table>';
            break;

        case '5':
            //Fiador Fisico
            $tcomplemento = 'Datos de conyuge y Datos Laborables';
            $complemento = '<table width="100%">
                <tr>
                    <td>

                  <div class="form-group">
                <label for="regimen" class="col-form-label col-form-label-sm">Bajo que regimen se encuentran</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="regimen" placeholder="Bienes Mancomunados o separados" name="regimen" value="' . $regimen . '" disabled="">
                  </div>

                      </td>

                  <td>

                  <div class="form-group">
                <label for="nombreC" class="col-form-label col-form-label-sm">Nombre del conyuge</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="nombreC" placeholder="Nombre del conyuge" name="nombreC" value="' . $nombreC . '" disabled="">
                  </div>

                  </td>

                  <td>

              <div class="form-group">
            <label for="rfcC" class="col-form-label col-form-label-sm">RFC</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="rfcC" placeholder="NNNN######&&&" name="rfcC" value="' . $rfcC . '" disabled="">
              </div>

              </td>

              <td>

              <div class="form-group">
            <label for="CURP" class="col-form-label col-form-label-sm">CURP</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="CURP" placeholder="NNNN######NNNNNN##" name="CURP" value="' . $CURPC . '" disabled="">
              </div>

              </td>
                </tr>

            </table>
            <hr>
            <h5>Datos laborables</h5>
            <table width="100%">
                <tr>
                    <td>
            <div class="form-group">
            <label for="nombreEmpresaF" class="col-form-label col-form-label-sm">Nombre de la Empresa</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresaF" placeholder="Escribe el nombre de la empresa " name="nombreEmpresaF" value="' . $nombreEmpresaF . '" disabled="">
              </div>
                </td>
                <td>
            <div class="form-group">
            <label for="sueldoF" class="col-form-label col-form-label-sm">Sueldo Mensual</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="sueldoF" placeholder="####### " name="sueldoF" value="' . $sueldoF . '" disabled="">
              </div>
                </td>

                <td>
                <div class="form-group">
                    <label for="parentezco" class="col-form-label col-form-label-sm ">Parentezco</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="parentezco"
                        placeholder="Parentezco" name="parentezco" value="' . $parentezco . '" disabled="">
                </div>
            </td>

                </tr>
            </table>';
            break;

        case '6':
            //Fiador Moral
            $tcomplemento = 'Datos Fiador Moral';
            $complemento = '
    <tr>
        <td>
            <div class="form-group">
                    <tr>
                    <td>
                    <div class="form-group">
                                <label for="nombreEmpresa" class="col-form-label col-form-label-sm ">Nombre de la Empresa</label>
                                <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresa"
                                    placeholder="Escribe el nombre de la empresa " name="nombreEmpresa" value="' . $nombreEmpresa . '" disabled="">
                            </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="giro" class="col-form-label col-form-label-sm">Giro</label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="giro" placeholder="Administrativo, Industrial. " name="giro" value="' . $giro . '" disabled="">
                        </div>
                    </td>
            
                </tr>
            </table>
            
            <table width="100%">
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="constSociedad" class="col-form-label col-form-label-sm">Constitucion
                                de
                                la sociedad</label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="constSociedad" placeholder="Constitucion de la sociedad"
                                name="constSociedad" value="' . $constSociedad . '" disabled="">
                        </div>
                    </td>
            
                    <td>
            
                        <div class="form-group">
                            <label for="numeroEscritura" class="col-form-label col-form-label-sm">Numero de escritura</label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="numeroEscritura" placeholder="#######" name="numeroEscritura" value="' . $numeroEscritura . '" disabled="">
                        </div>
            
                    </td>
            
                    <td>
                        <div class="form-group">
                            <label for="fechaActa" class="col-form-label col-form-label-sm">De
                                fecha</label>
                            <input class="form-control form-control-sm" type="date" class="form-control"
                                id="fechaActa" name="fechaRepresentante" value="' . $fechaRepresentante . '" disabled="">
                        </div>
            
                    </td>
            
                    <td colspan="2">
            
                        <div class="form-group">
                            <label for="licNumero" class="col-form-label col-form-label-sm">Emitida por el
                                Licenciado
                                numero</label>
                            <input class="form-control form-control-sm" type="number" class="form-control"
                                id="licNumero" name="licNumero" placeholder="#######" value="' . $licNumero . '" disabled="">
                        </div>
                    </td>
            
                </tr>
            
                <tr>
                    <td>
            
                        <div class="form-group">
                            <label for="nombreLicenciado"
                                class="col-form-label col-form-label-sm">Lic</label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="nombreLicenciado" placeholder="Nombre del licenciado"
                                name="nombreLicenciado" value="' . $nombreLicenciado . '" disabled="">
                        </div>
            
                    </td>
            
                    <td>
            
                        <div class="form-group">
                            <label for="ciudadRepresentante" class="col-form-label col-form-label-sm">De la
                                ciudad </label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="ciudadRepresentante" placeholder="ciudad" name="ciudadRepresentante" value="' . $ciudadRepresentante . '" disabled="">
                        </div>
            
                    </td>
            
                    <td>
            
                        <div class="form-group">
                            <label for="registroPublico" class="col-form-label col-form-label-sm">Con registro
                                publico de comercio numero</label>
                            <input class="form-control form-control-sm" type="number" class="form-control" id="registroPublico" name="registroPublico" placeholder="#######" value="' . $registroPublico . '" disabled="">
                        </div>
            
                    </td>
            
                    <td>
            
                        <div class="form-group">
                            <label for="nomApoderado" class="col-form-label col-form-label-sm">Nombre del
                                apoderado</label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="nomApoderado" name="nomApoderado" placeholder="Nombre del apoderado" value="' . $nomApoderado . '" disabled="">
                        </div>
            
                    </td>
            
                    <td>
            
                        <div class="form-group">
                            <label for="poderes" class="col-form-label col-form-label-sm">Poderes con que se
                                ostenta</label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="poderes" name="poderes" placeholder="Poderes" value="' . $poderes . '" disabled="">
                        </div>
            
                    </td>
                </tr>
            
            
            </table>
            
            
            
            <table width="100%">
                <tr>
                    <td>
            
                        <div class="form-group">
                            <label for="poderNumero" class="col-form-label col-form-label-sm">Segun poder o
                                escritura numero</label>
                            <input class="form-control form-control-sm" type="number" class="form-control"
                                id="poderNumero" placeholder="#######"
                                name="poderNumero" value="' . $poderNumero . '" disabled="">
                        </div>
            
                    </td>
            
                    <td>
            
                        <div class="form-group">
                            <label for="notarioNumero" class="col-form-label col-form-label-sm">Emitida por
                                el notario numero
                            </label>
                            <input class="form-control form-control-sm" type="number" class="form-control"
                                id="notarioNumero" name="notarioNumero" placeholder="#######" value="' . $notarioNumero . '" disabled="">
                        </div>
            
                    </td>
            
                    <td>
            
                        <div class="form-group">
                            <label for="nomNotario" class="col-form-label col-form-label-sm">De nombre
                            </label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="nomNotario" name="nomNotario" placeholder="Nombre del Licenciado" value="' . $nomNotario . '" disabled="">
                        </div>
            
                    </td>
                </tr>
            
                <tr>
                    <td>
            
                        <div class="form-group">
                            <label for="ciudadNotario" class="col-form-label col-form-label-sm">De la
                                ciudad</label>
                            <input class="form-control form-control-sm" type="text" class="form-control"
                                id="ciudadNotario" placeholder="De la ciudad" name="ciudadNotario" value="' . $ciudadNotario . '" disabled="">
                        </div>
                    </td>
                    <td>
                    <td>
                <div class="form-group">
                    <label for="parentezco" class="col-form-label col-form-label-sm ">Parentezco</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="parentezco"
                        placeholder="Parentezco" name="parentezco" value="' . $parentezco . '" disabled="">
                </div>
                    </td>
                </tr>

            
            </table>';
            break;

        default:
            # code...
            break;
    }

    ?>


    <div class="card">
        <div class="card-header" id="headingFour">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed " data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="false" aria-controls="collapseFour">
                    <?php echo $tcomplemento ?>
                </button>
            </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <form action="actualizarFormulario2.php" method="POST">


                    <?php echo $complemento ?>


            </div>
        </div>
    </div>


</div>