<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
  case '':
  case '/':
    require 'login.php';
    break;

  case '/home':
    require 'homepage.php';
    break;

  case '/register':
    require  'register_page.php';
    break;

  case '/reset':
    require  'reset_page.php';
    break;
}
