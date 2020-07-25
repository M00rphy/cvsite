<div class="col-sm-12 col-lg-6" data-toggle="modal" data-target="#modal">
    <button class="btn btn-outline-info">Login</button>
</div>

<!-- Inicio Modal Login -->
<!--div class="modal" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container" style="margin-top: 120px">
                    <div class="row justify-content-center">
                        <div id="contenedor" class="col-10 col-md-4">
                            <form action="handler.php" method="POST">
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
                                    <input type="submit" value="Iniciar" class="iniciar"
                                           style="margin-right:30px; width: 300px">
                            </form>


                        </div>
                        <div class="row">
                            <div align="center" class="col-xs-9 col-sm-9 col-md-9">
                                <a href='reset.php' class="reset">Olvidaste tu Contraseña?</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->
<!-- Fin Modal Login -->


<div id="modalLogin" class="modal" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog" role="document">
        <form class="modal-content animate" action="/login/login.php">

            <div class="container">
                <label for="uname" class="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw" class="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" class="login glow-button">Login</button>

            </div>

            <div class="container" style="background-color:#32cd32">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                    Cancel
                </button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>