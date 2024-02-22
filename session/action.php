<?php
session_start();
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    echo "Hello {$_SESSION['username']} , your password {$_SESSION['password']}";
//    session_abort();
    session_unset();
}
