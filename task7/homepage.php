<?php

session_start();

// If username and passwords aren't stored in the SESSION variable then
// redirects to login page.
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {

  // Setting the error message in the error key in SESSION to show error in
  // the login page.
  $_SESSION['error'] = 'User not logged in';
  header('Location: /task7/');
  exit();
} else {

  require 'header.php';

  // Gets the query parameter value from  parsing query string.
  // If the query parameter value is valid then redirects to targeted page
  // else show error.
  parse_str($_SERVER['QUERY_STRING'], $parameters);
  if (isset($parameters['q'])) {
    if ($parameters['q'] > 0 && $parameters['q'] <= 7) {
      include "question{$parameters['q']}.php";
    } else {
      include 'invalid.html';
    }
  }
}
