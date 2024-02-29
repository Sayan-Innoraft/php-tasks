<?php


// If username or password not saved in session when accessing the questions then redirects to login page.
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){

  // Setting the error message in the error key in SESSION to show error in the login page.
  $_SESSION['error'] = 'User not logged in';
  header('Location:/');
  exit();
}
