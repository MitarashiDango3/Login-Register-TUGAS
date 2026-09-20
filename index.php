<!-- NOTE: Selalu mulai dengan session_start() buat mulai sesi -->
<!-- isset() dipake buat cek isi value, misal ada isinya atau kosong, tergantung cara makenya kalo disini
     cek apakah isinya si session logged_in_user atau user yang logged in ada ga? kalo ga ada user yang log in
     redirect pake header() ke login.php. Gunanya exit(); itu biar langsung stop, jadi ga dilanjutin tuh ke codingan
     bawahnya, kalo isset() cek dan ada logged_in_user di session, dia baru lanjutin ke codingan bawahnya --> 

<?php
session_start();

if(!isset($_SESSION['logged_in_user'])){
    header("Location: login.php");
    exit();
}
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
        <h1>Home Page</h1>
    </div>

    <!-- TODO: Print logged in user name in "user-name" span here -->
    <!-- CODE STARTS HERE -->
    <!-- NOTE: {enter user name here} jadi echo $_SESSION['logged_in_user']['name']; jgn lupa open pake
         php biar kebaca. jadi disini dia print tulisan dari session logged_in_user di bagian nama -->

    <div>
        Welcome, <span id="user-name"><?php echo $_SESSION['logged_in_user']['name']; ?></span>
    </div>
    <!-- CODE ENDS HERE -->

    <div>
        <div>
            Menu:
        </div>
        <ul>
            <li><a href="/profile.php">View Profile</a></li>
            <li><a href="/logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>