<form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
    <br>
    <h3 align="center">Olvidaste tu contraseña ?</h3>
    <?php if (!empty($success_message)) { ?>
        <div class="success_message"><?php echo $success_message; ?></div>
    <?php } ?>

    <div id="validation-message">
        <?php if (!empty($error_message)) { ?>
            <?php echo $error_message; ?>
        <?php } ?>
    </div>

    <div class="field-group" align="center">
        <div align="center"><input type="text" name="user-login-name" id="user-login-name" class="input-field"
                                   placeholder="Usuario"></div>
    </div>
    <br>
    <div class="field-group" align="center">
        <div><input type="submit" name="forgot-password" id="forgot-password"
                    value="Validar"
                    class="btn btn-success">
        </div>
    </div>
</form>


<?php
if (!empty($_POST["forgot-password"])) {
    $conn = mysqli_connect("localhost", "root", "", "her");

    $condition = "";
    /*if (!empty($_POST["user-login-name"])) {
        $condition = " member_name = '" . $_POST["user-login-name"] . "'";
    }


    if (!empty($condition)) {
        $condition = " where " . $condition;
    }*/

    $usuario = $_POST['user-login-name'];

    //$sql = "Select * from usuarios " . $condition;
    $sql = "Select * from usuarios where usuario = '$usuario'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result);
    $password = $user[2];

    if (!empty($user)) {

        $consultaP2 = "SELECT * FROM datosusuarios WHERE  usuario = '$usuario'  ";
        $resultadoP2 = mysqli_query($conn, $consultaP2);
        $rowP2 = mysqli_fetch_array($resultadoP2);

        $nombre = $rowP2[2];
        $apP = $rowP2[3];
        $apM = $rowP2[4];
        $correo = $rowP2[5];

        $headers = "From: contacto@her.site.com";
        $mensaje = "Estimado usuario: $nombre $apP $apM \r\n Se le informa que su contraseña es " . $password;
        //mail($correo, "Recuperacion de contraseña", $mensaje, $headers);
        echo $password;
        //header("location: ../index.php");
    } else {
        $error_message = 'Usuario no encontrado';
    }
}
?>