 <?php



    session_start();

    include("conection.php");

    validar();

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

      `correoRef3` ='$correoR3'
     WHERE `formulariosfisicos`.`usuario` = '$usuario' AND `formulariosfisicos`.`expediente` = '$expediente' ";

    if ($con->query($sql) === TRUE) {
        header("location: usuario.php");
    } else {
        echo "Error updating record: " . $con->error;
    }
    ?>