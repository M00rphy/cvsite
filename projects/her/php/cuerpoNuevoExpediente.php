<?php
$tipoUsuario = $_SESSION['tipo'];

switch ($tipoUsuario) {
    case 'Usuario':
        $regresar = "usuario.php";
        break;
    case 'Corredor':
        $regresar = "corredor.php";

        break;
    case 'Eventas':
        $regresar = "eVentas.php";

        break;
    case 'Administrador':
        $regresar = "administrador.php";

        break;

    default:
        # code...
        break;
}
?>
<div class="container">
    <div class="row" align="center">
        <div class="col-4">
            <img src="../img/expendientes.jpg" width="100%">
        </div>
        <div class="col-8">
            <table width="100%">
                <tr>
                    <td>
                        <h3>Formulario de Registro Nuevo Expediente</h3>

                        <form action="guardarExpediente.php" method="POST">
                            <?php
$random = $random_number = intval("0" . rand(1, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9));

$idrelacion = "E-" . $random; //generador de expediente
?>
                            <input style="display: none;" type="text" name="corredor" value="<?php echo $usuario ?>">
                            <input style="display: none;" type="text" name="idrelacion"
                                value="<?php echo $idrelacion ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Tipo de inmueble</label>
                                </div>
                                <select name="tipoI" class="custom-select" id="inputGroupSelect01">
                                    <option selected>Tipo...</option>
                                    <option value="Bodega">Bodega</option>
                                    <option value="Casa Habitacion">Casa Habitacion</option>
                                    <option value="Casa Condominio">Casa Condominio</option>
                                    <option value="Departamento">Departamento</option>
                                    <option value="Edificio">Edificio</option>
                                    <option value="Local Comercial">Local Comercial</option>
                                    <option value="Oficina">Oficina</option>
                                    <option value="Terreno">Terreno</option>
                                    <option value="Azotea">Azotea</option>

                                </select>
                            </div>

                            Domicilio:

                            <input name="calle" class="form-control form-control-sm" type="text" placeholder="Calle"
                                required>
                            <input name="exterior" class="form-control form-control-sm" type="text"
                                placeholder="Numeroexterior" required>
                            <input name="interior" class="form-control form-control-sm" type="text"
                                placeholder="Numero interior" required>
                            <input name="colonia" class="form-control form-control-sm" type="text" placeholder="Colonia"
                                required>
                            <input name="alcaldia" class="form-control form-control-sm" type="text"
                                placeholder="Alcaldia" required>
                            <input name="cp" class="form-control form-control-sm" type="text" placeholder="C.P."
                                required>
                            <input name="ciudad" class="form-control form-control-sm" type="text" placeholder="Ciudad"
                                required>
                            <input name="uso" class="form-control form-control-sm" type="text" placeholder="Uso"
                                required>
                            <br>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input name="renta" type="number" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" placeholder="Renta">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input name="cuota" type="number" class="form-control"
                                    aria-label="Amount (to the nearest dollar)" placeholder="Cuota de mantenimiento">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>



                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Opciones</label>
                                </div>
                                <select name="cobertura" class="custom-select" id="inputGroupSelect01">
                                    <option selected>Cobertura...</option>
                                    <option value="Limitada">Limitada</option>
                                    <option value="Amplia">Amplia</option>

                                </select>
                            </div>
                            Inicio de la Vigencia
                            <input name="vigenciaInicio" id="vigenciaInicio" class="form-control form-control-sm"
                                type="date" onChange="evaluateOnClick()" required>
                            <br>
                            Fin de la Vigencia
                            <input name="vigenciaFinal" id="vigenciaFinal" class="form-control form-control-sm"
                                type="date" required>

                            <script src="../js/fechador.js"></script>


                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <a href="<?php echo $regresar ?>" class="btn btn-success">Regresar</a>
                        <input type="submit" class="btn btn-success" value="Guardar Expediente">
                    </td>
                </tr>
                </form>
            </table>
        </div>
    </div>

</div>