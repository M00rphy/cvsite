<?php
?>
<!doctype html>
<html lang="en">

<head>
    <title>PageTitle</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/10ae283bae.js"></script>

    <!--Convert to an external stylesheet-->
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        background: #41295a;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2F0743, #41295a);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2F0743, #41295a);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        color: #212121;
        /* border: 4px solid #ff993b; */
        border-radius: 25px;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    </style>

</head>

<body class="text-center">
    <div class="form-signin bg-light">
        <form method="post" action="php/register.php">
            <img class="mb-4" src="../assets/images/lx.webp" alt="" width="72">
            <h1 class="h3 mb-3 fw-normal">Please register yourself</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com">
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><i class="fas fa-birthday-cake"></i></label>
                <input type="date" class="form-control" name="bday" id="bday" placeholder="bday">
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                <label for="pass">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password"
                    name="confirmPass">
                <label for="confirmPassword">Confirm password</label>
            </div>

            <button class="w-100 btn btn-lg btn-dark" type="submit">Register</button>
            <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y') ?></p>
        </form>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
</body>

</html>