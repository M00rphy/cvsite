<?php

session_start();

include "conection.php";

validar();


$contador = $_REQUEST['contador'];


//Formulario 1

switch ($contador) {

    case 1:

        $usuario = $_POST['usuario'];

        $expediente = $_POST['expediente'];

        $calleA = $_POST['calleA'];

        $exteriorA = $_POST['exteriorA'];

        $interiorA = $_POST['interiorA'];

        $coloniaA = $_POST['coloniaA'];

        $alcaldiaA = $_POST['alcaldiaA'];

        $cpA = $_POST['cpA'];

        $ciudadA = $_POST['ciudadA'];

        $terminado = '1';

        $sql = "UPDATE `formulariosfisicos` SET



      `calleA` ='$calleA',

      `numeroExteriorA` ='$exteriorA' ,

      `numeroInteriorA` ='$interiorA' ,

      `coloniaA` ='$coloniaA',

      `alcaldiaA` ='$alcaldiaA',

      `cpA` ='$cpA',

      `ciudadA` ='$ciudadA',

      `f2t` ='$terminado'





     WHERE `formulariosfisicos`.`usuario` = '$usuario' AND `formulariosfisicos`.`expediente` = '$expediente' ";

        if ($con->query($sql) === true) {

            header("location: usuario.php");
        } else {

            echo "Error updating record: " . $con->error;
        }

        break;


    case 2:


        $usuario = $_POST['usuario'];

        $expediente = $_POST['expediente'];

        $calleA = $_POST['calleA'];

        $exteriorA = $_POST['exteriorA'];

        $interiorA = $_POST['interiorA'];

        $coloniaA = $_POST['coloniaA'];

        $alcaldiaA = $_POST['alcaldiaA'];

        $cpA = $_POST['cpA'];

        $ciudadA = $_POST['ciudadA'];

        $terminado = '1';

        $sql = "UPDATE `formulariosfisicos` SET



      `calleA` ='$calleA',

      `numeroExteriorA` ='$exteriorA' ,

      `numeroInteriorA` ='$interiorA' ,

      `coloniaA` ='$coloniaA',

      `alcaldiaA` ='$alcaldiaA',

      `cpA` ='$cpA',

      `ciudadA` ='$ciudadA',

      `f2t` ='$terminado'





     WHERE `formulariosfisicos`.`usuario` = '$usuario' AND `formulariosfisicos`.`expediente` = '$expediente' ";

        if ($con->query($sql) === true) {

            header("location: usuario.php");
        } else {

            echo "Error updating record: " . $con->error;
        }

        break;


    case 3:

        //Formulario 3


        $usuario = $_POST['usuario'];

        $expediente = $_POST['expediente'];


        $nombreR1 = $_POST['nombreR1'];

        $relacionR1 = $_POST['relacionR1'];

        $telefonoR1 = $_POST['telefonoR1'];

        $correoR1 = $_POST['correoR1'];


        $nombreR2 = $_POST['nombreR2'];

        $relacionR2 = $_POST['relacionR2'];

        $telefonoR2 = $_POST['telefonoR2'];

        $correoR2 = $_POST['correoR2'];


        $nombreR3 = $_POST['nombreR3'];

        $relacionR3 = $_POST['relacionR3'];

        $telefonoR3 = $_POST['telefonoR3'];

        $correoR3 = $_POST['correoR3'];

        $terminado = $_POST['1'];


        $terminado = '1';


        $sql = "UPDATE `formulariosfisicos` SET



      `nombreRef1` ='$nombreR1',

      `relacionRef1` ='$relacionR1' ,

      `telefonoRef1` ='$telefonoR1' ,

      `correoRef1` ='$correoR1',

      `nombreRef2` ='$nombreR2',

      `relacionRef2` ='$relacionR2' ,

      `telefonoRef2` ='$telefonoR2' ,

      `correoRef2` ='$correoR2',

      `nombreRef3` ='$nombreR3',

      `relacionRef3` ='$relacionR3' ,

      `telefonoRef3` ='$telefonoR3' ,

      `correoRef3` ='$correoR3',

      `f3t` ='$terminado'





     WHERE `formulariosfisicos`.`usuario` = '$usuario' AND `formulariosfisicos`.`expediente` = '$expediente' ";


        if ($con->query($sql) === true) {

            header("location: usuario.php");
        } else {

            echo "Error updating record: " . $con->error;
        }

        break;


    case 4:

        //Formulario 4


        $expedienteP = $_POST['expediente'];

        $usuarioP = $_POST['usuario'];

        $consultaEx = "SELECT * FROM relacionadosexpediente WHERE usuario='$usuarioP' AND expediente='$expedienteP' ";

        $resultadoEx = mysqli_query($con, $consultaEx);

        $registroEx = mysqli_fetch_array($resultadoEx);

        $idTipoParticipacion = $_REQUEST['id'];


        switch ($idTipoParticipacion) {

            case 1:

                // Arrendador fisico

                $numeroCuentaBanco = $_POST['numeroCuenta'];

                $numeroClabe = $_POST['numeroClabe'];

                $nombreBanco = $_POST['nombreBanco'];

                $nombreRepresentante = $_POST['nombreRepresentante'];

                $poderes = $_POST['poderes'];

                $numeroActa = $_POST['numeroEscritura'];

                $fechaActa = $_POST['fechaActa'];

                $notarioNumero = $_POST['notarioNumero'];

                $nombreLicenciado = $_POST['nombreLicenciado'];

                $ciudadRepresentante = $_POST['ciudadRepresentante'];

                $terminado4 = '1';

                $sql = "UPDATE `formulariosfisicos` SET



      `numeroCuenta` ='$numeroCuentaBanco',

      `numeroClabe` ='$numeroClabe' ,

      `numeroClabe` ='$numeroClabe',

      `nombreBanco` ='$nombreBanco',

      `poderes` ='$poderes' ,

      `nombreRepresentante` ='$nombreRepresentante' ,

      `numeroActa` ='$numeroActa',

      `fechaActa` ='$fechaActa',

      `notarioNumero` ='$notarioNumero' ,

      `nombreLicenciado` ='$nombreLicenciado' ,

      `ciudadRepresentante` ='$ciudadRepresentante',

      `f4t` ='$terminado4'



     WHERE `formulariosfisicos`.`usuario` = '$usuarioP' AND `formulariosfisicos`.`expediente` = '$expedienteP' ";

                if ($con->query($sql) === true) {

                    header("location: usuario.php");
                } else {

                    echo "Error updating record: " . $con->error;
                }

                break;


            case 2:


                /*

                tipo 4



                arrendador moral



                 */

                $usuario = $_POST['usuario'];

                $expediente = $_POST['expediente'];

                $nombreEmpresa = $_POST['nombreEmpresa'];

                $giro = $_POST['giro'];

                $domicilio = $_POST['domicilio'];

                $constSociedad = $_POST['constSociedad'];

                $numeroEscritura = $_POST['numeroEscritura'];

                $fechaRepresentante = $_POST['fechaRepresentante'];

                $licNumero = $_POST['licNumero'];

                $folioIns = $_POST['folioIns'];

                $nombreLicenciado = $_POST['nombreLicenciado'];

                $ciudadRepresentante = $_POST['ciudadRepresentante'];

                $numeroRepresentante = $_POST['numeroRepresentante'];

                $nomApoderado = $_POST['nomApoderado'];

                $poderes = $_POST['poderes'];

                $poderNumero = $_POST['poderNumero'];

                $notarioNumero = $_POST['notarioNumero'];

                $nomNotario = $_POST['nomNotario'];

                $ciudadNotario = $_POST['ciudadNotario'];

                $terminado4 = '1';


                $sql = "UPDATE `formulariosfisicos` SET



`usuario` ='$usuario',

`expediente` ='$expediente',

`nombreEmpresa` ='$nombreEmpresa',

`giro` ='$giro',

`folioIns` ='$folioIns',

`constSociedad` ='$constSociedad',

`numeroEscritura` ='$numeroEscritura',

`fechaRepresentante` ='$fechaRepresentante',

`licNumero` ='$licNumero',

`nombreLicenciado` ='$nombreLicenciado',

`ciudadRepresentante` ='$ciudadRepresentante',

`numeroRepresentante` ='$numeroRepresentante',

`nomApoderado` ='$nomApoderado',

`poderes` ='$poderes',

`poderNumero` ='$poderNumero',

`notarioNumero` ='$notarioNumero',

`nomNotario` ='$nomNotario',

`ciudadNotario` ='$ciudadNotario',



      `f4t` ='$terminado4'



     WHERE `formulariosfisicos`.`usuario` = '$usuarioP' AND `formulariosfisicos`.`expediente` = '$expedienteP' ";

                if ($con->query($sql) === true) {

                    header("location: usuario.php");
                } else {

                    echo "Error updating record: " . $con->error;
                }


                break;

            case 3:


                /*

                tipo 1



                Arrendatario fisico



                 */

                $nombreEmpresa = $_POST['nombreEmpresa'];

                $puestoQueOcupa = $_POST['puestoQueOcupa'];

                $nombreJefeInme = $_POST['nombreJefeInme'];

                $calleE = $_POST['calleE'];

                $exteriorE = $_POST['exteriorE'];

                $alcaldiaE = $_POST['alcaldiaE'];

                $interiorE = $_POST['interiorE'];

                $coloniaE = $_POST['coloniaE'];

                $cpE = $_POST['cpE'];

                $ciudadE = $_POST['ciudadE'];

                $telE1 = $_POST['telE1'];

                $telE2 = $_POST['telE2'];

                $correoE = $_POST['correoE'];

                $terminado4 = '1';

                $sql = "UPDATE `formulariosfisicos` SET



                `nombreEmpresa` ='$nombreEmpresa',

                `puestoQueOcupa` ='$puestoQueOcupa',

                `nombreJefeInme` ='$nombreJefeInme',

                `alcaldiaE` = '$alcaldiaE',

                `calleE` ='$calleE',

                `exteriorE` ='$exteriorE',

                `interiorE` ='$interiorE',

                `cpE` ='$cpE',

                `coloniaE` ='$coloniaE',

                `ciudadE` ='$ciudadE',

                `telE1` ='$telE1',

                `telE2` ='$telE2',

                `correoE` ='$correoE',

                `f4t` ='$terminado4'



     WHERE `formulariosfisicos`.`usuario` = '$usuarioP' AND `formulariosfisicos`.`expediente` = '$expedienteP' ";

                if ($con->query($sql) === true) {

                    header("location: usuario.php");
                } else {

                    echo "Error updating record: " . $con->error;
                }


                break;


            case 4:

                /*

                tipo 2



                Arrendatario moral



                 */

                $usuario = $_POST['usuario'];

                $expediente = $_POST['expediente'];

                $nombreEmpresa = $_POST['nombreEmpresa'];

                $giro = $_POST['giro'];


                $constSociedad = $_POST['constSociedad'];

                $numeroActa = $_POST['numeroActa'];

                $fechaActa = $_POST['fechaActa'];

                $licNumero = $_POST['licNumero'];

                $nombreLicenciado = $_POST['nombreLicenciado'];

                $ciudadRepresentante = $_POST['ciudadRepresentante'];

                $numero = $_POST['numero'];

                $volumen = $_POST['volumen'];

                $fojas = $_POST['fojas'];

                $libro = $_POST['libro'];

                $folioIns = $_POST['folioIns'];

                $numeroEmpleados = $_POST['numeroEmpleados'];

                $nombreRepresentante = $_POST['nombreRepresentante'];

                $terminado4 = '1';


                $sql = "UPDATE `formulariosfisicos` SET



`usuario` ='$usuario',

`expediente` ='$expediente',

`nombreEmpresa` ='$nombreEmpresa',

`giro` ='$giro',



`constSociedad` ='$constSociedad',

`numeroActa` ='$numeroActa',

`fechaActa` ='$fechaActa',

`licNumero` ='$licNumero',

`nombreLicenciado` ='$nombreLicenciado',

`ciudadRepresentante` ='$ciudadRepresentante',

`numero` ='$numero',

`volumen` ='$volumen',

`fojas` ='$fojas',

`libro` ='$libro',

`folioIns` ='$folioIns',

`numeroEmpleados` ='$numeroEmpleados',

`nombreRepresentante` ='$nombreRepresentante',



      `f4t` ='$terminado4'



     WHERE `formulariosfisicos`.`usuario` = '$usuarioP' AND `formulariosfisicos`.`expediente` = '$expedienteP' ";

                if ($con->query($sql) === true) {

                    header("location: usuario.php");
                } else {

                    echo "Error updating record: " . $con->error;
                }


                break;


            case 5:

                /*

                tipo 5

                Fiador Fisico



                 */

                $regimen = $_POST['regimen'];

                $nombreConyuge = $_POST['nombreC'];

                $rfcC = $_POST['rfcC'];

                $curpc = $_POST['CURPC'];

                $nombreEmpresaF = $_POST['nombreEmpresaF'];

                $sueldoF = $_POST['sueldoF'];

                $parentezco = $_POST['parentezco'];

                $terminado4 = '1';

                $sql = "UPDATE `formulariosfisicos` SET



      `regimen` ='$regimen',

      `nombreC` ='$nombreConyuge' ,

      `rfcC` ='$rfcC',

      `CURPC` ='$curpc',

      `nombreEmpresaF` ='$nombreEmpresaF' ,

      `parentezco` ='$parentezco' ,

      `sueldoF` ='$sueldoF' ,

      `f4t` ='$terminado4'



     WHERE `formulariosfisicos`.`usuario` = '$usuarioP' AND `formulariosfisicos`.`expediente` = '$expedienteP' ";

                if ($con->query($sql) === true) {

                    header("location: usuario.php");
                } else {

                    echo "Error updating record: " . $con->error;
                }


                break;


            case 6:


                /*

                tipo 6

                fiador moral

                 */

                $usuario = $_POST['usuario'];

                $expediente = $_POST['expediente'];

                $nombreEmpresa = $_POST['nombreEmpresa'];

                $giro = $_POST['giro'];

                $domicilio = $_POST['domicilio'];


                $constSociedad = $_POST['constSociedad'];

                $numeroEscritura = $_POST['numeroEscritura'];

                $fechaActa = $_POST['fechaActa'];

                $licNumero = $_POST['licNumero'];

                $nombreLicenciado = $_POST['nombreLicenciado'];

                $ciudadRepresentante = $_POST['ciudadRepresentante'];

                $registroPublico = $_POST['registroPublico'];

                $nomApoderado = $_POST['nomApoderado'];

                $poderes = $_POST['poderes'];

                $poderNumero = $_POST['poderNumero'];

                $notarioNumero = $_POST['notarioNumero'];

                $nomNotario = $_POST['nomNotario'];

                $ciudadNotario = $_POST['ciudadNotario'];

                $terminado4 = '1';


                $sql = "UPDATE `formulariosfisicos` SET



`usuario` ='$usuario',

`expediente` ='$expediente',

`nombreEmpresa` ='$nombreEmpresa',

`giro` ='$giro',



`constSociedad` ='$constSociedad',

`numeroEscritura` ='$numeroEscritura',

`fechaActa` ='$fechaActa',

`licNumero` ='$licNumero',

`nombreLicenciado` ='$nombreLicenciado',

`ciudadRepresentante` ='$ciudadRepresentante',

`registroPublico` ='$registroPublico',

`nomApoderado` ='$nomApoderado',

`poderes` ='$poderes',

`poderNumero` ='$poderNumero',

`notarioNumero` ='$notarioNumero',

`nomNotario` ='$nomNotario',

`ciudadNotario` ='$ciudadNotario',



      `f4t` ='$terminado4'



     WHERE `formulariosfisicos`.`usuario` = '$usuarioP' AND `formulariosfisicos`.`expediente` = '$expedienteP' ";

                if ($con->query($sql) === true) {

                    header("location: usuario.php");
                } else {

                    echo "Error updating record: " . $con->error;
                }


                break;


            default:

                # code...


                break;
        }


        break;


    default:

        # code...

        break;
}
