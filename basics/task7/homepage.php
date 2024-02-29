<?php

session_start();

// Hard-coding the username and passwords.
$username = 'sayan';
$password = '1234';


if (isset($_POST['submit'])) {
  // If username and password do not match, then redirects to login page.
  if ($username != $_POST['username'] || $password != $_POST['password']) {

    // Setting error key in SESSION to show error message.
    $_SESSION['error'] = 'Wrong username and/or Password';

    // Redirect back to login page.
    header('Location:/');
    exit();
  } else {

    // Storing the username and password in the super-global variable SESSION.
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
  }
}

// If username and passwords aren't stored in the SESSION variable then redirects to login page.
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
  header('Location: /');
  exit();
} else {

  require 'header.php';

  // Gets the query parameter value from  parsing query string.
  // If the query parameter value is valid then redirects to targeted page else show error.
  parse_str($_SERVER['QUERY_STRING'], $parameters);
  if (isset($parameters['q'])) {
    if ($parameters['q'] > 0 && $parameters['q'] <= 7) {
      include "question{$parameters['q']}.php";
    } else {
      include 'invalid.html';
    }
  }
}
