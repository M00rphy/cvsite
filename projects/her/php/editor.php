<?php
include "consultasContratos.php";
include "Contratos.php";

/*
 *
 * Arrendador fisico - Contrato 1
 * Arrendador moral - Contrato 2
 * Arrendatario fisico - Contrato 3
 * Arrendatario moral - Contrato 4
 * Fiador fisico - Contrato 5
 * Fiador moral - Contrato 6
 * Obligado Solidario fisico - Contrato 7
 * Obligado Solidario moral - Contrato 8
 *
 * */


?>
<!DOCTYPE html>
<html>

<head>
    <title> <?php echo $usuarioC ?></title>
    <script type="text/javascript" src="../js/jquery-1.12.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/editor.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/editor.css">
    <script type="text/javascript">
        $(document).ready(function () {
            $("#txt-content").Editor();

            $('#txt-content').Editor('setText', [
                '<?php echo $Contrato?>'
            ]);

            $('#btn-enviar').click(function (e) {
                e.preventDefault();
                $("#txt-content").text($('#txt-content').Editor('getText'));
                $('#frm-test').submit();
            });
        });
    </script>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <form action="guardarContrato.php" method="post" id="frm-test">
                <div class="form-group">
                    <textarea id="txt-content" name="txt-content"></textarea>
                </div>
                <input name="expediente" style="display: none;" type="text" value="<?php echo $expediente ?>">
                <input name="tipo" style="display: none;" type="text" value="<?php echo $tipoI ?>">
                <input style="display: none;" type="text" name="usuario" value="<?php echo $usuarioC ?>">
                <input type="submit" class="btn btn-default" id="btn-enviar" value="Guardar Contrato">
            </form>
        </div>
    </div>

</div>

</body>

</html>