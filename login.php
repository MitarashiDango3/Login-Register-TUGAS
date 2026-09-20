<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Project 1 - Login Register</title>
</head>
<body>
    <div>
        <div>
            Login
        </div>

        <!-- TODO: When user clicks login, form will collect data in input tags and send the data to actions/doLogin.php using POST request method. -->
        <!-- CODE STARTS HERE -->
        <!-- NOTE : yang ini action jalanin path actions/doLogin.php method POST karena kita ngirim data,
             name=" " dipake biar PHP bisa ambil nilainya lewat $_POST['variable-name']--> 
        <form action="actions/doLogin.php" method="POST">
            <div>
                <label for="user-email">E-mail Address</label>
                <input type="text" id="user-email" name="user-email">
            </div>
            <div>
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="user-password">
            </div>
            <div>
                <input type="checkbox" name="remember-me" id="remember-me"> Remember me
            </div>
            <div>
                <button type="submit">Login</button>
            </div>

            <!-- TODO: Print error message, if exists, that comes from actions/doLogin.php. -->
            <!-- CODE STARTS HERE -->
            <div id="error-message">
                <?php
                //cek aturan yang ada di doLogin.php terpenuhi ga
                if (isset($_SESSION['login_error'])){
                    echo $_SESSION['login_error'];
                    unset($_SESSION['login_error']);
                }
                ?>

            </div>
            <!-- CODE ENDS HERE -->

        </form>
        <!-- CODE ENDS HERE -->
    </div>
</body>
</html>