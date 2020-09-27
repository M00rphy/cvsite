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

    <title>Juegos de Atari</title>
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
<div style="width:640px;height:480px;max-width:100%">
    <div id="game"></div>
</div>
<?php
$gameNames = array("Anim's Revenge", "The Room of Doom", "Five Nights at Freddys for Atari");
$fileNames = array("animsrev.bin", "roomofdoom.bin", "fnaf.bin");

$len = count($gameNames);
for ($i = 0; $i < $len; $i++) {
    if ($gameNames[$i] == $rom) {
        $rom = $fileNames[$i];
        print "<script type='text/javascript'>
    EJS_player = '#game';
    EJS_gameUrl = 'roms/" . $rom . "'; // Url to Game rom
    EJS_core = 'atari2600';
</script>";
    }
}
?>


<script defer scr="https://www.emulatorjs.com/loader.js"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script defer scr="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script defer scr="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script defer scr="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>