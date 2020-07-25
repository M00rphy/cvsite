<?php
session_start();

include("../php/conection.php");
validar();


$consultaAlumno = "SELECT * FROM alumnos WHERE usuario='$usok'";

$resultado = mysqli_query($con, $consultaAlumno);

$registro = mysqli_fetch_array($resultado);

$id = $registro[0];
$matricula = $registro[5];


/*=============================================
VALIDAR IMAGEN
=============================================*/


if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

    $nuevoAncho = 800;
    $nuevoAlto = 800;

    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

        /*=============================================
        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
        =============================================*/


        $ruta = "../cerEstudios/" . $matricula . "-" . $id . "-Certificado" . ".jpg";
        $rutam = "cerEstudios/" . $matricula . "-" . $id . "-Certificado" . ".jpg";

        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

        imagejpeg($destino, $ruta);

    }

    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

        /*=============================================
        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
        =============================================*/

        $ruta = "../cerEstudios/" . $matricula . "-" . $id . "-Certificado" . ".png";

        $rutam = "cerEstudios/" . $matricula . "-" . $id . "-Certificado" . ".png";
        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

        imagepng($destino, $ruta);

    }

}
echo $aleatorio;


$consultaDocumento = "INSERT INTO documentos (matricula, ruta,  tipo )
								VALUES ('$matricula','$rutam', 'Certificado')";
if ($con->query($consultaDocumento) === TRUE) {
    header("location: ../perfil.php");
} else {
    echo "Error updating record: " . $con->error;
}
?>
  
  