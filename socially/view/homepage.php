<?php

session_start();

// If username and passwords aren't stored in the SESSION variable then
// redirects to login page.
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {

  // Setting the error message in the error key in SESSION to show error in
  // the login page.
  $_SESSION['error'] = 'User not logged in';
  header('Location: /');
  exit();
} else {
  require 'header.php';
}
