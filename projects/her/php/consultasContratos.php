<?php
session_start();

include('conection.php');
validar();

$usuarioC = $_REQUEST['usuario'];
$expediente = $_REQUEST['expediente'];
$idTipoParticipacion = $_REQUEST['id'];

$consultaIntegrantesExpediente = "SELECT * FROM relacionadosexpediente WHERE expediente = '$expediente'";
$resultadoInte = mysqli_query($con, $consultaIntegrantesExpediente);
while ($rowInte = mysqli_fetch_array($resultadoInte)) {
    $rows[] = $rowInte;
}
foreach ($rows as $row) {
    $usuario = $row[1];
    $consultaID = "SELECT tipoIdentificacion from identificaciones where usuario = '$usuario'";
    $resultadoID = mysqli_query($con, $consultaID);
    $rowID = mysqli_fetch_array($resultadoID);
    $tipoID = $rowID[0];
    $idT = $row[4];
    switch ($idT) {
        case 1:
        case 2:
            //Arrendador
            $consultaArr = "SELECT * FROM relacionadosexpediente WHERE  expediente = '$expediente' AND idTipoParticipacion = '1' OR idTipoParticipacion = '2'";
            $resultadoArr = mysqli_query($con, $consultaArr);
            $rowArr = mysqli_fetch_array($resultadoArr);
            $arrendador = $rowArr[1];
            $consultaNomArr = "SELECT * FROM datosusuarios WHERE  usuario = '$arrendador'";
            $resultadoNomArr = mysqli_query($con, $consultaNomArr);
            $rowNomArr = mysqli_fetch_array($resultadoNomArr);

            $nomArr = $rowNomArr[2];
            $apPArr = $rowNomArr[3];
            $apMArr = $rowNomArr[4];
            $NombreArr = $nomArr . " " . $apPArr . " " . $apPArr;


            $consultaFor = "SELECT * FROM formulariosfisicos WHERE usuario='$usuario' AND expediente='$expediente' ";
            $resultadoFor = mysqli_query($con, $consultaFor);
            $registroF = mysqli_fetch_array($resultadoFor);

            $calleAdor = $registroF[5];
            $exteriorAdor = $registroF[6];
            $interiorAdor = $registroF[7];
            $coloniaAdor = $registroF[8];
            $alcaldiaAdor = $registroF[9];
            $cpAdor = $registroF[10];
            $ciudadAdor = $registroF[11];

            $nacionalidad = $registroF[3];
            $originario = $registroF[4];
            $tel1 = $registroF[12];
            $tel2 = $registroF[13];
            $correo = $registroF[14];
            $rfc = $registroF[15];
            $curp = $registroF[16];
            $estadoCivil = $registroF[17];

            $nombreR1 = $registroF[26];
            $relacionR1 = $registroF[27];
            $telefonoR1 = $registroF[28];
            $correoR1 = $registroF[29];
            $nombreR2 = $registroF[30];
            $relacionR2 = $registroF[31];
            $telefonoR2 = $registroF[32];
            $correoR2 = $registroF[33];
            $nombreR3 = $registroF[34];
            $relacionR3 = $registroF[35];
            $telefonoR3 = $registroF[36];
            $correoR3 = $registroF[37];

            $numeroCuenta = $registroF[39];
            $numeroClabe = $registroF[40];
            $nombreBanco = $registroF[41];
            $poderes = $registroF[42];
            $nombreRepresentante = $registroF[43];
            $numeroRepresentante = $registroF[44];
            $fechaRepresentante = $registroF[45];
            $notarioNumero = $registroF[46];
            $nombreLicenciado = $registroF[47];
            $ciudadRepresentante = $registroF[48];
            $nombreEmpresa = $registroF[49];
            $puestoQueOcupa = $registroF[50];
            $nombreJefeInme = $registroF[51];
            $calleE = $registroF[52];
            $exteriorE = $registroF[53];
            $interiorE = $registroF[54];
            $coloniaE = $registroF[55];
            $alcaldiaE = $registroF[56];
            $cpE = $registroF[57];
            $ciudadE = $registroF[58];
            $telE1 = $registroF[59];
            $telE2 = $registroF[60];
            $correoE = $registroF[61];
            $regimen = $registroF[62];
            $nombreC = $registroF[63];
            $rfcC = $registroF[64];
            $CURPC = $registroF[65];
            $nombreEmpresaF = $registroF[66];
            $sueldoF = $registroF[67];
            $giro = $registroF[68];
            $constSociedad = $registroF[69];
            $numeroActa = $registroF[70];
            $fechaActa = $registroF[71];
            $licNumero = $registroF[72];
            $numero = $registroF[73];
            $volumen = $registroF[74];
            $fojas = $registroF[75];
            $libro = $registroF[76];
            $folioIns = $registroF[77];
            $numeroEmpleados = $registroF[78];
            $numeroEscritura = $registroF[79];
            $nomApoderado = $registroF[80];
            $poderNumero = $registroF[81];
            $nomNotario = $registroF[82];
            $ciudadNotario = $registroF[83];
            $parentezco = $registroF[85];
            $registroPublico = $registroF[86];

            $dirEmpresa = $calleE . ", No. Exterior: " . $exteriorE . ", No. Interior: " . $interiorE . ", " . $coloniaE . ", Alcaldia: " . $alcaldiaE . ", C.P.: " . $cpE . ", " . $ciudadE;

            $dirAdor = $calleAdor . ", No. Exterior: " . $exteriorAdor . ", No. Interior: " . $interiorAdor . ", " . $coloniaAdor . ", Alcaldia: " . $alcaldiaAdor . ", C.P.: " . $cpAdor . ", " . $ciudadAdor;


            break;

        case 3:
        case 4:
            //Arrendatario
            $consultaAtario = "SELECT * FROM relacionadosexpediente WHERE  expediente = '$expediente' AND idTipoParticipacion = '3' OR idTipoParticipacion = '4'";
            $resultadoAtario = mysqli_query($con, $consultaAtario);
            $rowAtario = mysqli_fetch_array($resultadoAtario);
            $arrendatario = $rowAtario[1];
            $consultaNomAtario = "SELECT * FROM datosusuarios WHERE  usuario = '$arrendatario'";
            $resultadoNomAtario = mysqli_query($con, $consultaNomAtario);
            $rowNomAtario = mysqli_fetch_array($resultadoNomAtario);

            $nomAtario = $rowNomAtario[2];
            $apPAtario = $rowNomAtario[3];
            $apMAtario = $rowNomAtario[4];
            $NombreAtario = $nomAtario . " " . $apPAtario . " " . $apPAtario;


            $consultaForAta = "SELECT * FROM formulariosfisicos WHERE usuario='$usuario' AND expediente='$expediente' ";
            $resultadoForAta = mysqli_query($con, $consultaForAta);
            $registroFA = mysqli_fetch_array($resultadoForAta);

            $nacionalidadA = $registroFA[3];
            $originarioA = $registroFA[4];
            $calleA = $registroFA[5];
            $exteriorA = $registroFA[6];
            $interiorA = $registroFA[7];
            $coloniaA = $registroFA[8];
            $alcaldiaA = $registroFA[9];
            $cpA = $registroFA[10];
            $ciudadA = $registroFA[11];
            $tel1A = $registroFA[12];
            $tel2A = $registroFA[13];
            $correoA = $registroFA[14];
            $rfcA = $registroFA[15];
            $curpA = $registroFA[16];
            $estadoCivilA = $registroFA[17];

            $nombreR1A = $registroFA[26];
            $relacionR1A = $registroFA[27];
            $telefonoR1A = $registroFA[28];
            $correoR1A = $registroFA[29];
            $nombreR2A = $registroFA[30];
            $relacionR2A = $registroFA[31];
            $telefonoR2A = $registroFA[32];
            $correoR2A = $registroFA[33];
            $nombreR3A = $registroFA[34];
            $relacionR3A = $registroFA[35];
            $telefonoR3A = $registroFA[36];
            $correoR3A = $registroFA[37];

            $numeroCuentaA = $registroFA[39];
            $numeroClabeA = $registroFA[40];
            $nombreBancoA = $registroFA[41];
            $poderesA = $registroFA[42];
            $nombreRepresentanteA = $registroFA[43];
            $numeroRepresentanteA = $registroFA[44];
            $fechaRepresentanteA = $registroFA[45];
            $notarioNumeroA = $registroFA[46];
            $nombreLicenciadoA = $registroFA[47];
            $ciudadRepresentanteA = $registroFA[48];
            $nombreEmpresaA = $registroFA[49];
            $puestoQueOcupaA = $registroFA[50];
            $nombreJefeInmeA = $registroFA[51];
            $calleEA = $registroFA[52];
            $exteriorEA = $registroFA[53];
            $interiorEA = $registroFA[54];
            $coloniaEA = $registroFA[55];
            $alcaldiaEA = $registroFA[56];
            $cpEA = $registroFA[57];
            $ciudadEA = $registroFA[58];
            $telE1A = $registroFA[59];
            $telE2A = $registroFA[60];
            $correoEA = $registroFA[61];
            $regimenA = $registroFA[62];
            $nombreCA = $registroFA[63];
            $rfcCA = $registroFA[64];
            $CURPCA = $registroFA[65];
            $nombreEmpresaFA = $registroFA[66];
            $sueldoFA = $registroFA[67];
            $giroA = $registroFA[68];
            $constSociedadA = $registroFA[69];
            $numeroActaA = $registroFA[70];
            $fechaActaA = $registroFA[71];
            $licNumeroA = $registroFA[72];
            $numeroA = $registroFA[73];
            $volumenA = $registroFA[74];
            $fojasA = $registroFA[75];
            $libroA = $registroFA[76];
            $folioInsA = $registroFA[77];
            $numeroEmpleadosA = $registroFA[78];
            $numeroEscrituraA = $registroFA[79];
            $nomApoderadoA = $registroFA[80];
            $poderNumeroA = $registroFA[81];
            $nomNotarioA = $registroFA[82];
            $ciudadNotarioA = $registroFA[83];
            $parentezcoA = $registroFA[85];
            $registroPublicoA = $registroFA[86];

            $dirAta = $calleA . ", No. Exterior: " . $exteriorA . ", No. Interior: " . $interiorA . ", " . $coloniaA . ", Alcaldia: " . $alcaldiaA . ", C.P.: " . $cpA . ", " . $ciudadA;


            break;

        case 5:
        case 6:
            //Fiador
            $consultaFia = "SELECT * FROM relacionadosexpediente WHERE  expediente = '$expediente' AND idTipoParticipacion = '5' OR idTipoParticipacion = '6'";
            $resultadoFia = mysqli_query($con, $consultaFia);
            $rowFia = mysqli_fetch_array($resultadoFia);
            $fiador = $rowFia[1];
            $consultaNomFiador = "SELECT * FROM datosusuarios WHERE  usuario = '$fiador'";
            $resultadoNomFiador = mysqli_query($con, $consultaNomFiador);
            $rowNomFiador = mysqli_fetch_array($resultadoNomFiador);

            $nomNomFiador = $rowNomFiador[2];
            $apPNomFiador = $rowNomFiador[3];
            $apMNomFiador = $rowNomFiador[4];
            $NombreFiador = $nomNomFiador . " " . $apPNomFiador . " " . $apPNomFiador;


            $consultaForFi = "SELECT * FROM formulariosfisicos WHERE usuario='$fiador' AND expediente='$expediente' ";
            $resultadoForFia = mysqli_query($con, $consultaForFi);
            $registroFFia = mysqli_fetch_array($resultadoForFia);


            $nacionalidadFia = $registroFFia[3];
            $originarioFia = $registroFFia[4];
            $calleFia = $registroFFia[5];
            $exteriorFia = $registroFFia[6];
            $interiorFia = $registroFFia[7];
            $coloniaFia = $registroFFia[8];
            $alcaldiaFia = $registroFFia[9];
            $cpFia = $registroFFia[10];
            $ciudadFia = $registroFFia[11];
            $tel1Fia = $registroFFia[12];
            $tel2Fia = $registroFFia[13];
            $correoFia = $registroFFia[14];
            $rfcFia = $registroFFia[15];
            $curpFia = $registroFFia[16];
            $estadoCivilFia = $registroFFia[17];

            $nombreR1Fia = $registroFFia[26];
            $relacionR1Fia = $registroFFia[27];
            $telefonoR1Fia = $registroFFia[28];
            $correoR1Fia = $registroFFia[29];
            $nombreR2Fia = $registroFFia[30];
            $relacionR2Fia = $registroFFia[31];
            $telefonoR2Fia = $registroFFia[32];
            $correoR2Fia = $registroFFia[33];
            $nombreR3Fia = $registroFFia[34];
            $relacionR3Fia = $registroFFia[35];
            $telefonoR3Fia = $registroFFia[36];
            $correoR3Fia = $registroFFia[37];

            $numeroCuentaFia = $registroFFia[39];
            $numeroClabeFia = $registroFFia[40];
            $nombreBancoFia = $registroFFia[41];
            $poderesFia = $registroFFia[42];
            $nombreRepresentanteFia = $registroFFia[43];
            $numeroRepresentanteFia = $registroFFia[44];
            $fechaRepresentanteFia = $registroFFia[45];
            $notarioNumeroFia = $registroFFia[46];
            $nombreLicenciadoFia = $registroFFia[47];
            $ciudadRepresentanteFia = $registroFFia[48];
            $nombreEmpresaFia = $registroFFia[49];
            $puestoQueOcupaFia = $registroFFia[50];
            $nombreJefeInmeFia = $registroFFia[51];
            $calleEFia = $registroFFia[52];
            $exteriorEFia = $registroFFia[53];
            $interiorEFia = $registroFFia[54];
            $coloniaEFia = $registroFFia[55];
            $alcaldiaEFia = $registroFFia[56];
            $cpEFia = $registroFFia[57];
            $ciudadEFia = $registroFFia[58];
            $telE1Fia = $registroFFia[59];
            $telE2Fia = $registroFFia[60];
            $correoEFia = $registroFFia[61];
            $regimenFia = $registroFFia[62];
            $nombreCFia = $registroFFia[63];
            $rfcCFia = $registroFFia[64];
            $CURPCFia = $registroFFia[65];
            $nombreEmpresaFFia = $registroFFia[66];
            $sueldoFFia = $registroFFia[67];
            $giroFia = $registroFFia[68];
            $constSociedadFia = $registroFFia[69];
            $numeroActaFia = $registroFFia[70];
            $fechaActaFia = $registroFFia[71];
            $licNumeroFia = $registroFFia[72];
            $numeroFia = $registroFFia[73];
            $volumenFia = $registroFFia[74];
            $fojasFia = $registroFFia[75];
            $libroFia = $registroFFia[76];
            $folioInsFia = $registroFFia[77];
            $numeroEmpleadosFia = $registroFFia[78];
            $numeroEscrituraFia = $registroFFia[79];
            $nomFiapoderadoFia = $registroFFia[80];
            $poderNumeroFia = $registroFFia[81];
            $nomNotarioFia = $registroFFia[82];
            $ciudadNotarioFia = $registroFFia[83];
            $parentezcoFia = $registroFFia[86];
            $registroPublicoFia = $registroFFia[87];

            $dirFia = $calleFia . ", No. Exterior: " . $exteriorFia . ", No. Interior: " . $interiorFia . ", " . $coloniaFia . ", Alcaldia: " . $alcaldiaFia . ", C.P.: " . $cpFia . ", " . $ciudadFia;


            break;

        default:
            $consultaUsuario = "SELECT * FROM datosusuarios WHERE  usuario = '$usuario'";
            $resultadoUs = mysqli_query($con, $consultaUsuario);
            $rowU = mysqli_fetch_array($resultadoUs);

            $nom = $rowU[2];
            $apP = $rowU[3];
            $apM = $rowU[4];
            $NombreUsuario = $nom . " " . $apP . " " . $apP;
            break;
    }
}


