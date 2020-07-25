<?php
session_start();

include("../php/conection.php");
validar();


	$consultaAlumno="SELECT * FROM alumnos WHERE usuario='$usok'";

$resultado=mysqli_query($con,$consultaAlumno);

$registro = mysqli_fetch_array($resultado);

	$id =$registro[0];
  $matricula =$registro[5];

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
				      $ruta_ebook = '../comDomicilio/'.$matricula."-".$id."-ComprobanteDomicilio".'.pdf';
				      $ruta = 'comDomicilio/'.$matricula."-".$id."-ComprobanteDomicilio".'.pdf';
				      if (move_uploaded_file($ebook, $ruta_ebook)) {
				        
					        $consultaDocumento = "INSERT INTO documentos (matricula, ruta,  tipo )
								VALUES ('$matricula','$ruta', 'ComprobanteDomicilio')";
								if ($con->query($consultaDocumento) === TRUE) {
						  	 	 header("location: ../perfil.php");
								} else {
						    	echo "Error updating record: " . $con->error;
								}

						  	

				      } else {
				        echo "No entro";
				      }
				    }else{
					echo "Archivo No valido Volver a intentar";
				}
				  }
				}






				





		

  ?>
  
  