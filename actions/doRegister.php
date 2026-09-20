<?php

// TODO: Check user data and credential given from register.php page and save user data to session
// Detail TODO:
// 1. Validate the user data is valid or not
//      1.1. User name: must be filled
//      1.2. User email: ends with @gmail.com or @binus.ac.id
//      1.3. User gender: between Male, Female, and Prefer not to tell
//      1.4. User password: at least 8 characters, at least consists of 1 upper case characters, 1 lower case characters, 1 number, and 1 symbol
// 2. If all validation checks out, save user data to session
// 3. Redirect user to login.php page to log in

// CODE STARTS HERE

session_start();

// bikin variable nama, email, gender, sama password.
// Buat nyimpen pake array setelah dikirim, disimpen ke variable
$name = $_POST['user-name'];
$email = $_POST['user-email'];
$gender = $_POST['user-gender'];
$password = $_POST['user-password'];

//kalo nama kosong, munculin pesan error trus redirect ke register.php
if($name == ""){
    $_SESSION['register_error'] = "Name must be filled";
    header("Location: ../register.php");
    exit();
}

//nolak semua email selain yang berakhiran @gmail.com sama @binus.ac.id, munculin pesan error, trus redirect ke register.php
if(!str_ends_with($email, "@gmail.com") && !str_ends_with($email, "@binus.ac.id")){
    $_SESSION['register_error'] = "E-mail must end with @gmail.com or @binus.ac.id";
    header("Location: ../register.php");
    exit();
}

//cek kalo ga milih, error, redirect ke register.php
if($gender != "Male" && $gender != "Female" && $gender != "Prefer not to say"){
    $_SESSION['register_error'] = "Please choose a valid gender";
    header("Location: ../register.php");
    exit();
}

//cek apakah panjang password dibawah 8 huruf, kalo dibawah 8, tampilin pesan error, redirect ke register.php
if(strlen($password) < 8){
    $_SESSION['register_error'] = "password must be at least 8 characters";
    header("Location: ../register.php");
    exit();
}

//cek apakah password mengandung huruf kapital, tanda '/' itu delimiter regex. 
if(!preg_match("/[A-Z]/", $password)){
    $_SESSION['register_error'] = "Password must contain an uppercase letter";
    header("Location: ../register.php");
    exit();
}

//cek apakah password mengandung angka. "Jika password tidak ditemukan angka"
if(!preg_match("/[0-9]/", $password)){
    $_SESSION['register_error'] = "Password must contain a number";
    header("Location: ../register.php");
    exit();
}

/*cek apakah password mengandung simbol, klo artiin secara langsung, dia cek karakter yang bukan angka, bukan
 uppercase sama lowercase. "Jika password tidak mengandung karakter selain huruf dan angka" */
if(!preg_match("/[^A-Za-z0-9]/", $password)){
    $_SESSION['register_error'] = "Password must contain a symbol";
    header("Location: ../register.php");
    exit();
}

//Buat memory registered_user, nyimpen valuenya di array
$_SESSION['registered_user'] = array(
    "name" => $name,
    "email" => $email,
    "gender" => $gender,
    "password" => $password
);

header("Location: ../login.php");
exit();
?>