date_default_timezone_set('America/Mexico_City');
$AñoActual = date("Y");
$MesActual = date("m");
$DiaActual = date("d");

$formatoFechaHoy = "Ciudad de México, a <b>" . $DiaActual . " de " . $MesActual . " Del Año " . $AñoActual . "</b> .";


//Consulta Informacion del expediente

$consultaExp = "SELECT * FROM expedientes WHERE idrelacion='$expediente' ";
$resultadoExp = mysqli_query($con, $consultaExp);
$registroExp = mysqli_fetch_array($resultadoExp);

$id = $registroExp[0];
$idrelacion = $registroExp[1];
$tipoI = $registroExp[2];
$calle = $registroExp[3];
$exterior = $registroExp[4];
$interior = $registroExp[5];
$colonia = $registroExp[6];
$alcaldia = $registroExp[7];
$cp = $registroExp[8];
$ciudad = $registroExp[9];
$uso = $registroExp[10];
$renta = $registroExp[11];
$cuota = $registroExp[12];
$cobertura = $registroExp[13];

$vigenciaInicioConsulta = $registroExp[14];
$nuevaFechaI = new DateTime($vigenciaInicioConsulta);
$añoI = $nuevaFechaI->format('Y');
$mesI = $nuevaFechaI->format('M');
$diaI = $nuevaFechaI->format('d');

