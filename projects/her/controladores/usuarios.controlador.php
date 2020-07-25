<?php
$BBDD_host="localhost";
$BBDD_user="albert0conection";
$BBDD_pass="l29edesma13";
$BBDD_bd="alessandraDB";


$con=mysqli_connect($BBDD_host,$BBDD_user,$BBDD_pass);
if(mysqli_connect_errno()){
	echo "No se ha logrado conectar con el host";}
	mysqli_set_charset($con,"UTF8");
	mysqli_select_db($con,$BBDD_bd) or die ("Error al conectar con la bd");

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			
			$estado = "En Proceso";
			$id = $_POST ['id'];
				
				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 800;
					$nuevoAlto = 800;

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );

						$ruta = "../pagos/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );

						$ruta = "../pagos/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}
			echo $aleatorio;

		$sql = "UPDATE pagos SET comprobante='$ruta', estado = '$estado' WHERE id='$id'";
	  	if ($con->query($sql) === TRUE) {

	  	} else {
   		echo "Error updating record: " . $con->error;
		}
		
header("location: ../usuario.php");

  ?>
  
  