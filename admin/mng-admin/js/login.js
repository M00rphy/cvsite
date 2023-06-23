document.addEventListener('DOMContentLoaded', () => {
    console.log("loaded")
    document.getElementById('signin').addEventListener('submit', (e) => {
        e.preventDefault()
        console.log("submitted")
        $.ajax({
            url: "php/login.php",
            type: "post",
            data: {email: document.getElementById('email').value, password: document.getElementById('password').value},
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                // DescButtonsV(formulario);
            },
            complete: function () {
                // ActButtonsV(formulario);
                // editorck = false;
            },
            error: function () {
                alerta(
                    "Error",
                    "Ocurrió un error al conectarse con el servidor, inténtelo más tarde por favor",
                    "error",
                    "Aceptar"
                );
            },
            success: function (response) {
                console.log(response);
                // alerta(response.title, response.msg, response.class, "Aceptar");
                // if (response.success) formulario.trigger("reset");
                // setTimeout(function () {
                //     eval(response.final);
                // }, 2000);
            }
        });
    })
})