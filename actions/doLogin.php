<?php

// TODO: Check sent user credentials from login.php page and logged them into the web application
// Detail TODO:
// 1. Get user credentials (email and password) that has been sent from login.php
// 2. Compare sent user credentials and saved user credentials when register new user (refer to the Register page procedure and logic)
// 3. If user comparation shows the user does not exists in saved user credentials, redirect back to login.php page and show error message of "Wrong user e-mail and password combination".
// 4. If user comparation shows the user exists in saved user credentials, regenerate the session ID, save user data to session as logged on user and redirect to home.php

// Notes:
// 1. When user chooses to check "Remember Me" checkbox, issue a persistent cookie with an expiration of 7 days. On another day the user accessed the web application, they will be logged on to their logged on user data.

// CODE STARTS HERE

session_start();

$email = $_POST['user-email'];
$password = $_POST['user-password'];

//cek apakah ada user yang registered
if(isset($_SESSION['registered_user'])){
    $user = $_SESSION['registered_user'];

    //cek email sama passwordnya sesuai sama yang udah registered
    if($email == $user['email'] && $password == $user['password']){
        session_regenerate_id();
        $_SESSION['logged_in_user'] = $user;

        //kalo pilih remember me, setcookie buat memory, set 7 hari, ini artinya 7 day, 24 hours, 60 menit, 60 seconds
        if(isset($_POST['remember-me'])){
            setcookie("remember_email", $email, time() + 7*24*60*60);
        }

        header("Location: ../index.php");
        exit();
    }
}

//kalo aturan atas ga terpenuhi, ya ga bisa masuk
$_SESSION['login_error'] = "Wrong user e-mail and password combination";
header("Location: ../login.php");
exit();
?>
