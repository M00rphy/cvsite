<?php

$expedienteP = $_REQUEST['expedienteP'];
$usuario = $_REQUEST['usuario'];
$consultaEx = "SELECT * FROM relacionadosexpediente WHERE usuario='$usuario' AND expediente='$expedienteP' ";
$resultadoEx = mysqli_query($con, $consultaEx);
$registroEx = mysqli_fetch_array($resultadoEx);

$titulo = $registroEx[3];
$idTipoParticipacion = $registroEx[4];
$contador = 0;

?>
<center>Formularios de <?php echo $titulo ?></center>
<div id="accordion">
    <div class="card">
        <?php //Formulario 1 Datos personales 
        ?>
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
                <form action="guardarFormularioFisico.php" method="POST">
                    <?php $contador = 1 ?>
                    <input style="display: none;" type="text" name="usuario" value="<?php echo $usuario ?>">
                    <input style="display: none;" type="text" name="expediente" value="<?php echo $expedienteP ?>">
                    <table width="100%">
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="nacionalidad"
                                           class="col-form-label col-form-label-sm">Nacionalidad</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="nacionalidad" placeholder="Escribe tu nacionalidad" name="nacionalidad">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="originario" class="col-form-label col-form-label-sm">Originario
                                        de</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="originario" placeholder="Escribe de donde eres originario"
                                           name="originario">
                                </div>

                            </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="calle" class="col-form-label col-form-label-sm">Calle</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="calle" placeholder="Nombre de la calle" name="calle">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="exterior" class="col-form-label col-form-label-sm">Numero
                                        Exterior</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="exterior" placeholder="####" name="exterior">
                                </div>

                            </td>

                            <td colspan="2">

                                <div class="form-group">
                                    <label for="interior" class="col-form-label col-form-label-sm">Numero
                                        Interior</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="interior" placeholder="####" name="interior">
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="colonia" class="col-form-label col-form-label-sm">Colonia</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="colonia" placeholder="Nombre de la Colonia" name="colonia">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="alcaldia" class="col-form-label col-form-label-sm">Alcaldia</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="alcaldia" placeholder="Nombre de la Alcaldia" name="alcaldia">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="cp" class="col-form-label col-form-label-sm">C.P</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control" id="cp"
                                           placeholder="######" name="cp">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="ciudad" class="col-form-label col-form-label-sm">Ciudad</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="ciudad" placeholder="Nombre de la Ciudad" name="ciudad">
                                </div>

                            </td>
                        </tr>


                    </table>
                    <table width="100%">
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="tel1" class="col-form-label col-form-label-sm">Telefono 1</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="tel1" placeholder="Telefono de contacto" name="tel1">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="tel2" class="col-form-label col-form-label-sm">Telefono 2</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="tel2" placeholder="Telefono de contacto secundario" name="tel2">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="correo" class="col-form-label col-form-label-sm">Correo
                                        Electronico</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="correo" placeholder="nnn@nnn.com" name="correo">
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="rfc" class="col-form-label col-form-label-sm">RFC</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="rfc" placeholder="NNNN######&&&" name="rfc">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="CURP" class="col-form-label col-form-label-sm">CURP</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="CURP" placeholder="NNNN######NNNNNN##" name="curp">
                                </div>

                            </td>
                            <td>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="estadoCivil">Estado Civil</label>
                                    </div>
                                    <select class="custom-select" id="estadoCivil" name="estadoCivil">
                                        <option selected>...</option>
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
                        <input type="submit" value="Guardar" class="btn btn-success">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    $consultaGuardado = "SELECT * FROM formulariosfisicos WHERE usuario='$usuario' AND expediente = '$expedienteP' ";
    $resultadoGuardado = mysqli_query($con, $consultaGuardado);
    $cantidadG = mysqli_num_rows($resultadoGuardado);

    if ($cantidadG >= 1) {
        $guardado = ' ';
        $Actualizar = 'actualizarFormularios.php';
    } else {
        $guardado = 'disabled';
        $Actualizar = 'guardarFormularioFisico.php';
    }

    ?>

    <!--a href="" class="disabled"></a>
    <div class="card">
        <?php //Formulario 2 Domicilio alterno 
    ?>
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <buttons class="btn btn-link collapsed <?php echo $guardado ?>" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Domicilio alterno para notificaciones
                    </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <?php $contador = 2 ?>
                <form action="<?php echo $Actualizar ?>?contador=<?php echo $contador ?>" method="POST">

                    <input style="display:none;" type="text" name="contador" value="<?php echo $contador ?>">

                    <input style="display: none;" type="text" name="usuario" value="<?php echo $usuario ?>">
                    <input style="display: none;" type="text" name="expediente" value="<?php echo $expedienteP ?>">
                    <table width="100%">
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="calleS" class="col-form-label col-form-label-sm">Calle</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="calleS" placeholder="Nombre de la calle" name="calleA">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="exteriorS" class="col-form-label col-form-label-sm">Numero
                                        Exterior</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="exteriorS" placeholder="####" name="exteriorA">
                                </div>

                            </td>

                            <td colspan="2">

                                <div class="form-group">
                                    <label for="interiorS" class="col-form-label col-form-label-sm">Numero
                                        Interior</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="interiorS" placeholder="####" name="interiorA">
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="coloniaS" class="col-form-label col-form-label-sm">Colonia</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="coloniaS" placeholder="Nombre de la Colonia" name="coloniaA">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="alcaldiaS" class="col-form-label col-form-label-sm">Alcaldia</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="alcaldiaS" placeholder="Nombre de la Alcaldia" name="alcaldiaA">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="cpS" class="col-form-label col-form-label-sm">C.P.</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="cpS" placeholder="######" name="cpA">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="ciudadS" class="col-form-label col-form-label-sm">Ciudad</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                        id="ciudadS" placeholder="Nombre de la Ciudad" name="ciudadA">
                                </div>

                            </td>
                        </tr>


                    </table>

                    <div class="col-12" align="right">
                        <input type="submit" value="Guardar" class="btn btn-success">
                    </div>
                </form>








            </div>
        </div>
    </div-->


    <a href="" class="disabled"></a>
    <div class="card">
        <?php //Formulario 3 Referencias 
        ?>
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed <?php echo $guardado ?>" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Referencias
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <?php $contador = 3 ?>
                <form action="<?php echo $Actualizar ?>?contador=<?php echo $contador ?>" method="POST">
                    <input style="display: none;" type="text" name="usuario" value="<?php echo $usuario ?>">
                    <input style="display: none;" type="text" name="expediente" value="<?php echo $expedienteP ?>">
                    <table width="100%">
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="nombreR1" class="col-form-label col-form-label-sm">Nombre
                                        Completo</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="nombreR1" placeholder="Nombre completo " name="nombreR1">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="relacionR1" class="col-form-label col-form-label-sm">Relacion</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="relacionR1" placeholder="Relacion" name="relacionR1">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="telefonoR1" class="col-form-label col-form-label-sm">Telefono</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="telefonoR1" placeholder="##########" name="telefonoR1">
                                </div>

                            </td>
                            <td>

                                <div class="form-group">
                                    <label for="correoR1" class="col-form-label col-form-label-sm">Correo</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="correoR1" placeholder="nnn@nnn.com" name="correoR1">
                                </div>

                            </td>
                        </tr>


                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="nombreR2" class="col-form-label col-form-label-sm">Nombre
                                        Completo</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="nombreR2" placeholder="Nombre completo " name="nombreR2">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="relacionR2" class="col-form-label col-form-label-sm">Relacion</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="relacionR2" placeholder="Relacion" name="relacionR2">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="telefonoR2" class="col-form-label col-form-label-sm">Telefono</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="telefonoR2" placeholder="##########" name="telefonoR2">
                                </div>

                            </td>
                            <td>

                                <div class="form-group">
                                    <label for="correoR2" class="col-form-label col-form-label-sm">Correo</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="correoR2" placeholder="nnn@nnn.com" name="correoR2">
                                </div>

                            </td>
                        </tr>


                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="nombreR3" class="col-form-label col-form-label-sm">Nombre
                                        Completo</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="nombreR3" placeholder="Nombre completo " name="nombreR3">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="relacionR3" class="col-form-label col-form-label-sm">Relacion</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="relacionR3" placeholder="Relacion" name="relacionR3">
                                </div>

                            </td>

                            <td>

                                <div class="form-group">
                                    <label for="telefonoR3" class="col-form-label col-form-label-sm">Telefono</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="telefonoR3" placeholder="##########" name="telefonoR3">
                                </div>

                            </td>
                            <td>

                                <div class="form-group">
                                    <label for="correoR3" class="col-form-label col-form-label-sm">Correo</label>
                                    <input class="form-control form-control-sm" type="text" class="form-control"
                                           id="correoR3" placeholder="nnn@nnn.com" name="correoR3">
                                </div>

                            </td>
                        </tr>


                    </table>


                    <div class="col-12" align="right">
                        <input type="submit" value="Guardar" class="btn btn-success">
                    </div>
                </form>


            </div>
        </div>
    </div>


    <?php

    switch ($idTipoParticipacion) {
        case '1':
            //Arrendador Fisico
            $tcomplemento = 'Datos de Bancarios y Representante Legal';
            $complemento = '<table width="100%">
    <tr>
        <td>

            <div class="form-group">
                <label for="numeroCuenta" class="col-form-label col-form-label-sm">Numero de cuenta bancaria</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="numeroCuenta"
                    placeholder="####################" name="numeroCuenta">
            </div>

        </td>
        <td>

            <div class="form-group">
                <label for="numeroClabe" class="col-form-label col-form-label-sm">Numero de cuenta clabe</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="numeroClabe"
                    placeholder="##################" name="numeroClabe">
            </div>

        </td>
        <td>
            <div class="form-group">
                <label for="nombreBanco" class="col-form-label col-form-label-sm">Nombre del Banco</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="nombreBanco"
                    placeholder="Nombre del banco " name="nombreBanco">
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
                <input class="form-control form-control-sm" type="text" class="form-control" id="nombreRepresentante"
                    placeholder="Nombre del representante " name="nombreRepresentante">
            </div>
        </td>

        <td>
            <div class="form-group">
                <label for="poderes" class="col-form-label col-form-label-sm">Poderes que ostenta</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="poderes"
                    placeholder="Poderes " name="poderes">
            </div>
        </td>
        <td>

            <div class="form-group">
                <label for="numeroEscritura" class="col-form-label col-form-label-sm">Segun escritura numero</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="numeroEscritura"
                    placeholder="#######" name="numeroEscritura">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="fechaActa" class="col-form-label col-form-label-sm">De fecha</label>
                <input class="form-control form-control-sm" type="date" class="form-control" id="fechaActa"
                    name="fechaActa">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="notarioNumero" class="col-form-label col-form-label-sm">Expedida por el notario
                    numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control" id="notarioNumero"
                    name="notarioNumero" placeholder="#######">
            </div>

        </td>
    </tr>
    <tr>
        <td colspan="2">

            <div class="form-group">
                <label for="nombreLicenciado" class="col-form-label col-form-label-sm">Nombre del Licenciado</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="nombreLicenciado"
                    placeholder="Nombre del licenciado" name="nombreLicenciado">
            </div>

        </td>
        <td colspan="2">

            <div class="form-group">
                <label for="ciudadRepresentante" class="col-form-label col-form-label-sm">De la ciudad </label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="ciudadRepresentante"
                    placeholder="ciudad" name="ciudadRepresentante">
            </div>

        </td>
    </tr>
</table>
<div class="col-12" align="right">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>';
            break;

        case '2':

            //Arrendador Moral

            $tcomplemento = 'Datos arrendador Moral';
            $complemento = '
        <tr>
        <td>
        <div class="form-group">
                    <label for="nombreEmpresa" class="col-form-label col-form-label-sm ">Nombre de la Empresa</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresa"
                        placeholder="Escribe el nombre de la empresa " name="nombreEmpresa">
                </div>
        </td>
        <td>
            <div class="form-group">
                <label for="giro" class="col-form-label col-form-label-sm">Giro</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="giro" placeholder="Administrativo, Industrial. " name="giro">
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
                    name="constSociedad">
            </div>
        </td>

        <td>

            <div class="form-group">
                <label for="numeroEscritura" class="col-form-label col-form-label-sm">Numero de escritura</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="numeroEscritura" placeholder="#######" name="numeroEscritura">
            </div>

        </td>

        <td>
            <div class="form-group">
                <label for="fechaActa" class="col-form-label col-form-label-sm">De
                    fecha</label>
                <input class="form-control form-control-sm" type="date" class="form-control"
                    id="fechaActa" name="fechaActa">
            </div>

        </td>

        <td colspan="2">

            <div class="form-group">
                <label for="licNumero" class="col-form-label col-form-label-sm">Emitida por el
                    Licenciado
                    numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="licNumero" name="licNumero" placeholder="#######">
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
                    name="nombreLicenciado">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="ciudadRepresentante" class="col-form-label col-form-label-sm">De la
                    ciudad </label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="ciudadRepresentante" placeholder="ciudad" name="ciudadRepresentante">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="folioIns" class="col-form-label col-form-label-sm">Con registro
                    publico de comercio numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="folioIns" name="folioIns" placeholder="#######">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="nomApoderado" class="col-form-label col-form-label-sm">Nombre del
                    apoderado</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="nomApoderado" name="nomApoderado" placeholder="Nombre del apoderado">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="poderes" class="col-form-label col-form-label-sm">Poderes con que se
                    ostenta</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="poderes" name="poderes" placeholder="Poderes">
            </div>

        </td>
    </tr>


</table>



<table width="100%">
    <tr>
        <td>

            <div class="form-group">
                <label for="numeroEscritura" class="col-form-label col-form-label-sm">Segun poder o
                    escritura numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="numeroEscritura" placeholder="#######"
                    name="numeroEscritura">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="notarioNumero" class="col-form-label col-form-label-sm">Emitida por
                    el notario numero
                </label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="notarioNumero" name="notarioNumero" placeholder="#######">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="nomNotario" class="col-form-label col-form-label-sm">De nombre
                </label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="nomNotario" name="nomNotario" placeholder="Nombre del Licenciado">
            </div>

        </td>
    </tr>

    <tr>
        <td>

            <div class="form-group">
                <label for="ciudadNotario" class="col-form-label col-form-label-sm">De la
                    ciudad</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="ciudadNotario" placeholder="De la ciudad" name="ciudadNotario">
            </div>

        </td>

    </tr>


</table>
<div class="col-12" align="right">
    <input type="submit" value="Guardar" class="btn btn-success">
</div>';
            break;


        case '3':
            //Arrendatario Fisico
            $tcomplemento = 'Datos Laborables';
            $complemento = '<table width="100%">
        <tr>
            <td>
                <div class="form-group">
                    <label for="nombreEmpresa" class="col-form-label col-form-label-sm ">Nombre de la Empresa</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresa"
                        placeholder="Escribe el nombre de la empresa " name="nombreEmpresa">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="puestoQueOcupa" class="col-form-label col-form-label-sm">Puesto que ocupa</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="puestoQueOcupa"
                        placeholder="Jefe, Auxiliar, Encargado. " name="puestoQueOcupa">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="nombreEmpresa" class="col-form-label col-form-label-sm">Nombre de su jefe inmediato</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreJefeInme"
                        placeholder="Escribe el nombre" name="nombreJefeInme">
                </div>
            </td>

        </tr>
        <td>

            <div class="form-group">
                <label for="calleE" class="col-form-label col-form-label-sm">Calle</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="calleE"
                    placeholder="Nombre de la calle" name="calleE">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="exteriorE" class="col-form-label col-form-label-sm">Numero Exterior</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="exteriorE"
                    placeholder="####" name="exteriorE">
            </div>

        </td>

        <td colspan="2">

            <div class="form-group">
                <label for="interiorE" class="col-form-label col-form-label-sm">Numero Interior</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="interiorE"
                    placeholder="####" name="interiorE">
            </div>

        </td>
        </tr>

        <tr>
            <td>

                <div class="form-group">
                    <label for="coloniaE" class="col-form-label col-form-label-sm">Colonia</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="coloniaE"
                        placeholder="Nombre de la Colonia" name="coloniaE">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="alcaldiaE" class="col-form-label col-form-label-sm">Alcaldia</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="alcaldiaE"
                        placeholder="Nombre de la Alcaldia" name="alcaldiaE">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="cpE" class="col-form-label col-form-label-sm">C.P.</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="cpE"
                        placeholder="######" name="cpE">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="ciudadE" class="col-form-label col-form-label-sm">Ciudad</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="ciudadE"
                        placeholder="Nombre de la Ciudad" name="ciudadE">
                </div>

            </td>
        </tr>


        <tr>
            <td>

                <div class="form-group">
                    <label for="telE1" class="col-form-label col-form-label-sm">Telefono 1</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="telE1"
                        placeholder="Telefono de contacto" name="telE1">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="telE2" class="col-form-label col-form-label-sm">Telefono 2</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="telE2"
                        placeholder="Telefono de contacto secundario" name="telE2">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="correoE" class="col-form-label col-form-label-sm">Correo Electronico</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="correoE"
                        placeholder="nnn@nnn.com" name="correoE">
                </div>

            </td>
        </tr>
    </table>
    <div class="col-12" align="right">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>';
            break;

        case '4':
            //Arrendatario moral

            $tcomplemento = 'Datos arrendatario Moral';
            $complemento = '<tr>
        <td>
        <div class="form-group">
                    <label for="nombreEmpresa" class="col-form-label col-form-label-sm ">Nombre de la Empresa</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresa"
                        placeholder="Escribe el nombre de la empresa " name="nombreEmpresa">
                </div>
        </td>
        <td>
            <div class="form-group">
                <label for="giro" class="col-form-label col-form-label-sm">Giro</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="giro"
                    placeholder="Administrativo, Industrial. " name="giro">
            </div>
        </td>

        <td>

        <div class="form-group">
            <label for="rfc" class="col-form-label col-form-label-sm">RFC</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="rfc"
                placeholder="NNNN######&&&" name="rfc">
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
                        placeholder="Constitucion de la sociedad" name="constSociedad">
                </div>
            </td>

            <td>

                <div class="form-group">
                    <label for="numeroActa" class="col-form-label col-form-label-sm">Numero de
                        acta constitutiva</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="numeroActa"
                        placeholder="#######" name="numeroActa">
                </div>

            </td>

            <td>
                <div class="form-group">
                    <label for="fechaActa" class="col-form-label col-form-label-sm">De
                        fecha</label>
                    <input class="form-control form-control-sm" type="date" class="form-control" id="fechaActa"
                        name="fechaActa">
                </div>

            </td>

            <td colspan="2">

                <div class="form-group">
                    <label for="licNumero" class="col-form-label col-form-label-sm">Emitida por el
                        Licenciado
                        numero</label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="licNumero"
                        name="licNumero" placeholder="#######">
                </div>
            </td>

        </tr>

        <tr>
            <td>

                <div class="form-group">
                    <label for="nombreLicenciado" class="col-form-label col-form-label-sm">Lic</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreLicenciado"
                        placeholder="Nombre del licenciado" name="nombreLicenciado">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="ciudadRepresentante" class="col-form-label col-form-label-sm">De la
                        ciudad </label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="ciudadRepresentante"
                        placeholder="ciudad" name="ciudadRepresentante">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="numeroNotaria" class="col-form-label col-form-label-sm">Num</label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="numero" name="numero"
                        placeholder="#######">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="volumen" class="col-form-label col-form-label-sm">Volumen</label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="volumen"
                        name="volumen" placeholder="#######">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="fojas" class="col-form-label col-form-label-sm">Fojas</label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="fojas" name="fojas"
                        placeholder="#######">
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
                        placeholder="Libro" name="libro">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="folioIns" class="col-form-label col-form-label-sm">Folio de
                        inscripcion en el registro publico de comercio:
                    </label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="folioIns"
                        name="folioIns" placeholder="#######">
                </div>

            </td>

            <td>

                <div class="form-group">
                    <label for="numeroEmpleados" class="col-form-label col-form-label-sm">Numero de
                        empleados en la empresa:
                    </label>
                    <input class="form-control form-control-sm" type="number" class="form-control" id="numeroEmpleados"
                        name="numeroEmpleados" placeholder="#######">
                </div>

            </td>
        </tr>

        <tr>
            <td>

                <div class="form-group">
                    <label for="nombreRepresentante" class="col-form-label col-form-label-sm">Nombre
                        del representante legal </label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreRepresentante"
                        placeholder="Nombre" name="nombreRepresentante">
                </div>

            </td>

        </tr>


    </table>
    <div class="col-12" align="right">
        <input type="submit" value="Guardar" class="btn btn-success">
    </div>';

            break;

        case '5':
            //Fiador Fisico
            $tcomplemento = 'Datos de conyuge y Datos Laborables';
            $complemento = '<table width="100%">
    <tr>
        <td>

            <div class="form-group">
                <label for="regimen" class="col-form-label col-form-label-sm">Bajo que regimen se encuentran</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="regimen"
                    placeholder="Bienes Mancomunados o separados" name="regimen">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="nombreC" class="col-form-label col-form-label-sm">Nombre del conyuge</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="nombreC"
                    placeholder="Nombre del conyuge" name="nombreC">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="rfc" class="col-form-label col-form-label-sm">RFC</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="rfc"
                    placeholder="NNNN######&&&" name="rfc">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="CURP" class="col-form-label col-form-label-sm">CURP de Conyuge</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="CURPC"
                    placeholder="NNNN######NNNNNN##" name="CURPC">
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
                <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresaF"
                    placeholder="Escribe el nombre de la empresa " name="nombreEmpresaF">
            </div>
        </td>
        <td>
            <div class="form-group">
                <label for="sueldoF" class="col-form-label col-form-label-sm">Sueldo Mensual</label>
                <input class="form-control form-control-sm" type="text" class="form-control" id="sueldoF"
                    placeholder="####### " name="sueldoF">
            </div>
        </td>
        <td>
                <div class="form-group">
                    <label for="parentezco" class="col-form-label col-form-label-sm ">Parentezco</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="parentezco"
                        placeholder="Parentezco" name="parentezco">
                </div>
            </td>

    </tr>
</table>
<div class="col-12" align="right">
    <input type="submit" value="Guardar" class="btn btn-success">
</div>';
            break;

        case '6':
            //Fiador Moral

            $tcomplemento = 'Datos Fiador Moral';
            $complemento = '<tr>
        <td>
        <div class="form-group">
                    <label for="nombreEmpresa" class="col-form-label col-form-label-sm ">Nombre de la Empresa</label>
                    <input class="form-control form-control-sm" type="text" class="form-control" id="nombreEmpresa"
                        placeholder="Escribe el nombre de la empresa " name="nombreEmpresa">
                </div>
        </td>
        <td>
            <div class="form-group">
                <label for="giro" class="col-form-label col-form-label-sm">Giro</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="giro" placeholder="Administrativo, Industrial. " name="giro">
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
                    name="constSociedad">
            </div>
        </td>

        <td>

            <div class="form-group">
                <label for="numeroEscritura" class="col-form-label col-form-label-sm">Numero de escritura</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="numeroEscritura" placeholder="#######" name="numeroEscritura">
            </div>

        </td>

        <td>
            <div class="form-group">
                <label for="fechaActa" class="col-form-label col-form-label-sm">De
                    fecha</label>
                <input class="form-control form-control-sm" type="date" class="form-control"
                    id="fechaActa" name="fechaActa">
            </div>

        </td>

        <td colspan="2">

            <div class="form-group">
                <label for="licNumero" class="col-form-label col-form-label-sm">Emitida por el
                    Licenciado
                    numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="licNumero" name="licNumero" placeholder="#######">
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
                    name="nombreLicenciado">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="ciudadRepresentante" class="col-form-label col-form-label-sm">De la
                    ciudad </label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="ciudadRepresentante" placeholder="ciudad" name="ciudadRepresentante">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="registroPublico" class="col-form-label col-form-label-sm">Con registro
                    publico de comercio numero</label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="registroPublico" name="registroPublico" placeholder="#######">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="nomApoderado" class="col-form-label col-form-label-sm">Nombre del
                    apoderado</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="nomApoderado" name="nomApoderado" placeholder="Nombre del apoderado">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="poderes" class="col-form-label col-form-label-sm">Poderes con que se
                    ostenta</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="poderes" name="poderes" placeholder="Poderes">
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
                    name="poderNumero">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="notarioNumero" class="col-form-label col-form-label-sm">Emitida por
                    el notario numero
                </label>
                <input class="form-control form-control-sm" type="number" class="form-control"
                    id="notarioNumero" name="notarioNumero" placeholder="#######">
            </div>

        </td>

        <td>

            <div class="form-group">
                <label for="nomNotario" class="col-form-label col-form-label-sm">De nombre
                </label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="nomNotario" name="nomNotario" placeholder="Nombre del Licenciado">
            </div>

        </td>
    </tr>

    <tr>
        <td>

            <div class="form-group">
                <label for="ciudadNotario" class="col-form-label col-form-label-sm">De la
                    ciudad</label>
                <input class="form-control form-control-sm" type="text" class="form-control"
                    id="ciudadNotario" placeholder="De la ciudad" name="ciudadNotario">
            </div>

        </td>
        <td>
        <div class="form-group">
            <label for="parentezco" class="col-form-label col-form-label-sm ">Parentezco</label>
            <input class="form-control form-control-sm" type="text" class="form-control" id="parentezco"
                placeholder="Parentezco" name="parentezco">
        </div>
    </td>

    </tr>


</table>
<div class="col-12" align="right">
    <input type="submit" value="Guardar" class="btn btn-success">
</div>';

            break;

        default:
            # code...
            break;
    }

    ?>


    <div class="card">
        <?php //Formulario 4 Datos Bancarios y Representante Legal 
        ?>
        <div class="card-header" id="headingFour">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed <?php echo $guardado ?>" data-toggle="collapse"
                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <?php echo $tcomplemento ?>
                </button>
            </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <?php $contador = 4 ?>
                <form
                        action="<?php echo $Actualizar ?>?contador=<?php echo $contador ?>&id=<?php echo $idTipoParticipacion ?>"
                        method="POST">
                    <input style="display: none;" type="text" name="expediente" value="<?php echo $expedienteP ?>">
                    <input style="display: none;" type="text" name="usuario" value="<?php echo $usuario ?>">

                    <?php echo $complemento ?>


                </form>
            </div>
        </div>
    </div>


</div>