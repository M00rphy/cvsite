<?php
session_start();

include("../php/conection.php");
validar();

	$usuario =$_POST['id'];
  	$expediente =$_POST['expediente'];
  	$estatusI = "Facturado y Cartera";
  	
  	
  	


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
				      $ruta_ebook = '../facturas/'.$expediente.'-'.$usuario.'.pdf';
				      $ruta = '/facturas/'.$expediente.'-'.$usuario.'.pdf';
				      if (move_uploaded_file($ebook, $ruta_ebook)) {
				        
					        $consultaDocumento = "INSERT INTO facturas (expediente, ruta )
								VALUES ('$expediente', '$ruta')";
								if ($con->query($consultaDocumento) === TRUE) {
						  	 	 
								} else {
						    	echo "Error updating record: " . $con->error;
								}

						  	$sql = "UPDATE `expedientes` SET
		  
							  `estatus` ='$estatusI'


							 WHERE `expedientes`.`id` = '$usuario' ";

									if ($con->query($sql) === TRUE) {
									    header("location: ../php/cobranza.php");
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
  
  