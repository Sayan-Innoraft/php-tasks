<?php

require '../model/Query.php';
require '../controller/password_validation.php';

if(isset($_POST['submit'])){
  if(is_password_valid($_POST['password1'],$_POST['password2']) !== 'SUCCESS'){
    $msg = is_password_valid($_POST['password1'],$_POST['password2']);
  }elseif(preg_match('/^[A-Za-z]{1,28}$/',trim($_POST['first_name'])) &&
    preg_match('/^[A-Za-z]{1,28}$/',trim($_POST['last_name']))
    && preg_match('/^[A-Za-z0-9._]{1,28}$/',trim($_POST['username']))){

    // Checks if the connection to database is successful and the input
    // username already exists in the database or not. If username already
    // exists in the database, shows a warning message.
    if(Query::connect() && Query::checkUser(trim($_POST['username']))){
      $msg = 'Username already exists';
    }else{

      // After successfully adding the user, redirects to the login page.
      if(Query::addUser(trim($_POST['username']),trim($_POST['first_name']),
        trim($_POST['last_name']),trim($_POST['password2']))){
        header('Location: /login');
        exit();
      }
    }
  }else{
    $msg = 'Invalid input format';
  }
}
