<?php
session_start();

include("../php/conection.php");
validar();

$usuario = $_SESSION['usuario'];
$tipoIdentificacion =$_POST['tipoIdentificacion'];
$vigencia =$_POST['vigencia'];


				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			
			
				
				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 800;
					$nuevoAlto = 800;

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						
								
						$ruta = "../identificaciones/".$vigencia."-".$usuario."-identificacion".".jpg";
						

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

						$consultaDocumento = "INSERT INTO identificaciones (tipoIdentificacion, vigencia, ruta, usuario )
								VALUES ('$tipoIdentificacion','$vigencia', '$ruta', '$usuario')";
								if ($con->query($consultaDocumento) === TRUE) {
						  	 	 header("location: ../php/usuario.php");
								} else {
						    	echo "Error updating record: " . $con->error;
								}

					}else{

							if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$ruta = "../identificaciones/".$vigencia."-".$usuario."-identificacion".".png";

						
						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

						$consultaDocumento = "INSERT INTO identificaciones (tipoIdentificacion, vigencia, ruta, usuario )
								VALUES ('$tipoIdentificacion','$vigencia', '$ruta', '$usuario')";
								if ($con->query($consultaDocumento) === TRUE) {
						  	 	 header("location: ../php/usuario.php");
								} else {
						    	echo "Error updating record: " . $con->error;
								}

							}else{
								header("location: ../php/errorDocumento.php");					
							}
					}		



				}
			

			

						

					        
  ?>
  
  