<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
  case '':
  case '/':
  case '/login':
    require __DIR__ . '/login.php';
    break;

  case '/home':
    require __DIR__ . '/homepage.php';
    break;

  case '/register':
    require __DIR__ . '/register_page.php';
    break;

  case '/reset':
    require __DIR__ . '/reset_page.php';
    break;
  case '/logout':
    require __DIR__ . '/logout.php';
    break;
  case "/profile":
    require __DIR__ . "/profile.php";
    break;
}
if (str_starts_with($request, "/profile_photos/")) {
  header('Location:/home');
  exit();
}
if (str_starts_with($request, "/uploads/")) {
  header('Location:/home');
  exit();
}
