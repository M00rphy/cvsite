<?php
$hidden = "";
$rom = "";
?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Studying Sandbox</title>
</head>
<body style="background-color: #000000">
<form action="#" method="post">
    <div class="row">
        <div class="col-auto my-1">
            <label class="mr-sm-2" for="gameSel" style="color: #FFFFFF">Selecciona el juego de Atari que deseas
                jugar</label>
            <select class="custom-select mr-sm-2" id="gameSel" name="gameSel" onchange="this.form.submit()">
                <option value="hide">Selecciona el juego...</option>
                <option value="Anim's Revenge">Anim's Revenge</option>
                <option value="The Room of Doom">The Room of Doom</option>
                <option value="Five Nights at Freddys for Atari">Five Nights at Freddys for Atari</option>
            </select>
        </div>
    </div>
</form>

<?php
$rom = $_POST['gameSel'];
?>
<div id="javatari" style="text-align: center; margin: 20px auto 0; padding: 0 10px;">
    <div id="javatari-screen" style="box-shadow: 2px 2px 10px rgba(0, 0, 0, .7);"></div>
</div>

<script src="javatari.js"></script>
<?php

$gameNames = array("Anim's Revenge", "The Room of Doom", "Five Nights at Freddys for Atari");
$fileNames = array("animsrev.bin", "roomofdoom.bin", "fnaf.bin");

$len = count($gameNames);
for ($i = 0; $i < $len; $i++) {
    if ($gameNames[$i] == $rom) {
        $rom = $fileNames[$i];
        print '<script>Javatari.CARTRIDGE_URL = "roms/' . $rom . '";</script>';
    }
}

?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>