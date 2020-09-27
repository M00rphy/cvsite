<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if ($user->is_logged_in()) {
    $user = $_SESSION['user'];
    header('Location: userLanding.php', true);
    exit();
}

//process login form if submitted
if (isset($_POST['submit'])) {

    if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

    $username = $_POST['username'];
    if ($user->isValidUsername($username)) {
        if (!isset($_POST['password'])) {
            $error[] = 'A password must be entered';
        }
        $password = $_POST['password'];

        if ($user->login($username, $password)) {
            $_SESSION['username'] = $username;
            header('Refresh: 0; userLanding.php', true);
            exit;
        } else {
            $error[] = 'Wrong username or password or your account has not been activated.';
        }
    } else {
        $error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
    }
} //end if submit

//define page title
$title = 'Login';

//include header template
require('layout/header.php');
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <script async src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.6/pwacompat.min.js"
            integrity="sha384-GOaSLecPIMCJksN83HLuYf9FToOiQ2Df0+0ntv7ey8zjUHESXhthwvq9hXAZTifA" crossorigin="anonymous">
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <body class="backgroundColor">
    <link rel="manifest" href="../manifest.json">
    <link rel="stylesheet" type="text/css" href="../css/mainstyle.css">
    <!--link rel="stylesheet" type="text/css" href="../css/landscape.css"-->
    <div class="bgimg">
        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" method="post" action="" autocomplete="off">
                        <h2>Please Login</h2>
                        <p>Don't you have an account? Not to worry! Click <a href='register.php'
                                                                             class="registerButton"> Here </a>to
                            register.
                        </p>

                        <?php
                        //check for any errors
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo '<p class="bg-danger">' . $error . '</p>';
                            }
                        }

                        if (isset($_GET['action'])) {

                            //check the action
                            switch ($_GET['action']) {
                                case 'active':
                                    echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
                                    break;
                                case 'reset':
                                    echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
                                    break;
                                case 'resetAccount':
                                    echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
                                    break;
                            }
                        }

                        ?>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control input-lg"
                                       placeholder="User Name"
                                       value="<?php if (isset($error)) {
                                           echo htmlspecialchars($_POST['username'], ENT_QUOTES);
                                       } ?>"
                                       tabindex="1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control input-lg"
                                       placeholder="Password" tabindex="3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-9 col-sm-9 col-md-9">
                                <a href='reset.php' class="reset">Forgot your Password?</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <input class="btn btn-outline-success loginButton" type="submit" name="submit"
                                       value="Login"
                                       tabindex="5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
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
<?php
//include header template
require('layout/footer.php');
?>