<?php
session_start();

include("../php/conection.php");
validar();

$usuario = $_POST['usuario'];
$expediente = $_POST['expediente'];

$idTipoParticipacion = $_POST['idTipoParticipacion'];


/*=============================================
VALIDAR IMAGEN
=============================================*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_POST);
    $ebook = $_FILES['ebook']['tmp_name'];
    if ($_FILES['ebook']['error'] !== 0) {
        echo 'Error al subir el archivo (¿demasiado grande?)';
    } else {
        $finfo = new finfo(FILEINFO_MIME);
        if (
            strpos($finfo->file($_FILES['ebook']['tmp_name']),
                'application/pdf') === 0
        ) {
            $ruta_ebook = '../inmueble/' . $expediente . '-' . $usuario . '.pdf';
            $ruta = '/imueble/' . $expediente . '-' . $usuario . '.pdf';
            if (move_uploaded_file($ebook, $ruta_ebook)) {

                $consultaDocumento = "INSERT INTO inmueble (expediente, usuario,  ruta,  idTipoParticipacion )
								VALUES ('$expediente','$usuario', '$ruta', '$idTipoParticipacion')";
                if ($con->query($consultaDocumento) === TRUE) {
                    header("location: ../php/usuario.php");
                } else {
                    echo "Error updating record: " . $con->error;
                }


            } else {
                echo "No entro";
            }
        } else {
            echo "Archivo No valido Volver a intentar";
        }
    }
}


?>
  
  