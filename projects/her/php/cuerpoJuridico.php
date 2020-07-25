
<div class="container">
    <div class="row">
        <div class="col-10">
            <table width="100%">
                <tr>
                    <td>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Ingresa un dato a Buscar"
                                aria-label="Ingresa un dato a Buscar" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">Buscar</button>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <?php
                $consultaP = "SELECT * FROM expedientes WHERE  estatus = 'Juridico' ";
                $resultadoP = mysqli_query($con, $consultaP);

                while ($rowP = mysqli_fetch_array($resultadoP)) {
                    $idE = $rowP[0];
                    $expedienteP = $rowP[1];
                    $estatus = $rowP[17];
                    $costoCovertura = $rowP[22];
                    $costoInvestigacion = $rowP[23];

                    switch ($estatus) {
                        case 'Nuevo':
                            $btnEliminar = '<a href="eliminarExpediente.php?id=' . $idE . '&expediente=' . $expedienteP . '" class="btn btn-danger">Eliminar</a>';
                            $btnBitacora = '';
                            $btnEnviar = '<a href="enviarExpediente.php?id=' . $idE . '&expediente=' . $expedienteP . '"class="btn btn-primary">Enviar</a>';
                            break;

                        case 'En Validacion':
                            $btnEliminar = '';
                            $btnBitacora = '<a href="bitacora.php?id=' . $idE . '&expediente=' . $expedienteP . '" class="btn btn-success">Bitacora</a>';
                            $btnEnviar = '<a href="enviarExpediente.php?id=' . $idE . '&expediente=' . $expedienteP . '"class="btn btn-primary">Enviar</a>';
                            break;

                        default:
                            $btnEliminar = '<a href="enviarExpediente.php?id=' . $idE . '&expediente=' . $expedienteP . '"class="btn btn-primary">Dictamen-incorrecto</a>';
                            $btnBitacora = '<a href="bitacora.php?id=' . $idE . '&expediente=' . $expedienteP . '" class="btn btn-success">Bitacora</a>';
                            $btnEnviar = '<a href="enviarExpediente.php?id=' . $idE . '&expediente=' . $expedienteP . '"class="btn btn-primary">Dictamen-Correcto</a>';
                            break;
                    }

                ?>

                <tr>
                    <td>
                        Expediente
                    </td>

                    <td>
                        Estatus
                    </td>

                    <td>
                        Costo de investigacion
                    </td>

                    <td>
                        Covertura
                    </td>

                    <td>
                        Arredandores
                    </td>

                    <td>
                        Arrendatarios
                    </td>

                    <td>
                        Fiadores
                    </td>

                    <td>
                        Bitacora
                    </td>

                    <td>
                        Enviar
                    </td>

                </tr>
                <tr>
                    <td>
                        <?php echo $expedienteP ?>
                    </td>
                    <td>
                        <?php echo $estatus ?>
                    </td>
                    <td>
                        $<?php echo $costoInvestigacion ?>.00
                    </td>
                    <td>
                        $<?php echo $costoCovertura ?>.00
                    </td>
                    <td align="center">

                        <a href="buscadorInvitacionesEV.php?expediente=<?php echo $expedienteP ?>&participacion=A"
                            class="btn btn-success">Arrendador(es)</a>

                    </td>

                    <td align="center">

                        <a href="buscadorInvitacionesEV.php?expediente=<?php echo $expedienteP ?>&participacion=Ao"
                            class="btn btn-success">Arrendatario(es)</a>

                    </td>

                    <td align="center">

                        <a href="buscadorInvitacionesEV.php?expediente=<?php echo $expedienteP ?>&participacion=Fi"
                            class="btn btn-success">Fiador(es)</a>

                    </td>

                    <td align="center">
                        <?php echo $btnBitacora ?>
                    </td>

                    <td align="center">
                        <?php echo $btnEnviar ?>
                    </td>

                    <td align="center">
                        <?php echo $btnEliminar ?>
                    </td>

                    <?php

                } ?>

                </tr>


            </table>
        </div>















        <div class="col-2">

            

        </div>

    </div>

</div>