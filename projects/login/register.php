<?php require('includes/config.php');

//if logged in redirect to players page
if ($user->is_logged_in()) {
    header('Location: ../../../main.php');
    exit();
}

//if form has been submitted process it
if (isset($_POST['submit'])) {
    if (!isset($_POST['username'])) {
        $error[] = "Please fill out all fields";
    }
    if (!isset($_POST['email'])) {
        $error[] = "Please fill out all fields";
    }
    if (!isset($_POST['password'])) {
        $error[] = "Please fill out all fields";
    }

    $username = $_POST['username'];

    //very basic validation

    if (strlen($_POST['password']) < 3) {
        $error[] = 'Password is too short.';
    }

    if (strlen($_POST['passwordConfirm']) < 3) {
        $error[] = 'Confirm password is too short.';
    }

    if ($_POST['password'] != $_POST['passwordConfirm']) {
        $error[] = 'Passwords do not match.';
    }

    $email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);

    //if no errors have been created carry on
    if (!isset($error)) {

        //hash the password
        $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

        try {

            //insert into database with a prepared statement
            $stmt = $db->prepare('INSERT INTO users (username,password,email,active) VALUES (:username, :password, :email, :active)');
            $stmt->execute(array(
                ':username' => $username,
                ':password' => $hashedpassword,
                ':email' => $email,
                ':active' => 'Yes'
            ));
            $id = $db->lastInsertId('memberID');

            //redirect to index page
            header('Location: login.php?action=joined');
            exit;

            //else catch the exception and show the error.
        } catch (PDOException $e) {
            $error[] = $e->getMessage();
        }
    }
}

//define page title
$title = 'Main';

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
    <div class="bgimg">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" method="post" action="" autocomplete="off">
                        <h2>Please Sign Up</h2>
                        <p>Already a member? <a href='login.php' class="loginButton">Login</a></p>

                        <?php
                        //check for any errors
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo '<p class="bg-danger">' . $error . '</p>';
                            }
                        }

                        //if action is joined show success
                        if (isset($_GET['action']) && $_GET['action'] == 'joined') {
                            echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
                        }
                        ?>
                        <!--Registration form-->
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
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control input-lg"
                                       placeholder="Email Address"
                                       value="<?php if (isset($error)) {
                                           echo htmlspecialchars($_POST['email'], ENT_QUOTES);
                                       } ?>"
                                       tabindex="2">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"
                                           class="form-control input-lg"
                                           placeholder="Password" tabindex="3">
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="passwordConfirm">Re-Type your Password</label>
                                        <input type="password" name="passwordConfirm" id="passwordConfirm"
                                               class="form-control input-lg" placeholder="Confirm Password"
                                               tabindex="4">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" name="submit" value="Register"
                                           class="btn btn-outline-warning registerButton" tabindex="5">
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