<?php

// TODO: Log user out from the web application
// Detail TODO:
// 1. Remove saved user information in Session
// 2. Regenerate new Session ID
// 3. Redirect user to login.php page

// CODE STARTS HERE

session_start();

//hapus sesi
unset($_SESSION['logged_in_user']);

//generate sesi id baru
session_regenerate_id();

header("Location: ../login.php");
exit();
?>