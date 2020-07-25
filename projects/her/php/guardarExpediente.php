<?php

include("conection.php");

  $corredor =$_POST['corredor'];
  $idrelacion =$_POST['idrelacion'];
  $tipoI =$_POST['tipoI'];
  $calle =$_POST['calle'];
  $exterior =$_POST['exterior'];
  $interior =$_POST['interior'];
  $colonia =$_POST['colonia'];
  $alcaldia =$_POST['alcaldia'];
  $cp =$_POST['cp'];
  $ciudad =$_POST['ciudad'];
  $uso =$_POST['uso'];
  $renta =$_POST['renta'];
  $cuota =$_POST['cuota'];
  $cobertura =$_POST['cobertura'];
  $vigenciaInicio =$_POST['vigenciaInicio'];
  $vigenciaFinal =$_POST['vigenciaFinal'];
  $estatus ='Nuevo';

  $rentaTotal = $renta;



  switch ($inmobilaria) {
    case 'Rayo':
            switch ($cobertura) {
            case 'Limitada':
              if ($rentaTotal < 8001) {
                  $costoCobertura = 5050;
                  $comision = 400;
              }else{
                if ($rentaTotal < 15001) {
                  $costoCobertura = 5850;
                  $comision = 500;
                }else{
                    if ($rentaTotal < 30001) {
                        $costoCobertura = 6750;
                        $comision = 500;
                    }else{
                    $costoCobertura = $rentaTotal * .25;    
                    $comision = $rentaTotal * .10;    
                    }
                  
                }
              }
            break;
            case 'Amplia':
               case 'Limitada':
              if ($rentaTotal < 8001) {
                  $costoCobertura = 6450;
                  $comision = 500;
              }else{
                if ($rentaTotal < 15001) {
                  $costoCobertura = 7050;
                  $comision = 600;
                }else{
                    if ($rentaTotal < 30001) {
                        $costoCobertura = 8050;
                    }else{
                    $costoCobertura = $rentaTotal * .30;
                    $comision =  $rentaTotal * .10;    
                    }
                  
                }
              }
            break;
            
            default:
              # code...
              break;
          }
      break;
    
    default:
              switch ($cobertura) {
            case 'Limitada':
              if ($rentaTotal < 15001) {
                  $costoCobertura = 5000;
                  $comision = 1000;    
              }else{
                if ($rentaTotal < 30001) {
                  $costoCobertura = 6000;
                  $comision = 1200;
                }else{
                  $costoCobertura = $rentaTotal * .25;
                  $comision = $rentaTotal * .20;
                }
              }
            break;
            case 'Amplia':
                 if ($rentaTotal < 15001) {
                  $costoCobertura = 7000;
                  $comision = 1400;

              }else{
                if ($rentaTotal < 30001) {
                  $costoCobertura = 8000;
                  $comision = 1600;

                }else{
                  $costoCobertura = $rentaTotal * .30;
                  $comision = $rentaTotal * .20;

                }
              }
            break;
            
            default:
              # code...
              break;
          }



      break;
  }




  
  
    

	$consultaNExpediente= "INSERT INTO expedientes (corredor,  idrelacion, tipoI, calle, exterior, interior, colonia, alcaldia, cp, ciudad, uso, renta, cuota, cobertura, vigenciaInicio, vigenciaFinal, estatus, costoCobertura, comisionCorredor )
	VALUES ('$corredor','$idrelacion', '$tipoI', '$calle', '$exterior', '$interior', '$colonia', '$alcaldia', '$cp', '$ciudad', '$uso', '$renta', '$cuota', '$cobertura', '$vigenciaInicio', '$vigenciaFinal', '$estatus','$costoCobertura' ,'$comision' )";
	if ($con->query($consultaNExpediente) === TRUE) {
							
	header("location: corredor.php");
	} else {
	echo "Error updating record: " . $con->error;
	}

?>