$formatoPlazoForzosoInicio = $diaI . " de " . $mesI . " Del Año " . $añoI;

$vigenciaFinalConsulta = $registroExp[15];
$nuevaFechaF = new DateTime($vigenciaFinalConsulta);
$añoF = $nuevaFechaF->format('Y');
$mesF = $nuevaFechaF->format('M');
$diaF = $nuevaFechaF->format('d');

$formatoPlazoForzosoFin = $diaF . " de " . $mesF . " Del Año " . $añoF;


$corredor = $registroExp[16];
$estatus = $registroExp[17];
$fechaC = $registroExp[18];
$eVentas = $registroExp[19];
$fechaFirma = $registroExp[20];
$usuarioFirma = $registroExp[21];
$costoCobertura = $registroExp[22];
$costoInvestigacion = $registroExp[23];
$comisionCorredor = $registroExp[24];
$comisionEventas = $registroExp[25];
$lugar = $registroExp[26];
$horaFirma = $registroExp[27];
$saldo = $registroExp[28];
$referencia = $registroExp[29];
$ref1 = $registroExp[30];
$ref2 = $registroExp[31];
$modificado = $registroExp[32];
$ingresosComprobables = $registroExp[33];
$estatusV = $registroExp[34];

$dirInmueble = $calle . ", No. Exterior: " . $exterior . ", No. Interior: " . $interior . ", " . $colonia . ", Alcaldia: " . $alcaldia . ", C.P.: " . $cp . ", " . $ciudad;


//Consulta de solvencias
$consultaSolv = "SELECT * FROM docsolvencia WHERE expediente='$expediente' AND usuario='$usuarioC'";
$resultadoSolv = mysqli_query($con, $consultaSolv);
$registroSolv = mysqli_fetch_array($resultadoSolv);
$tipoSolv = $registroSolv[3];
$renta = $registroSolv[13];
$cantidadDeposito = $registroSolv[7];



//TODO: Contratos 2 y 4 aparecen en blanco en el editor.
//TODO: tipos de usuarios 7 y 8