<!-- NOTE: mulai dengan session_start() -->

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
            Register
        </div>

        <!-- TODO: When user clicks login, form will collect data in input tags and send the data to actions/doLogin.php using POST request method. -->
        <!-- CODE STARTS HERE -->
        <!-- NOTE: Pada bagian form, tambahin action buat tujuan file yang mau dijalanin yaitu di path actions/doRegister.php
             method nya POST karena kita mau ngasih data, kan registrasi pasti ngirim data dong itungannya, kalo GET kita minta
             data.
             Terus di input, ini kan fungsi yang buat ambil inputan, nah penambahan name ini buat ngirim atau POST. entah itu user-name, user-email, dst --> 

        <form action="actions/doRegister.php" method="POST">
            <div>
                <label>Full Name</label>
                <input type="text" id="user-name" name="user-name">
            </div>
            <div>
                <label>E-mail Address</label>
                <input type="text" id="user-email" name="user-email">
            </div>
            <div>
                <label>Gender</label>
                <input type="radio" name="user-gender" value="Male"> Male
                <input type="radio" name="user-gender" value="Female"> Female
                <input type="radio" name="user-gender" value="Prefer not to say"> Prefer not to say
            </div>
            <div>
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="user-password">
            </div>
            <div>
                <button type="submit">Register</button>
            </div>

            <!-- TODO: Print error message, if exists, that comes from actions/doLogin.php. -->
            <!-- CODE STARTS HERE -->
            <!-- NOTE: disini buat bikin error-message nya, dia cek nya lewat aturan2 yang udah di set di doRegister.php,
                 dia cek aturannya diikutin ga, kalo ada yang ga diikutin, dia bakal munculin pesan error, trus dihapus pake unset()
                 biar kalo refresh ya error nya ga muncul lagi -->
                 
            <div id="error-message">
                <?php
                if (isset($_SESSION['register_error'])){
                    echo $_SESSION['register_error'];
                    unset($_SESSION['register_error']);
                }
                ?>

            </div>
            <!-- CODE ENDS HERE -->
             
        </form>
        <!-- CODE ENDS HERE -->
    </div>
</body>
</html>