<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style type="text/css">
        body {
            background-image: url(../img/fondo2.jpg);
        }

        #contenedor {
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
            border-style: solid;
            border-color: #FFFFFF;
            background-color: rgba(255, 255, 255, 1);
            font-weight: bold;
        }

        .iniciar {
            width: 120px;
            height: 40px;
            margin-right: 30px;
            background-color: rgba(31, 207, 13, 0.5);
            border-color: white;
            border-style: dotted;
            color: white;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            font-size: .8em;

        }

        .iniciar:hover {
            background-color: rgba(31, 207, 13, 1);
        }

        #titulo {

            font-size: 1.5em
        }

        .white {
            color: #fff;
        }
    </style>

    <title>Inicio de sesión</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div align="right">
                <a class="btn btn-light" href="../index.php" style="width: 200px">Regresar</a>
            </div>
        </div>
    </div>

</div>


<div class="container" style="margin-top: 120px">
    <div class="row justify-content-center">


        <div id="contenedor" class="col-10 col-md-4">
            <form action="vinicio.php" method="POST">

                <div align="center">
                    <img src="../img/logo.jpeg" width="90%">

                </div>

                <div class="form-group" style="margin-top: 10px;">
                    <label for="usr">Usuario:</label>
                    <div class="input-group">
              <span class="input-group-addon" style="background-color: rgba(81, 0, 23, 0.4);">
                <i class="glyphicon glyphicon-user white "></i>
              </span>
                        <input type="text" class="form-control" name="usuario"/>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <label for="usr">Contraseña:</label>
                    <div class="input-group">
              <span class="input-group-addon" style="background-color: rgba(81, 0, 23, 0.4);">
                <i class="glyphicon glyphicon-lock white"></i>
              </span>
                        <input type="password" class="form-control" name="password"/>
                    </div>
                </div>
                <div align="center">
                    <input type="submit" value="Iniciar" class="iniciar" style="margin-right:30px; width: 300px">
            </form>


        </div>
        <div class="row">
            <div align="center" class="col-xs-9 col-sm-9 col-md-9">
                <a href='reset.php' class="reset">Olvidaste tu Contraseña?</a>
            </div>
        </div>
        <br>
    </div>


    <!-- fin del formulario de inicio -->
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/jquery-1.12.0.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>